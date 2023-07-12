<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanMaterial extends Model
{
protected $fillable = [
'client_id',
'technician_id',
'lead_technician_id',
'take_over_id',
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

public function takeOver()
{
return $this->belongsTo(TakeOver::class);
}
}
