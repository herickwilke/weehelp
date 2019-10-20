<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetorsTable extends Migration
{
    public function up()
    {
        Schema::create('setors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome');

            $table->string('descricao')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
