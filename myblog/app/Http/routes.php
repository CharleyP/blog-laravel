<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
    Route::get('/', function () {
        return view('welcome');
    });

//前端登录注册
Route::group(['middleware' => 'web'], function () {
    Route::auth();//定义了注册登录路由
    Route::get('/home', 'HomeController@index');//认证通过后跳转路由。
});

//前端页面路由
    Route::get('/', 'Home\IndexController@index');
    Route::get('/alist/{id}', 'Home\IndexController@alist');
    Route::get('/article/{id}', 'Home\IndexController@article');
    Route::post('/article/search', 'Home\IndexController@search');

//后台登录注册
Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('home', 'HomeController@index');

    Route::get('admin/login', 'Admin\AuthController@getLogin');
    Route::post('admin/login', 'Admin\AuthController@postLogin');
    Route::get('admin/register', 'Admin\AuthController@getRegister');
    Route::post('admin/register', 'Admin\AuthController@postRegister');
    Route::get('admin/logout', 'Admin\AuthController@getLogout');
    Route::get('admin', 'AdminController@index');
});

Route::group(['middleware' => ['admin']], function () {
    // 只有认证用户可以进入后台管理...
        //文章管理
        Route::get('junchao/article', 'Junchao\ArticleController@showList');
        Route::get('junchao/article/add', 'Junchao\ArticleController@add');
        Route::get('junchao/article/change/{id}', 'Junchao\ArticleController@change');
        Route::get('junchao/article/{id}', 'Junchao\ArticleController@showOne');
        Route::post('junchao/article/getArticle', 'Junchao\ArticleController@getArticle');
        Route::post('junchao/article/getCategory1', 'Junchao\ArticleController@getCategory1');
        Route::post('junchao/article/changeArticle', 'Junchao\ArticleController@changeArticle');
        Route::post('junchao/article/deleteArticle', 'Junchao\ArticleController@deleteArticle');
        Route::post('junchao/article/uploadImg', 'Junchao\UploadController@imgUpload');
        //分类管理
        Route::get('junchao/category', 'Junchao\CategoryController@showList');
        Route::post('junchao/category/findCategory2', 'Junchao\CategoryController@findCategory2');
        Route::post('junchao/category/addCategory1', 'Junchao\CategoryController@addCategory1');
        Route::post('junchao/category/addCategory2', 'Junchao\CategoryController@addCategory2');
        Route::post('junchao/category/deleteCategory2', 'Junchao\CategoryController@deleteCategory2');
        Route::post('junchao/category/changeCategory2', 'Junchao\CategoryController@changeCategory2');
        Route::post('junchao/category/changeCategory1', 'Junchao\CategoryController@changeCategory1');
        Route::get('junchao/category2/{id}', 'Junchao\CategoryController@showListCategory2');
        //用户管理
        Route::get('junchao/acount', 'Junchao\AcountController@showUser');
        //评论管理
        Route::get('junchao/talk', 'Junchao\TalkController@showTalk');
});

    