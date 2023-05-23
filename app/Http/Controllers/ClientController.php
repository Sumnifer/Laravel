<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Si une recherche est effectuée
        if ($search) {
            $clients = Client::where('name', 'like', '%' . $search . '%')->get();
        } else {
            // Afficher tous les clients par défaut
            $clients = Client::all();
        }

        return view('clients.index', compact('clients'));
    }


    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|unique:clients|max:255',
            'email' => 'required|email|unique:clients|max:255',
            'address' => 'required|max:255',
            'postalCode' => 'required|numeric',
            'city' => 'required|max:255',
            'phone' => 'required|numeric',
        ]);

        $client = Client::create($validatedData);
        Log::channel('custom')->info('Modification : '.auth()->user()->name.' a crée le client N°'.$client->id.' ('.$client->name.')');

        return redirect()->route('clients.index')
            ->with('success', 'Le client a été créé avec succès.');
    }



    public function show($id)
    {
        $client = Client::findOrFail($id);


        return view('clients.show', compact('client'));
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        Log::channel('custom')->info('Modification : '.auth()->user()->name.' a modifié le client N°'.$client->id.' ('.$client->name.')');

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'postalCode' => 'required|numeric',
            'city' => 'required',
            'phone' => 'required|numeric',
        ]);

        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Le client a été modifié avec succès.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {

        $client->delete();
        Log::channel('custom')->info('Modification : '.auth()->user()->name.' a Supprimé le client N°'.$client->id.' ('.$client->name.')');

        // Ajoutez un message flash pour confirmer la suppression
        session()->flash('success', 'Le client a été supprimé avec succès.');

        return redirect()->route('clients.index');
    }


}
