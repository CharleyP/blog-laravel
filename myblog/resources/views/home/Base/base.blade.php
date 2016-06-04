<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="{{ asset('Home/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('Home/js/bootstrap.min.js') }}"></script>	
	<script type="text/javascript" src="{{ asset('Home/js/left.js') }} "></script>	
	<script type="text/javascript" src="{{ asset('Home/js/hover.js') }}"></script>	
	<link rel="stylesheet" type="text/css" href="{{ asset('Home/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Home/css/header.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Home/css/footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Home/css/left.css') }}">
</head>
<body>
	@include('Home\Base.head')
	@yield('content')
	@include('Home\Base.footer')
</body>
</html>