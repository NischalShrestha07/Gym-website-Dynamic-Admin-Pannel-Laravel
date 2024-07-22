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
        Schema::create('gymnames', function (Blueprint $table) {
            $table->id();
            $table->string('gymname');
            $table->string('home');
            $table->string('whyus');
            $table->string('trainers');
            $table->string('contactus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gymnames');
    }
};
