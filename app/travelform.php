<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelform extends Model
{
    protected $table = 'travelforms';
    public $fillable = ['operator', 'jenis_kendaraan','tipe_travel','nama_bandara', 'asal', 'tujuan', 'name', 'email', 'handphone', 'tgl_keberangkatan', 'jadwal_keberangkatan', 'tgl_datang', 'jadwal_datang', 'jml_orang', 'total', 'note','durasi', 'status', 'driver_id',"car_id"];
}
