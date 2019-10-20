<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('time_entries', function (Blueprint $table) {
            $table->increments('id');

            $table->datetime('start_time')->nullable();

            $table->datetime('end_time')->nullable();

            $table->datetime('prazo')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
