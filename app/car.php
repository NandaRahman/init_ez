<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
	protected $table = 'mobils';
    protected $fillable = ['merk_mobil', 'nopol_mobil', 'kapasitas_mobil', 'harga_mobil', 'gambar_mobil'];

}
