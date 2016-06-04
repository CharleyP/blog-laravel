<?php

namespace App\Http\Controllers\Junchao;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Acount;
class AcountController extends Controller
{
    //
    public function showUser(){
    	$acount = Acount::all();
    	//dd($acount);
    	return view('Junchao/Acount.list',compact('acount'));
    }
}
