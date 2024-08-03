<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ciudadanos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->string('curp')->unique();
            $table->text('direccion');
            $table->text('trabajos_sociales')->nullable();
            $table->enum('sexo', ['M', 'F']); // M para masculino, F para femenino
            $table->foreignId('padre_id')->nullable()->constrained('ciudadanos');
            $table->foreignId('madre_id')->nullable()->constrained('ciudadanos');
            $table->foreignId('localidad_id')->constrained(); // Relación con localidades
            $table->timestamps();
        });
        // Tabla intermedia para la relación muchos a muchos entre ciudadanos y programas sociales
        Schema::create('ciudadano_programa_social', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ciudadano_id')->constrained('ciudadanos')->onDelete('cascade');
            $table->foreignId('programa_social_id')->constrained('programa_socials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudadano_programa_social');
        Schema::dropIfExists('ciudadanos');
    }
};
