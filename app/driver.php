<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    protected $table = "drivers";
    protected $fillable = ['name','address','phone','status',];

}
