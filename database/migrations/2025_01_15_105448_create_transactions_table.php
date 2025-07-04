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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'transaction_user_id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('event_id')->constrained(
                table: 'events',
                indexName: 'transaction_event_id'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('price');
            $table->string('snap_token')->nullable();
            $table->enum('status', ['Pending', 'Paid'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
