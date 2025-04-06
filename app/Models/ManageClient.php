<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageClient extends Model
{
    use HasFactory;
    protected $table = 'manage_clients';
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'plantype',
        'planEndDate',
        'trainerStatus',
        'dueAmount',
        'total_amount',
        'image'
    ];

    // Relationship with payments
    public function payments()
    {
        return $this->hasMany(ClientPayment::class, 'client_id');
    }

    // Calculate total paid amount
    public function getTotalPaidAttribute()
    {
        return $this->payments()->sum('amount_paid');
    }

    // Calculate due amount dynamically
    public function getDueAmountAttribute($value)
    {
        return $this->total_amount - $this->getTotalPaidAttribute();
    }
}
