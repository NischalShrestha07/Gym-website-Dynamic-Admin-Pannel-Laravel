<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    public   $table = 'memberships';
    protected $fillable = [
        'member_name',
        'membership_type',
        'start_date',
        'end_date',
        'price',
        'email',
        'phone',
        'address',

    ];
}
