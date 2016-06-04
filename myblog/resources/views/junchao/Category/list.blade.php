<meta name="_token" content="{{ csrf_token() }}"/>
@extends('junchao\Base.base')
@section('content')    
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-10 col-md-offset-1" style="margin-top:20px;background-color:#fff">
         	<h3>栏目管理</h3>
            <a href="javascript:void(0)" class="btn btn-default cate1-add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加分类</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center">分类名称</th>
                        <th class="text-center">主页显示</th>
                        <th class="text-center">文章数</th>
                        <th class="text-center">操作</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                @foreach($category1 as $val)
                <tbody>
                    <tr class="cate1">
                        <td class="text-center">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </td>
                        <td class="text-center">
                            <input type="hidden" value="{{ $val->category1_id }}" class="cate1-id" />
                            {{ $val->category1_name }}
                        </td>
                        <td class="text-center">{{ $val->category1_show }}</td>
                        <td class="text-center">{{ $val->category1_show }}</td>
                        <td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-sm cate2-show">查看子分类</a></td>
                        <td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-sm cate1-change">修改</a></td>
                        <td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-sm cate1-delete">删除</a></td>
                        <td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-sm cate2-add">添加子分类</a></td>
                    </tr>
                    @foreach($val->Category2 as $val)
                    <tr class="cate2 hide">
                        <td class="text-center"></td>
                        <td class="text-center cate2-name">
                            <input type="hidden" value="{{ $val->category2_id }}" class="cate2-id" />
                            <a href="{{url('Junchao/category2/'.$val->category2_id)}}">{{ $val->category2_name }}</a>
                        </td>
                        <td class="text-center">{{ $val->category2_show }}</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-sm cate2-change">修改</a></td>
                        <td class="text-center"><a href="javascript:void(0)" class="btn btn-default btn-sm cate2-delete">删除</a></td>
                        <td class="text-center"><a href="{{url('Junchao/category2/'.$val->category2_id)}}" class="btn btn-default btn-sm">查看文章</a></td>
                    </tr>
                    @endforeach
                </tbody>
                @endforeach 
            </table>
        </div><!-- /.col -->
      </div>
    </div>
    <link rel="stylesheet" type="text/css" href="{{ asset('Junchao/css/category.css') }}">
    <script type="text/javascript" src="{{ asset('Junchao/js/category.js') }}"></script>
    <style type="text/css">
    .cate2-name a{
        color: #000;
        font-size: 16px;
    }
    .cate2-name a:hover{
        color: red;
    }
    </style>
@endsection