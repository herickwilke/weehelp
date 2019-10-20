<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetorUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('setor_user', function (Blueprint $table) {
            $table->unsignedInteger('setor_id');

            $table->foreign('setor_id', 'setor_id_fk_489419')->references('id')->on('setors')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_489419')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
