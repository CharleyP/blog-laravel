<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category2 extends Model
{
    //
    public $table = 'category2';
    public $primaryKey = 'category2_id';
    public $timestamps = true;

    public function category1(){
    	return $this->belongsTo('App\Category1');
    }
}
