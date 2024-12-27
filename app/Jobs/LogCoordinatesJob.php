<?php

namespace App\Jobs;

use App\Models\AttenCoordinates;
use App\Models\AttendanceCoordinate;
use App\Models\GeoAttendance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogCoordinatesJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $geoAttendanceId;

    public function __construct($geoAttendanceId)
    {
        $this->geoAttendanceId = $geoAttendanceId;
    }

    /**
     * Execute the job.
     */
    // public function handle(): void
    // {
    //     //
    // }

    public function handle()
    {
        // Fetch the latest coordinates (you should implement your logic here)
        // Fetch the latest attendance record to get the coordinates
        $attendance = GeoAttendance::find($this->geoAttendanceId);

        // If attendance exists, log the coordinates
        if ($attendance) {
            AttendanceCoordinate::create([
                'geo_attendance_id' => $attendance->id,
                'recorded_at' => now(),
                'latitude' => $attendance->check_in_latitude, // This can be updated as needed
                'longitude' => $attendance->check_in_longitude, // This can be updated as needed
            ]);

            // Schedule the next coordinate logging
            \Illuminate\Support\Facades\Queue::later(now()->addMinutes(5), new self($this->geoAttendanceId));
        }
    }
}
