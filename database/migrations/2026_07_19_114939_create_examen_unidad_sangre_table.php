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
    Schema::create('examen_unidad_sangre', function (Blueprint $table) {
        $table->id();
        $table->foreignId('unidad_sangre_id')->constrained('unidad_sangres')->onDelete('cascade');
        $table->foreignId('examen_id')->constrained('examens')->onDelete('cascade');
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_unidad_sangre');
    }
};
