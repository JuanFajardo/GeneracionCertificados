<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->unsignedBigInteger('idcurso'); // Relación con la tabla curso
            $table->unsignedBigInteger('iddocente'); // Relación con la tabla docente
            $table->string('certificado');
            $table->text('imagen');
            $table->boolean('habilitado')->default(false); // Estado del certificado
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
        Schema::dropIfExists('certificados');
    }
}
