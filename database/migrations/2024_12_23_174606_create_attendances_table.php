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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->date('date'); // Store the date of attendance
            $table->time('first_in')->nullable(); // Renamed for consistency
            $table->time('break')->nullable();
            $table->time('last_out')->nullable();
            $table->decimal('total_hours')->nullable(); // Adjusted decimal size for total hours
            $table->string('status')->nullable(); // Changed to string for status
            $table->string('shift')->nullable();
            $table->string('capacity'); // default 8 hours
            $table->string('overtime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
