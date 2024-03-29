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
        /* status
            0: pendiente
            1: confirmada
            2: cancelada
            3: finalizada
        */
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->text('reason');
            $table->float('cost')->default(0);
            $table->integer('status')->default(0);
            $table->boolean('paid')->default(false);
            $table->softDeletes();
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
