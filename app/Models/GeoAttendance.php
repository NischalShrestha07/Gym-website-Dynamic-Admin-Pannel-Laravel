<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoAttendance extends Model
{
    use HasFactory;
    protected $table = 'geo_attendance';

    protected $fillable = [
        'user_id',
        'check_in_time',
        'check_out_time',
        'check_in_location',
        'check_out_location',
        'check_in_latitude',
        'check_in_longitude',
        'check_out_latitude',
        'check_out_longitude',
        'total_working_hours',
    ];

    // Define relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function geo_attendance()
    {
        return $this->hasMany(GeoAttendance::class, 'user_id');
    }
    public function attendanceDetails()
    {
        return $this->hasMany(attendanceDetails::class);
    }
    public function coordinates()
    {
        return $this->hasMany(AttendanceCoordinate::class, 'geo_attendance_id');
    }
}
