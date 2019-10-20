<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusChamadosTable extends Migration
{
    public function up()
    {
        Schema::create('status_chamados', function (Blueprint $table) {
            $table->increments('id');

            $table->string('status')->unique();

            $table->string('descricao');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
