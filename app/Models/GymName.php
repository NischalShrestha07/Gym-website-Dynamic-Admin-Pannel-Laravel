<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymName extends Model
{
    use HasFactory;
    public $fillable = [
        'gymname', 'home', 'whyus', 'trainers', 'contactus'
    ];
}
