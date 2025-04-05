<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Tabla: animales
        Schema::table('animales', function (Blueprint $table) {
            $table->boolean('isActive')->default(true)->after('especie');
        });

        // Tabla: continentes
        Schema::table('continentes', function (Blueprint $table) {
            $table->boolean('isActive')->default(true);
        });

        // Tabla: vegetaciones
        Schema::table('vegetaciones', function (Blueprint $table) {
            $table->boolean('isActive')->default(true);
        });

        // Tabla: ecosistemas
        Schema::table('ecosistemas', function (Blueprint $table) {
            $table->boolean('isActive')->default(true);
        });
    }

    public function down(): void {
        // Eliminar el campo de todas las tablas en caso de rollback
        Schema::table('animales', function (Blueprint $table) {
            $table->dropColumn('isActive');
        });

        Schema::table('continentes', function (Blueprint $table) {
            $table->dropColumn('isActive');
        });

        Schema::table('vegetaciones', function (Blueprint $table) {
            $table->dropColumn('isActive');
        });

        Schema::table('ecosistemas', function (Blueprint $table) {
            $table->dropColumn('isActive');
        });
    }
};