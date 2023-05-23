<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Client;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opportunities = Opportunity::paginate(15);
        $clients = Client::all();
        $users = User::all();
        return view('opportunities.index', compact('opportunities', 'clients', 'users'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        if ($search) {
            $clients = Client::where('name', 'like', '%' . $search . '%')->get();
        } else {
            // Afficher tous les clients par défaut
            $clients = Client::all();
        }
        return view('opportunities.search', compact('clients'));
    }
    public function new($client)
    {
        $users = User::all();
        $selectedClient = Client::where('id', $client)->first();


        return view('opportunities.new', compact( 'users', 'selectedClient'));
    }

    public function create()
    {
        return view('opportunities.search');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'client_id' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'managed_by' => 'required',
            'status' => 'required',
            'type' => 'required',
        ]);

        // Création de l'opportunité avec les champs correspondants
        $opportunity = Opportunity::create([
            'client_id' => $validatedData['client_id'],
            'description' => $validatedData['description'],
            'user_id' => $validatedData['user_id'],
            'managed_by' => $validatedData['managed_by'],
            'status' => $validatedData['status'],
            'created_by' => auth()->user()->id,
            'type' => $validatedData['type'],
        ]);

        // Redirection vers la page des opportunités avec un message de succès
        return redirect()->route('opportunities.index')->with('success', 'Nouvelle opportunité créée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        return view('opportunities.show', compact('opportunity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opportunity $opportunity)
    {
        // Récupérer les utilisateurs et le client pour les options de sélection
        $users = User::all();
        $clients = Client::all();

        // Retourner la vue d'édition avec l'opportunité et les options de sélection
        return view('opportunities.edit', compact('opportunity', 'users', 'clients'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Opportunity $opportunity)
    {
        // Validation des données
        $validatedData = $request->validate([
            'client_id' => 'required',
            'description' => 'required',
            'managed_by' => 'required',
            'status' => 'required',
            'type' => 'required',
        ]);

        // Mise à jour des champs de l'opportunité existante
        $opportunity->update([
            'client_id' => $validatedData['client_id'],
            'description' => $validatedData['description'],
            'managed_by' => $validatedData['managed_by'],
            'status' => $validatedData['status'],
            'type' => $validatedData['type'],
        ]);

        // Redirection vers la page des opportunités avec un message de succès
        return redirect()->route('opportunities.show', $opportunity)->with('success', 'Opportunité mise à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
