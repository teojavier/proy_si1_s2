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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('metodo')->nullable();
            $table->text('ruta')->nullable();
            $table->string('direccion_ip')->nullable();
            $table->text('navegador')->nullable();
            $table->string('tabla')->nullable();
            $table->string('registro_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
