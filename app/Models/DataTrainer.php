<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTrainer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'description', 'expertise', 'years_of_experience', 'qualifications', 'image'];
}
