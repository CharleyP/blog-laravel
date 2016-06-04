<div class="header">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">My Blog</a>
			</div>
	
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">HomePage</a></li>
					@foreach($topMenu as $val)
						<li class="cate1">
							<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">{{ $val->category1_name }}<b class="caret"></b></a>
							<ul class="dropdown-menu">
	                            @foreach($val->category2 as $val)
									<li class="text-center"><a href="{{url('alist/'.$val->category2_id)}}">{{ $val->category2_name }}</a></li>
								@endforeach
	                        </ul>
						</li>
					@endforeach
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/logout">登出</a></li>
							</ul>
						</li>
					@else
						<li><a href="/login">登陆</a></li>
					@endif
				</ul>
				<form class="navbar-form navbar-right" role="form" action="{{ url('/article/search') }}" method="post">
					{!! csrf_field() !!}
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" name="search">
					</div>
					<button type="submit" class="btn btn-default">查找</button>
				</form>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
</div>