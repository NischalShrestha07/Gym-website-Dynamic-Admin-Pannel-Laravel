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
        Schema::create('data_trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dob');
            $table->string('date_of_join');
            $table->string('address');
            $table->string('phone');
            $table->string('expertise');
            $table->string('gender');
            $table->integer('years_of_experience');
            $table->string('qualifications')->nullable();
            $table->string('image')->nullable();
            $table->string('salary')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_trainers');
    }
};
