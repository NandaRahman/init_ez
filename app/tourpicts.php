<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tourpicts extends Model
{
    protected $table = 'tourpicts';
    protected $fillable = [
        'tour_id', 'url', 'caption',
    ];
}
