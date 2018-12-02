<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operator');
            $table->string('jenis_kendaraan');
            $table->string('kapasitas');
            $table->string('no_pol');
            $table->string('asal');
            $table->string('tujuan');
            $table->string('name');
            $table->string('email');
            $table->integer('handphone');
            $table->date('tgl_keberangkatan');
            $table->date('jadwal_keberangkatan');
            $table->date('tgl_datang');
            $table->date('jadwal_datang');
            $table->integer('jml_orang');
            $table->integer('total');
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
        Schema::dropIfExists('travelforms');
    }
}
