<?php

namespace App\Http\Controllers\Junchao;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Image,Storage;//引入intervention/image和laravel自带的strong
use Qiniu\Auth;//引入七牛自带的auth
use Qiniu\Storage\UploadManager;//引入七牛的上传方法
//use App\Category1;
use zgldh\QiniuStorage\QiniuStorage;//引入七牛

class UploadController extends Controller
{
    //Ajax Uploadify上传图片//存到本地
    /*public function imgUpload(Request $request)
    {
    	$file = $request->file('Filedata');
    	$file_name = time();
		$img = Image::make($file)->save('Upload/'.$file_name.'.jpg');
		if ($img) {
            return response()->json(array(
                'status' => 1,
                'msg' => 'Upload/'.$file_name.'.jpg',
            ));
        }else{
            return Redirect::back()->withInput()->withErrors('上传失败！');
        }
    }*/
    //七牛二进制文件流上传方法，未解决//使用laravel内置storage存到本地
    /*public function imgUpload(Request $request)
    {	
    	$file = $request->file('Filedata');
    	$img = $request->all();
    	//$disk = \Storage::disk('qiniu');
    	$file_name = time();
		Storage::disk('local')->put($file_name.'.jpg', 'Contents');
		//获取文件的绝对路径
		$url = public_path('1463744842.jpg');
		//获取文件的二进制流
		//$contents = Storage::disk('local')->imageInfo($file_name.'.jpg');
    	/*Storage::disk('local')->exists($file_name.'.jpg');        //文件是否存在
		Storage::disk('local')->get($file_name.'.jpg');			//获取文件内容
		QiniuStorage::disk('local')->put($file_name.'.jpg',$contents); 	//上传文件
    }*/
    //七牛上传方法二，已成功
    public function imgUpload(Request $request)
    {	
    	$file = $request->file('Filedata') ;
	    if(!$file->isValid()){
	        return back() ;
	    }
	    // 需要填写你的 Access Key 和 Secret Key
	    $accessKey = 'd6dblzfR9UlZGGP6iM0saY8r4nV4iM6BICkYYbSb';
	    $secretKey = 'knz0s6opIhM7af-IB5blHbvndXbXdbYQFPTPrm1a';
	    // 构建鉴权对象
	    $auth = new Auth($accessKey, $secretKey);
	    // 要上传的空间
	    $bucket = 'junchao';
	    // 生成上传 Token
	    $token = $auth->uploadToken($bucket);
	    // 要上传文件的本地路径
	    $filePath = $file->getRealPath();
	    // 上传到七牛后保存的文件名
	    $key = time().rand(999,9999).".jpg";
	    // 初始化 UploadManager 对象并进行文件的上传
	    $uploadMgr = new UploadManager();
	    // 调用 UploadManager 的 putFile 方法进行文件的上传
	    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
	    //echo "\n====> putFile result: \n";
	    if ($err !== null) {
	        var_dump($err);
	        //return Redirect::back()->withInput()->withErrors('上传失败！');
	    } else {
	        $photo = 'http://7xt9bv.com1.z0.glb.clouddn.com/'.$ret['key'] ;
	        //var_dump($ret);
	        //var_dump($photo);
	        return response()->json(array(
                'status' => 1,
                'msg' => $photo,
            ));
	    }
    }
}



/*namespace App\Http\Controllers;

use Image;

class ImgController extends Controller {

	//*
	 //* @param $image
	 //* @param $size
	 //* @param $path
	 //* @return mixed
	 
	public static function ProcessAndSaveImg($image, $path) {
		$size = 640;

		// create new image with transparent background color
		$background = Image::canvas($size, $size);

		// read image file and resize it to 200x200
		// but keep aspect-ratio and do not size up,
		// so smaller sizes don't stretch
		$image = Image::make($image)->resize($size, $size, function ($c) {
			$c->aspectRatio();
			$c->upsize();
		});

		// insert resized image centered into background
		$background->insert($image, 'center');

		//$background->encode('png', 20);
		// save or do whatever you like
		return $background->save(public_path() . $path);
	}
}*/

