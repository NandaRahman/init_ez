<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('operator_id')->unsigned()->references('id')->on('operators');
            $table->string('asal');
            $table->date('tgl_berangkat');
            $table->string('tujuan');
            $table->date('tgl_datang');
            $table->time('jadwal');
            $table->integer('harga');
            $table->string('tipe_travel');
            
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
        Schema::dropIfExists('travels');
    }
}
