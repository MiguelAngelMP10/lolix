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
        Schema::table('ciudadanos', function (Blueprint $table) {
            $table->string('telefonos')->nullable()->after('localidad_id');
            $table->string('redes_sociales')->nullable()->after('telefonos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ciudadanos', function (Blueprint $table) {
            $table->dropColumn('telefonos');
            $table->dropColumn('redes_sociales');
        });
    }
};
