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
        Schema::create('whyuss', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->text('description');
            $table->string('head');
            $table->text('headdetail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whyuss');
    }
};
