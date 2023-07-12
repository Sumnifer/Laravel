<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'postalCode',
        'city',
        'phone',
        'contract',
    ];

    // Définition des règles de validation pour la création et la mise à jour
    public static $rules = [
        'name' => 'required|unique:clients|max:255',
        'email' => 'required|email|unique:clients|max:255',
        'address' => 'required|max:255',
        'postalCode' => 'required|numeric',
        'city' => 'required|max:255',
        'phone' => 'required|numeric',
    ];

    // Définition des messages d'erreur pour la validation
    public static $validationMessages = [
        'name.required' => 'Le champ Nom est obligatoire.',
        'name.unique' => 'Le nom du client existe déjà.',
        'name.max' => 'Le champ Nom ne doit pas dépasser :max caractères.',
        'email.required' => 'Le champ Email est obligatoire.',
        'email.email' => 'Veuillez fournir une adresse email valide.',
        'email.unique' => 'L\'adresse email existe déjà.',
        'email.max' => 'Le champ Email ne doit pas dépasser :max caractères.',
        'address.required' => 'Le champ Adresse est obligatoire.',
        'address.max' => 'Le champ Adresse ne doit pas dépasser :max caractères.',
        'postalCode.required' => 'Le champ Code postal est obligatoire.',
        'postalCode.numeric' => 'Le champ Code postal doit être un nombre.',
        'city.required' => 'Le champ Ville est obligatoire.',
        'city.max' => 'Le champ Ville ne doit pas dépasser :max caractères.',
        'phone.required' => 'Le champ Téléphone est obligatoire.',
        'phone.numeric' => 'Le champ Téléphone doit être un nombre.',
    ];



    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }


}
