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
            $table->id();
            $table->unsignedBigInteger('idcurso'); // Relación con la tabla curso
            $table->unsignedBigInteger('iddocente'); // Relación con la tabla docente
            $table->string('imagen');
            $table->string('font_size', 5,2);
            $table->string('font_angle', 5,2);
            $table->Float('x', 5,2);
            $table->string('y', 5,2);
            $table->string('text_color');
            $table->string('text_font');
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
