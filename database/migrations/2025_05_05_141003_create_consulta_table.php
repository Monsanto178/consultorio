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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('consulta_num');
            $table->date('fecha');
            $table->string('motivo');
            
            $table->tinyInteger('altura');
            $table->decimal('peso', 4, 1)->unsigned();
            $table->tinyInteger('circunferencia');
            $table->text('anomalias');

            $table->string('sintomas', 150);
            $table->text('descripcion');
            $table->text('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta');
    }
};
