<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public $table = 'article';
    public $primaryKey = 'article_id';
    public $timestamps = true;

    public function category2(){
    	return $this->belongsTo('App\Category2');
    }
    public function talk(){
    	return $this->hasMany('App\Talk');
    }
}
