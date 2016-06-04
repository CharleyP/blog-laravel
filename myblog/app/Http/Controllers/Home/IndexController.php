<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\article;
use App\category1;
use App\category2;

class IndexController extends Controller
{
    //
    public function index(){
    	$data = article::limit(4)->get();
        $topMenu = category1::where('category1_show','=','1')->with('category2')->limit(5)->get();
        $top = category1::with('category2')->get();
    	return view('Home\Index.index',compact('data','topMenu','dropdown','top'));
    }
    public function alist($id){
        $list = article::where('category2_id','=',$id)->get();
        $topMenu = category1::where('category1_show','=','1')->with('category2')->limit(5)->get();
        $category1 = category1::with('Category2')->get();//关联模型一对多的写法
        /*$category1 = category1::all();
        foreach ($category1 as $key => $value) {
            $category1_id = $value->category1_id;
            $value->category2_name = category2::where('category1_id','=',$category1_id)->get();
        }*/
    	return view('Home\Index.list',compact('category1','list','topMenu','dropdown'));
    }
    public function article($id){
        $article = article::findOrFail($id);//where('article_id','=',$id)->get();//
        $category1 = category1::with('Category2')->get();
        $topMenu = category1::where('category1_show','=','1')->with('category2')->limit(5)->get();
    	return view('Home\Index.article',compact('category1','article','topMenu','dropdown'));
    }
    public function search(Request $request){
        $input = $request->all();
        $search = $request->input('search');
        $list = article::where('article_title','like','%'.$search.'%')->get();
        $topMenu = category1::where('category1_show','=','1')->with('category2')->limit(5)->get();
        $category1 = category1::with('Category2')->get();
        return view('Home\Index.search',compact('category1','dropdown','topMenu','list'));
    }
}
