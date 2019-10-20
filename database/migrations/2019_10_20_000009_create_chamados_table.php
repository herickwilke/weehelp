<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChamadosTable extends Migration
{
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->increments('id');

            $table->string('titulo');

            $table->longText('descricao');

            $table->datetime('prazo');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
