<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymName extends Model
{
    use HasFactory;
    protected $table = 'gymnames';  // Ensure the table name is correctly set
    protected $fillable = [
        'gymname', 'home', 'whyus', 'trainers', 'contactus'
    ];
}
