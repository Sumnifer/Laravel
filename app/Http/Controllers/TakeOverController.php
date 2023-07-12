<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LoanMaterial;
use App\Models\TakeOver;
use App\Models\User;
use Illuminate\Http\Request;

class TakeOverController extends Controller
{
    public function index()
    {
        $takeovers = TakeOver::all();
        $clients = Client::all();
        $loanMaterials = LoanMaterial::all();
//        $materials = Material::all();
        return view('takeOvers.index', compact('takeovers', 'clients', 'loanMaterials'));
    }
    public function show(TakeOver $takeover)
    {
    }


    public function create()
    {
        $takeovers = TakeOver::all();
        $clients = Client::all();
        $loanMaterials = LoanMaterial::all();
        $leadTechnicians = User::all();
        $technicians = User::all();
        // Afficher le formulaire de création
        return view('takeOvers.create', compact('takeovers', 'clients', 'loanMaterials', 'technicians', 'leadTechnicians'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required',
            'technician_id' => 'required',
            'lead_technician_id' => 'required',
            'phone' => 'nullable',
            'problem' => 'nullable',
            'user' => 'nullable',
            'password' => 'nullable',
            'material_id' => 'nullable',
            'loanMaterial' => 'nullable',
            'intervention' => 'nullable',
            'invoice' => 'nullable',
            'attachment' => 'nullable',
            'status' => 'required',
        ]);

        // Créer un nouvel enregistrement de take-over
        $takeOver = TakeOver::create([
            'client_id' => $validatedData['client_id'],
            'phone' => $validatedData['phone'],
            'problem' => $validatedData['problem'],
            'user' => $validatedData['user'],
            'password' => $validatedData['password'],
            'material_id' => $validatedData['material_id'],
            'technician_id' => $validatedData['technician_id'],
            'lead_technician_id' => $validatedData['lead_technician_id'],
            'loan_material_id' => $validatedData['loanMaterial'],
            'intervention' => $validatedData['intervention'],
            'invoice' => $validatedData['invoice'],
            'status' => $validatedData['status'],
        ]);

        // Gérer le téléchargement de la pièce jointe
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $attachment->storeAs('attachments', $attachment->getClientOriginalName(), 'public');
            $takeOver->attachment = $attachment->getClientOriginalName();
            $takeOver->save();
        }

        // Rediriger vers la page de liste des take-over avec un message de succès
        return redirect()->route('takeOvers.index')->with('success', 'La prise en charge a été ajoutée avec succès.');
    }


    public function edit(TakeOver $takeover)
    {
        // Afficher le formulaire d'édition avec les données du take-over
        return view('takeovers.edit', compact('takeover'));
    }

    public function update(Request $request, TakeOver $takeover)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'client_id' => 'required',
            'phone' => 'required',
            'problem' => 'required',
            // Ajoutez ici les autres champs requis
        ]);

        // Mettre à jour les données du take-over
        $takeover->update($validatedData);

        // Rediriger vers la liste des take-overs avec un message de succès
        return redirect()->route('takeovers.index')->with('success', 'Le take-over a été mis à jour avec succès.');
    }

    public function destroy(TakeOver $takeover)
    {
        // Supprimer le take-over
        $takeover->delete();

        // Rediriger vers la liste des take-overs avec un message de succès
        return redirect()->route('takeovers.index')->with('success', 'Le take-over a été supprimé avec succès.');
    }
}
