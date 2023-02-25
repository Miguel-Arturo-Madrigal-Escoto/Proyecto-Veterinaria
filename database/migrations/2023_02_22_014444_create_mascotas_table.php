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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->timestamp('fecha_nac');
            $table->string('especie', 50);
            $table->string('raza', 50);
            $table->string('color', 50);
            $table->char('genero');
            $table->boolean('esterilizado');
            $table->float('peso');
            $table->text('string');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
