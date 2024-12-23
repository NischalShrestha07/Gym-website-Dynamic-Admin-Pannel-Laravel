<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceCoordinate extends Model
{
    use HasFactory;
    protected $fillable = [
        'geo_attendance_id',
        'recorded_at',
        'latitude',
        'longitude',
    ];

    // Define the relationship with GeoAttendance
    // public function attendance()
    // {
    //     return $this->belongsTo(Attendance::class, 'geo_attendance_id');
    // }
    public function geoAttendance()
    {
        return $this->belongsTo(GeoAttendance::class, 'geo_attendance_id');
    }
}
