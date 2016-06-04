<?php

namespace App\Http\Controllers\Junchao;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Talk;
use App\Article;
class TalkController extends Controller
{
    //
    public function showTalk(){
    	$talk = Article::with('Talk')->get();
    	//dd($talk);
    	return view('Junchao\Talk.list',compact('talk'));
    }
}
