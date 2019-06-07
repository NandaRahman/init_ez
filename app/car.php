<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
	protected $table = 'mobils';
    protected $fillable = ['merk_mobil', 'nopol_mobil', 'kapasitas_mobil', 'harga_mobil', 'gambar_mobil', 'jumlah_total',"city"];

    public function available_car(){
        $travel = travelform::where("status","=","0")->where("car_id","=",$this->id)->get()->count();
        return $this->jumlah_total - $travel;
    }

}
