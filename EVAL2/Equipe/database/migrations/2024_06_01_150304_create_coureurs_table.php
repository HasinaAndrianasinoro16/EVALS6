<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coureurs', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom');
            $table->int('numeros');
            $table->select('genre');
            $table->date('dtn');
            $table->int('equipe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coureurs');
    }
};
