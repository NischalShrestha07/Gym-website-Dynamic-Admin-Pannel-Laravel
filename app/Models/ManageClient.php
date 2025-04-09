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
        // 'total_amount',
        'image'
    ];
}
