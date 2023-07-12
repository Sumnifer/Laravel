<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'client_id',
        'created_by',
        'managed_by',
        'status',
        'attachment',
        'priority',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function managedBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }



}
