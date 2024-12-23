<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'geo_attendance_id',
        'recorded_time',
        'latitude',
        'longitude',
        'location_name',
    ];

    public function geoAttendance()
    {
        return $this->belongsTo(GeoAttendance::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
