<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('geo_attendance_id')->constrained('geo_attendance')->onDelete('cascade');
            $table->timestamp('recorded_time')->nullable(); // Field for recorded time
            $table->decimal('latitude', 10, 7)->nullable(); // Field for latitude
            $table->decimal('longitude', 10, 7)->nullable(); // Field for longitude
            $table->string('location_name')->nullable(); // Field for location name
            $table->timestamps(); // Laravel timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_details');
    }
};
