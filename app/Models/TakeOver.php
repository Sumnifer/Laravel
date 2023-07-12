<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TakeOver extends Model
{
    protected $fillable = [
        'client_id',
        'phone',
        'problem',
        'user',
        'password',
        'material_id',
        'technician_id',
        'lead_technician_id',
        'loan_material_id',
        'intervention',
        'invoice',
        'attachment',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function leadTechnician()
    {
        return $this->belongsTo(User::class, 'lead_technician_id');
    }

    public function loanMaterial()
    {
        return $this->belongsTo(LoanMaterial::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
