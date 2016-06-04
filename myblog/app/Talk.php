<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    //
	public $table = 'talk';
    public $primaryKey = 'talk_id';
    public $timestamps = true;
}
