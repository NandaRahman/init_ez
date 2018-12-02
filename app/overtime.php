<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class overtime extends Model
{
	protected $table = 'overtime';
    protected $fillable = ['travelform_id', 'total_overtime', 'must_paid'];

}
