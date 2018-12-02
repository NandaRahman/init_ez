<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tourform extends Model
{
    protected $table = 'tourforms';
    public $fillable = ['id_payment', 'name', 'email', 'phone', 'total', 'destination', 'tgl_keberangkatan', 'jml_orang', 'catatan'];
}
