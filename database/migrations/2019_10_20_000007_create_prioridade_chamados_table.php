<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioridadeChamadosTable extends Migration
{
    public function up()
    {
        Schema::create('prioridade_chamados', function (Blueprint $table) {
            $table->increments('id');

            $table->string('prioridade');

            $table->string('descricao');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
