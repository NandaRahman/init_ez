<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'cities';
    public function tour()
    {
        return $this->hasMany(Tour::class);
    }
}
