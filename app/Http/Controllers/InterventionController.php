<?php
namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\ResponseFactory;

class InterventionController extends Controller
{

public function index()
{
$interventions = Intervention::paginate(15);
$users = User::all();
$clients = Client::all();
return view('interventions.index', compact('interventions', 'users', 'clients'));
}

public function create(){
return view('interventions.search');
}

    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $clients = Client::where('name', 'like', '%' . $search . '%')->get();
        } else {
            // Afficher tous les clients par défaut
            $clients = Client::all();
        }

        return view('interventions.search', compact('clients'));
    }



    public function new($client)
    {
        // Récupérer les tickets liés au client à partir de votre modèle ou de votre base de données
        $tickets = Ticket::where('client_id', $client)->get();
        $users = User::all();
        $selectedClient = Client::where('id', $client)->first();


        return view('interventions.new', compact('tickets', 'users', 'selectedClient'));
    }

    public function newTicket($client, $ticket)
    {
        // Récupérer les tickets liés au client à partir de votre modèle ou de votre base de données
        $users = User::all();
        $tickets = Ticket::where('client_id', $client)->get();
        $selectedClient = Client::where('id', $client)->first();
        $selectedTicket = Ticket::where('id', $ticket)->first();


        return view('interventions.new', compact('selectedTicket', 'users', 'selectedClient', 'tickets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'ticket_id' => 'required',
            'user_id' => 'required',
            'managed_by' => 'required',
            'status' => 'required',
            'hours' => 'required',
        ]);

        $intervention = new Intervention();
        $intervention->user_id = $request->input('user_id');
        $intervention->managed_by = $request->input('managed_by');
        $intervention->created_by = Auth::user()->id;
        $intervention->client_id = $request->input('client_id');
        $intervention->ticket_id = $request->input('ticket_id');
        $intervention->description = $request->input('description');
        $intervention->status = $request->input('status');
        $intervention->hours = $request->input('hours');
        $intervention->save();

        // Redirection vers la page souhaitée après avoir enregistré l'intervention
        return redirect()->route('interventions.index')->with('success', 'Nouvelle intervention créée avec succès.');
    }



    public function edit($id)
        {
        $intervention = Intervention::findOrFail($id);
        $clients = Client::all();
        $users = User::all();
        $tickets = Ticket::all();
        return view('interventions.edit', compact('intervention', 'clients', 'tickets', 'users'));
        }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'user_id' => 'required',
        'managed_by' => 'required',
        'client_id' => 'required',
        'ticket_id' => 'required',
        'materiel_id' => 'nullable',
        'description' => 'required',
        'status' => 'required',
        'hours' => 'required',
        ]);

        $intervention = Intervention::findOrFail($id);
        $intervention->update($validatedData);

        return redirect()->route('interventions.index');
    }

    public function delete($id)
    {
        $intervention = Intervention::findOrFail($id);
        $intervention->delete();

        return redirect()->route('interventions.index');
    }

    public function show($id)
    {
        $intervention = Intervention::findOrFail($id);
        return view('interventions.show', compact('intervention'));
    }





}
