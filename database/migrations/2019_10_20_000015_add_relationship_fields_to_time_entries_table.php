<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->unsignedInteger('work_type_id')->nullable();

            $table->foreign('work_type_id', 'work_type_fk_489431')->references('id')->on('time_work_types');

            $table->unsignedInteger('project_id')->nullable();

            $table->foreign('project_id', 'project_fk_489432')->references('id')->on('time_projects');

            $table->unsignedInteger('chamado_id')->nullable();

            $table->foreign('chamado_id', 'chamado_fk_490815')->references('id')->on('chamados');

            $table->unsignedInteger('status_id')->nullable();

            $table->foreign('status_id', 'status_fk_491410')->references('id')->on('status_chamados');

            $table->unsignedInteger('usuario_id')->nullable();

            $table->foreign('usuario_id', 'usuario_fk_491534')->references('id')->on('users');
        });
    }
}
