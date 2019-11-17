<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrosTable extends Migration
{
    public function up()
    {
        Schema::create('parametros', function (Blueprint $table) {
            $table->increments('id');

            $table->string('parametro');

            $table->integer('valor')->nullable();

            $table->string('descricao')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
