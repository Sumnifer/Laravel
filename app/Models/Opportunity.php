<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Opportunity extends Model
{
    protected $fillable = [
        'description',
        'status',
        'managed_by',
        'created_by',
        'client_id',
        'type',
    ];

    // Relations avec d'autres modèles

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function managedBy()
    {
        return $this->belongsTo(User::class, 'managed_by');
    }

}

