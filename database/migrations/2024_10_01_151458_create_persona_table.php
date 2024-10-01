<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id(); // Campo ID
            $table->string('nombre'); // Campo nombre
            $table->string('apellidos'); // Campo apellidos
            $table->integer('edad'); // Campo edad
            $table->string('sexo'); // Campo sexo
            $table->string('correo')->unique(); // Campo correo, debe ser único
            $table->string('nacionalidad'); // Campo nacionalidad
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
