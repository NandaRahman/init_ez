<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tour extends Model
{
    protected $table = 'tours';
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected $fillable = [
        'url', 'city_id', 'paket', 'durasi', 'harga', 'keterangan', 'fasilitas', 'transportasi','status',
    ];

}
