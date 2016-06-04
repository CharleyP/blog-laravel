<meta name="_token" content="{{ csrf_token() }}"/>
@extends('junchao\Base.base')
@section('content')    
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:20px">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">文章列表</h2>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="查找">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped" style="table-layout:fixed">
                      <thead>
                        <th class="text-center">用户id</td>
                        <th class="text-center">姓名</td>
                        <th class="text-center">邮箱</td>
                        <th class="text-center">注册时间</td>
                        <th class="text-center">操作</td>
                      </thead>
                      <tbody>
                        @foreach($acount as $val)
                        <tr>
                            <input type="hidden" value=""/>
                            <td class="text-center mailbox-name" style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;"><a href="{{url('Junchao/article/'.$val->article_id)}}">{{ $val->id }}</a></td>
                            <td class="text-center mailbox-date">{{ $val->name }}</td>
                            <td class="text-center mailbox-date">{{ $val->email }}</td>
                            <td class="text-center mailbox-category2">{{ $val->created_at }}</td>
                            <td class="text-center">
                              <a href="{{url('Junchao/acount/change/'.$val->article_id)}}" class="btn btn-default btn-sm article-change">
                                编辑
                              </a>
                              <input type="hidden" value="{{ $val->id }}" class="hidden-id" />
                              <a class="btn btn-default btn-sm article-delete">
                                删除
                              </a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div>
        </div>
        <script type="text/javascript" src="{{ asset('Junchao/js/article_delete.js') }}"></script>
        <style type="text/css">
          .mailbox-name a{
            color: #000;
            font-size: 14px;
          }
          .mailbox-name a:hover{
            color: red;
          }
        </style>
@endsection