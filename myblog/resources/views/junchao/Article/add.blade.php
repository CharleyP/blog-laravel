<meta name="_token" content="{{ csrf_token() }}"/>
@extends('junchao\Base.base')
@section('content')    
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
              <div class="box box-primary">
                <div class="title" style="margin-top:20px;margin-bottom:20px;">
                	<div class="row">
                        <div class="col-md-2 text-right">标题：</div>
                		<div class="col-md-8"><input type="text" class="form-control" placeholder="请输入文章标题" value=""></div>
                	</div>
                </div>
                <div class="info" style="margin-top:20px;margin-bottom:20px;">
                    <div class="row">
                        <div class="col-md-2 text-right">简介：</div>
                        <div class="col-md-8">
                            <textarea style="width:100%;text-indent:10px;" class="article_info"></textarea>
                        </div>
                    </div>
                </div>
                <div class="category1" style="margin-top:20px;margin-bottom:20px;">
                    <div class="row">
                        <div class="col-md-2 text-right">一级栏目：</div>
                        <div class="col-md-3 select-category1">
                            <select name="" id="input" class="form-control" required="required">
                                <option value="">请选择一级列表</option>
                                @foreach($category1 as $val)
                                <option value="{{ $val->category1_id }}">{{ $val->category1_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="category2" style="margin-top:20px;margin-bottom:20px;">
                    <div class="row">
                        <div class="col-md-2 text-right">二级栏目：</div>
                        <div class="col-md-3 select-category2">
                            <select name="" id="input" class="form-control" required="required">
                                <option value="">请选择二级列表</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="article-img" style="margin-top:20px;margin-bottom:20px;">
                    <div class="row">
                        <div class="col-md-2 text-right">选择封面图片：</div>
                        <div class="col-md-4"><input type="file" name="file_upload" id="file_upload" /></div>
                        <div class="col-md-2">
                            <a class="btn btn-sm" href="javascript:$('#file_upload').uploadify('upload','*')">上传</a>
                        </div>
                        <div class="col-md-4 img-show">
                            <img src="" width="100px">
                        </div>
                    </div>
                </div>
                <div class="article-content">
                    <div class="row">
                        <div class="col-md-2 text-right">正文：</div>
                        <div class="col-md-9">
                            <script type="text/javascript" charset="utf-8" src="{{ asset('Junchao/ue/ueditor.config.js') }}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{ asset('Junchao/ue/ueditor.all.js') }}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{ asset('Junchao/ue/lang/zh-cn/zh-cn.js') }}"></script>
                            <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
                            <script type="text/javascript">
                                var ue = UE.getEditor('editor');
                                ue.ready( function( editor ) {
                                     ue.setContent('请在此输入文章内容');
                                 } );
                                function setContent(isAppendTo) {
                                    var arr = [];
                                    arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
                                    UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
                                    alert(arr.join("\n"));
                                }
                                function getContent() {
                                    var arr = [];
                                    arr.push("使用editor.getContent()方法可以获得编辑器的内容");
                                    arr.push("内容为：");
                                    arr.push(UE.getEditor('editor').getContent());
                                    alert(arr.join("\n"));
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="add-submit text-center" style="margin-top:20px;margin-bottom:20px;"><a class="btn btn-info">添加文章</a></div>
                <script type="text/javascript" src="{{ asset('Junchao/uploadify/jquery.uploadify.min.js') }}"></script>
                <script type="text/javascript" src="{{ asset('Junchao/js/article_add.js') }}"></script>
                <link rel="stylesheet" type="text/css" href="{{ asset('Junchao/uploadify/uploadify.css') }}">
                <script type="text/javascript">
                $(document).ready(function() {
                    $("#file_upload").uploadify({
                        'height'        : 27,
                        'width'         : 80, 
                        'buttonText'    : '选择图片',
                        'swf'           : "{{ asset('Junchao/uploadify/uploadify.swf') }}",
                        'uploader'      : '/Junchao/article/uploadImg',
                        'auto'          : false,
                        'multi'         : false,
                        'removeCompleted':false,
                        //'cancelImg'     : "{{ asset('Admin/uploadify/uploadify-cancel.png') }}",
                        'fileTypeExts'  : '*.jpg;*.jpge;*.gif;*.png',
                        'fileSizeLimit' : '2MB',
                        'formData': {
                            '_token': $('meta[name="_token"]').attr('content')
                        },
                        'onUploadSuccess':function(file,data,response){
                            $('#' + file.id).find('.data').html('上传成功');
                            $("#file_upload").val(data);
                            data = $.parseJSON(data);
                            $(".img-show img").attr("src",data['msg']);
                        },
                    })
                });
                </script>
              </div>
            </div>
        </div>
    </div>
@endsection