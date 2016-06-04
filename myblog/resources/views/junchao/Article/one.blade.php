@extends('junchao\Base.base')
@section('content')    
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
              <div class="box box-primary">
                <div class="article-small">
                  <h1 class="text-center">{{ $article_one->article_title }}</h1>
                  <p class="text-center title">{{ $article_one->article_create_time }}</p>
                  <div class="article_content" style="margin:20px;font-size:18px;text-indent:30px;">
                    {!! $article_one->article_content !!}
                  </div>
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div>
        </div>
@endsection