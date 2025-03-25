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
        Schema::create('ecosistemas', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('continente_id');
            $table->string('nombre', 100); 
            $table->string('clima', 50); 
            $table->string('distribucion', 100); 
            $table->integer('altitud'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecosistemas');
    }
};
