<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPayment extends Model
{
    use HasFactory;
    protected $table = 'client_payments';
    protected $fillable = ['client_id', 'amount_paid', 'payment_date', 'payment_method', 'notes'];

    public function client()
    {
        return $this->belongsTo(ManageClient::class, 'client_id');
    }
}
