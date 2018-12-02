<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTourforms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destination');
            $table->string('name');
            $table->string('email');
            $table->integer('handphone');
            $table->date('departure');
            $table->integer('jml_orang');
            $table->text('note');
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
        Schema::dropIfExists('tourforms');
    }
}
