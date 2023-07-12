<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;



class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('status', '!=', 'Archivé')
            ->orderBy('priority', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('tickets.index', compact('tickets'));
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $users = User::all();
        return view('tickets.create', compact('clients', 'users'));
    }
    public function new($client)
    {
        // Récupérer les tickets liés au client à partir de votre modèle ou de votre base de données
        $clients = Client::all();
        $users = User::all();
        $selectedClient = Client::where('id', $client)->first();


        return view('tickets.new', compact('clients', 'users', 'selectedClient'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'client_id' => 'required|exists:clients,id',
            'created_by' => 'required|exists:users,id',
            'managed_by' => 'required|exists:users,id',
            'attachment' => 'nullable|file|max:2048',
            'priority' => 'required',
        ]);

        $ticket = new Ticket();
        $ticket->description = $request->description;
        $ticket->client_id = $request->client_id;
        $ticket->created_by = $request->created_by;
        $ticket->managed_by = $request->managed_by;
        $ticket->status = $request->status;
        $ticket->priority = $request->priority;

        // Traitement de la pièce jointe s'il y en a une
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');

            $clientId = $request->client_id;
            $attachmentName = ''.$clientId.'_Piece_Jointe_'. date('YmdHis');

            // Déplacez le fichier vers un emplacement de stockage approprié (par exemple, le dossier public/uploads)
            $attachmentPath = $attachment->storeAs('uploads', $attachmentName, 'public');

            // Enregistrez le chemin du fichier dans le modèle
            $ticket->attachment = $attachmentPath;
        }

        $ticket->save();

        Log::channel('custom')->info('Modification : ' . auth()->user()->name . ' a créé le client N°' . $ticket->id . ' (' . $ticket->client->name . ')<br>');

        return redirect()->route('tickets.index')->with('success', 'Ticket créé avec succès.');
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $clients = Client::all();
        $users = User::all();
        return view('tickets.edit', compact('ticket', 'clients', 'users'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'client_id' => 'required|exists:clients,id',
            'created_by' => 'required|exists:users,id',
            'managed_by' => 'required|exists:users,id',
            'status' => 'required',
            'attachment' => 'nullable|file|max:2048',
            'priority' => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->description = $request->description;
        $ticket->client_id = $request->client_id;
        $ticket->created_by = $request->created_by;
        $ticket->managed_by = $request->managed_by;
        $ticket->status = $request->status;
        $ticket->priority = $request->priority;

        // Traitement de la pièce jointe s'il y en a une
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');

            $clientId = $request->client_id;
            $attachmentName = ''.$clientId.'_Piece_Jointe_'. date('YmdHis');

            // Déplacez le fichier vers un emplacement de stockage approprié (par exemple, le dossier public/uploads)
            $attachmentPath = $attachment->storeAs('uploads', $attachmentName, 'public');

            // Supprimez l'ancienne pièce jointe si elle existe
            if ($ticket->attachment) {
                Storage::disk('public')->delete($ticket->attachment);
            }

            // Enregistrez le chemin du fichier dans le modèle
            $ticket->attachment = $attachmentPath;
        }

        $ticket->save();

        Log::channel('custom')->info('Modification : ' . auth()->user()->name . ' a modifié le client N°' . $ticket->id . ' (' . $ticket->client->name . ')<br>');
        ;


            return redirect()->route('tickets.show', $ticket->id)->with('success', 'Ticket modifié avec succès.');




    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        Intervention::where('ticket_id', $id)->delete();


        // Supprimez la pièce jointe si elle existe
        if ($ticket->attachment) {
            Storage::disk('public')->delete($ticket->attachment);
        }

        $ticket->delete();

        Log::channel('custom')->info('Modification : '.auth()->user()->name.' a Supprimé le client N°'.$ticket->id.' ('.$ticket->client->name.')<br>');

        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès.');
    }


    public function archive($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['status' => 'Archivé']);

        session()->flash('showCancelButton', true);
        session()->flash('cancelUrl', route('tickets.unarchive', $id));
        if (URL::previous() === route('tickets.show', $id)) {
            // Si l'URL précédente est celle de la page de détails du ticket
            return redirect()->route('tickets.show', $id)->with('success', 'Le ticket a été archivé avec succès.');
        } elseif(URL::previous() === route('dashboard')) {
            // Si l'URL précédente est différente
            return redirect()->route('dashboard')->with('success', 'Le ticket a été archivé avec succès.');
        }else {
            return redirect()->back()->with('success', 'Le ticket a été archivé avec succès.');
        }
    }

    public function unarchive($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update(['status' => 'En Cours']);

        $redirectBack = redirect()->back()->with('success', "Le ticket n'est plus archivé.");
        return $redirectBack;
    }


    public function archived()
    {
        $archivedTickets = Ticket::where('status', '=', 'Archivé')->paginate(15);
        return view('tickets.archived', compact('archivedTickets'));
    }

    public function duplicate($id)
    {
        // Récupérer le ticket existant
        $existingTicket = Ticket::findOrFail($id);

        // Dupliquer les attributs du ticket existant
        $newTicket = $existingTicket->replicate();

        // Effectuer les modifications nécessaires sur les attributs dupliqués (par exemple, modifier le statut ou les dates)

        // Sauvegarder le nouveau ticket
        $newTicket->save();

        // Rediriger vers la page de détails du nouveau ticket ou vers une autre action
        return redirect()->route('dashboard')->with('success', 'Ticket dupliqué avec succès.');
    }





}
