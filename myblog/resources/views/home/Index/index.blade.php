<link rel="stylesheet" type="text/css" href="{{ asset('Home/css/index.css') }}">
@extends('Home\Base.base')
@section('content') 
		<div class="banner">
			<div class="">
				<div class="container">
					<a href="" class="btn btn-success" style="margin:20% 0px 0px 10%">Back App</a>
				</div>
			</div>
		</div>
		<div class="info text-center">
			<div class="container">
				asciinema [as-kee-nuh-muh] is a free and open source solution for recording terminal sessions and sharing them on the web.
			</div>
		</div>
		<div class="mainList">
			<div class="container">
			<div class="row">
				<div class="col-md-8 small-list">
					<ul>
						@foreach($data as $val)
							<li>
								<h4><a href="{{url('article/'.$val->article_id)}}">{{ $val->article_title }}</a></h4>
								<div class="row">
									<div class="col-md-3">
										<a href="{{url('article/'.$val->article_id)}}"><img src="{{ $val->article_img }}" width="100%"></a>
									</div>
									<div class="col-md-9 article_content">
										{{ $val->article_info }}
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<div class="right-nav">
						<h4>精心推荐</h4>
						<ul>
							<li><a href="">最新文最新文最新文最新文最章</a></li>
							<li><a href="">最新文章</a></li>
							<li><a href="">最新文章</a></li>
							<li><a href="">最新文章</a></li>
							<li><a href="">最新文章</a></li>
							<li><a href="">最新文章</a></li>
							<li><a href="">最新文章</a></li>
						</ul>
					</div>
				</div>
			</div>
			</div>
		</div>
@endsection
