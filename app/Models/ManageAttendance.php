<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageAttendance extends Model
{
    use HasFactory;
    protected $table = 'manage_attendances';

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
