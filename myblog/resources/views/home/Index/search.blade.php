<link rel="stylesheet" type="text/css" href="{{ asset('Home/css/alist.css') }}">
@extends('Home\Base.base')
@section('content')    
    <div class="list">
		<div class="container">
			<div class="position">
				当前位置：<a href="{{ url('/') }}">主页</a>&nbsp;&gt;&gt;&nbsp;<span>查找</span>
			</div>
			<div class="row">
				@include('Home\Base.left')
				<div class="col-md-9 col-md-offset-1 article">
					<ul>
						@foreach($list as $val)
							<li>
								<h4><a href="{{url('article/'.$val->article_id)}}">{{ $val->article_title }}</a></h4>
								<div class="row">
									<div class="col-md-3">
										<a href="{{url('article/'.$val->article_id)}}"><img src="{{ asset('Home/img/bg1.jpg') }}" width="100%"></a>
									</div>
									<div class="col-md-9 article_content">
										<p>{!! $val->article_content !!}</p>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection