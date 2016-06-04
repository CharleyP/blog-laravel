<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<script type="text/javascript" src="{{ asset('Junchao/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('Junchao/js/bootstrap.min.js') }}"></script>	
	<script type="text/javascript" src="{{ asset('Junchao/js/app.min.js') }} "></script>	
	<script type="text/javascript" src="{{ asset('Junchao/js/demo.js') }}"></script>	
	<script type="text/javascript" src="{{ asset('Junchao/layer/layer.js') }}"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('Junchao/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Junchao/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Junchao/dist/css/skins/_all-skins.min.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    @include('junchao\Base.head')
	@include('junchao\Base.left')
	@yield('content')
	@include('junchao\Base.footer')
</body>
</html>