<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('nombre');
            $table->string('paterno')->nullable()->default('');
            $table->string('materno')->nullable()->default('');
            $table->string('celular')->nullable()->default('0');
            $table->string('ci')->nullable()->default('0');
            $table->string('correo')->unique();
            $table->string('departamento')->nullable()->default('-');
            $table->string('pais')->nullable()->default('-');
            $table->string('profesion')->nullable()->default('');
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
