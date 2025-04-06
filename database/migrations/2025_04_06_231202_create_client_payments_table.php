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
        Schema::create('client_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('manage_clients')->onDelete('cascade');
            $table->decimal('amount_paid', 8, 2);
            $table->date('payment_date');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('manage_clients', function (Blueprint $table) {
            $table->decimal('total_amount', 8, 2)->default(0.00)->after('dueAmount'); // Total plan cost
            $table->string('dueAmount')->nullable()->change(); // Change to nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_payments');
        Schema::table('manage_clients', function (Blueprint $table) {
            $table->dropColumn('total_amount');
            $table->string('dueAmount')->nullable(false)->change();
        });
    }
};
