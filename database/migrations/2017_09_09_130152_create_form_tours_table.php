<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_tours', function(Blueprint $table){
            $table->integer('id_user')->unsigned();
            $table->string('destination');
            $table->date('departure');
            $table->integer('jml_orang');
            $table->integer('total');
            $table->integer('id_payment')->unsigned();
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
        Schema::dropIfExists('form_tours');
    }
}
