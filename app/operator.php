<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class operator extends Model
{
    protected $fillable = ['nama', 'jenis_kendaraan', 'no_pol'];

    function travels()
    {
        return $this->hasMany(travel::class);
    }
}
