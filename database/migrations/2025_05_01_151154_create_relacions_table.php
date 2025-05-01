<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacions', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->unsignedInteger('idestudiante'); // Relación con estudiante
            $table->unsignedInteger('idcurso'); // Relación con curso
            $table->unsignedInteger('iddocente'); // Relación con docente
            $table->unsignedInteger('idcertificado')->nullable(); // Relación con certificado
            $table->date('fecha');
            $table->decimal('calificacion', 5, 2)->nullable();
            $table->decimal('monto', 8, 2);
            $table->decimal('haber', 8, 2)->default(0);
            $table->decimal('debe', 8, 2)->default(0);
            $table->string('habilitado')->default('NO'); // Estado del registro
            $table->string('link')->nullable()->default('-'); // Estado del registro
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
        Schema::dropIfExists('relacions');
    }
}
