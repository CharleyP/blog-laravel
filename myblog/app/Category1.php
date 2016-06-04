<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category1 extends Model
{
    //
    public $table = 'category1';
    public $primaryKey = 'category1_id';
    public $timestamps = true;
    
    public function Category2(){
    	return $this->hasMany('App\category2');
    }
}
