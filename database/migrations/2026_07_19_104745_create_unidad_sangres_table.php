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
        Schema::create('unidad_sangres', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_sanguineo', 5); // Ej: A+, O-, AB+
            $table->integer('volumen_ml'); // Cantidad en mililitros
            $table->date('fecha_extraccion');
            $table->string('estado')->default('Disponible'); // Ej: Disponible, En análisis, Descartada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_sangres');
    }
};
