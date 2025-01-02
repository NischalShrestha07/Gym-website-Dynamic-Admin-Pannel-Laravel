<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact_messages'; // Specify the correct table name

    protected $fillable = [
        'name',
        'email',
        'phoneNo',
        'message'
    ];
}
