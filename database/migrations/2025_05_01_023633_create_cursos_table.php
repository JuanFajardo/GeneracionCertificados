<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('curso');
            $table->integer('cargahoraria');
            $table->text('descripcion')->nullable();
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->decimal('monto', 8, 2);
            $table->unsignedInteger('iddocente'); // Relación con docente
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
        Schema::dropIfExists('cursos');
    }
}
