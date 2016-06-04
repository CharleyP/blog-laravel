<link rel="stylesheet" type="text/css" href="{{ asset('Home/css/article.css') }}">
@extends('Home\Base.base')
@section('content')  
 	<div class="body">
		<div class="container">
			<div class="position">
				当前位置：<a href="">主页</a>&nbsp;&gt;&gt;&nbsp;<a href="">php</a>&nbsp;&gt;&gt;&nbsp;<span>title</span>
			</div>
			<div class="row">
				@include('Home\Base.left')
				<div class="article col-md-9 col-md-offset-1">
					<div class="article-small">
						<h1 class="text-center">{{ $article->article_title }}</h1>
						<p class="text-center title">{{ $article->article_create_time }}</p>
						<p class="content">{!! $article->article_content !!}</p>
						<div class="row like">
							<div class="col-md-2 col-md-offset-4"><a class="btn btn-success">喜&nbsp;&nbsp;&nbsp;欢</a></div>
								<div class="col-md-1 col-md-offset-1"><a class="btn btn-warning">不喜欢</a></div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
@endsection