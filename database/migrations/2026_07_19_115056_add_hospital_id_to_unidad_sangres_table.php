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
    Schema::table('unidad_sangres', function (Blueprint $table) {
        $table->foreignId('hospital_id')->nullable()->constrained('hospitals')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unidad_sangres', function (Blueprint $table) {
            //
        });
    }
};
