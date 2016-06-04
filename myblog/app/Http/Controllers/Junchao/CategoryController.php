<?php

namespace App\Http\Controllers\Junchao;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;//事务调用
use App\Article;
use App\Category1;
use App\Category2;
//use Input,Request;

class CategoryController extends Controller
{
    //
    public function showList(){
    	$category1 = category1::with('Category2')->get();
    	//dd($category1);
    	return view('Junchao\Category.list',compact('category1'));
    }
    public function addCategory1(Request $request){
    	$category1 = new category1;
    	$category1->category1_name = $request->input('category1_name');
    	$category1->category1_show = $request->input('category1_show');
    	$category1->save();
    	if ($category1->save()) {
    		return response()->json(array(
            	'status' => 1,
            	'msg' => '添加成功',
        	));
    	}else{
    		return Redirect::back()->withInput()->withErrors('添加失败！');
    	}
    }
    /*public function addCategory1(Request $request){//可以用两种方法接收input，使用此方法要在上面修改use
        $category1 = new category1;
        $category1->category1_name = Request::Input('category1_name');
        $category1->category1_show = Request::Input('category1_show');
        $category1->save();
        if ($category1->save()) {
            return response()->json(array(
                'status' => 1,
                'msg' => '添加成功',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('添加失败！');
        }
    }*/
    public function deleteCategory1(){

    }
    public function changeCategory1(Request $request){
        $category1_id = $request->input('category1_id');
        $category1_name = $request->input('category1_name');
        $category1_show = $request->input('category1_show');
        $result =  category1::where('category1_id','=', $category1_id)
                            ->update([
                                'category1_name' => $category1_name,
                                'category1_show' => $category1_show
                                ]);
        if ($result) {
            return response()->json(array(
                'status' => 1,
                'msg' => '修改成功',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('修改失败！');
        }
    }
    public function addCategory2(Request $request){
        $category2 = new category2;
        $category2->category2_name = $request->input('category2_name');
        $category2->category2_show = $request->input('category2_show');
        $category2->category1_id = $request->input('category1_id');
        $category2->save();
        if ($category2->save()) {
            return response()->json(array(
                'status' => 1,
                'msg' => '添加成功',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('添加失败！');
        }
    }
    public function deleteCategory2(Request $request){
        DB::beginTransaction();
        $category2_id = $request->input('category2_id');
        $result1 = category2::find($category2_id)->delete();
        $result2 = 0;//article::where('category2_id','=',$category2_id)->delete();
        if($result1 && $result2){
            DB::commit();
            return response()->json(array(
                'status' => 1,
                'msg' => '删除成功',
            ));
        }else{
            DB::rollback();
            return Redirect::back()->withInput()->withErrors('删除失败！');
        }
    }
    public function changeCategory2(Request $request){
        $category2_id = $request->input('category2_id');
        $category2_name = $request->input('category2_name');
        $category2_show = $request->input('category2_show');
        $result =  category2::where('category2_id','=', $category2_id)
                            ->update([
                                'category2_name' => $category2_name,
                                'category2_show' => $category2_show
                                ]);
        if ($result) {
            return response()->json(array(
                'status' => 1,
                'msg' => '修改成功',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('修改失败！');
        }
    }
    public function showListCategory2($id){
        $article_list = article::where('category2_id','=',$id)->get();
        return view('Junchao\Category.listCate2',compact('article_list'));
    }
}
