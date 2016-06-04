<?php

namespace App\Http\Controllers\Junchao;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\Category1;
use App\Category2;

class ArticleController extends Controller
{
    //
    //查
    public function showList(){
    	$article_list = Article::all();
    	return view('junchao\Article.list',compact('article_list'));
    }
    public function showOne($id){
    	$article_one = Article::find($id);
    	return view('junchao\Article.one',compact('article_one'));
    }
    public function change($id){
    	$category1 = category1::all();
    	$article_one = Article::find($id);
    	$category2_name = Article::with('category2')->find($id);
    	$category2_id = Article::find($id)->category2_id;
    	$category1_name = category2::with('category1')->find($category2_id);
    	$category1_id = $category1_name->category1_id;
    	$category2_list = category2::where('category1_id','=',$category1_id)->get();
    	return view('junchao\Article.change',compact('article_one','category1','category2_name','category1_name','category2_list'));
    }
    //页面显示
    public function add(){
    	$category1 = category1::all();
    	return view('junchao\Article.add',compact('category1'));
    }
    //文章删除//删
    public function deleteArticle(Request $request){
        $article_id = $request->input('article_id');
        $article = Article::find($article_id);
        $result = $article->delete();
        if ($result) {
            return response()->json(array(
                'status' => 1,
                'msg' => '删除成功',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('修改失败！');
        }
    }
    //获取添加文章的内容//增
    public function getArticle(Request $request){
	    $article = new Article;
        //
	    $article->article_title = $request->input('article_title');
        $article->article_info = $request->input('article_info');
	    $article->article_content = $request->input('article_content');
	    $article->category2_id = $request->input('category2_id');
        $article->article_img = $request->input('article_img');
	    $article->article_like = 0;
	    $article->article_dislike =0;
	    $result = $article->save();
        if ($result) {
            return response()->json(array(
                'status' => 1,
                'msg' => '添加成功',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('添加失败！');
        }
    }
    //获取修改文章的内容//改
    public function changeArticle(Request $request){
        /*$article_id = $request->input('article_id');
        $article_title = $request->input('article_title');
        $article_content = $request->input('article_content');
        $category2_id = $request->input('category2_id');
        $result =  Article::where('article_id','=', $article_id)
                            ->update([
                                'article_title' => $article_title,
                                'article_content' => $article_content,
                                'category2_id' => $category2_id
                                ]);*/
        $article_id = $request->input('article_id');
        $article = Article::find($article_id);
	    $article->article_title = $request->input('article_title');
        $article->article_info = $request->input('article_info');
        $article->article_img = $request->input('article_img');
	    $article->article_content = $request->input('article_content');
	    $article->category2_id = $request->input('category2_id');
        $result = $article->save();
        if ($result) {
            return response()->json(array(
                'status' => 1,
                'msg' => '修改成功',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('修改失败！');
        }
    }
    //选择一级栏目，获取二级栏目内容
    public function getCategory1(Request $request){
    	$category1_id = $request->input('category1_id');
    	$data = category2::where('category1_id','=',$category1_id)->get();
    	return $data;
    }
}
