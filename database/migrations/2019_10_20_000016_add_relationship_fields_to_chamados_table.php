<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToChamadosTable extends Migration
{
    public function up()
    {
        Schema::table('chamados', function (Blueprint $table) {
            $table->unsignedInteger('responsavel_id');

            $table->foreign('responsavel_id', 'responsavel_fk_489405')->references('id')->on('users');

            $table->unsignedInteger('setor_id');

            $table->foreign('setor_id', 'setor_fk_489418')->references('id')->on('setors');

            $table->unsignedInteger('projeto_id');

            $table->foreign('projeto_id', 'projeto_fk_489502')->references('id')->on('time_projects');

            $table->unsignedInteger('prioridade_id');

            $table->foreign('prioridade_id', 'prioridade_fk_491406')->references('id')->on('prioridade_chamados');

            $table->unsignedInteger('status_id');

            $table->foreign('status_id', 'status_fk_491407')->references('id')->on('status_chamados');
        });
    }
}
