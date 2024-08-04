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
        Schema::create('ciudadano_partidos_politicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ciudadano_id')->constrained('ciudadanos')->onDelete('cascade');
            $table->foreignId('partido_politico_id')->constrained('partido_politicos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudadano_partidos_politicos');
    }
};
