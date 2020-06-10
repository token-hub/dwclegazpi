<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="icon" type="image/ico" href="/storage/img/others/dwcl-Logo.png" />
	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

	<title>
		{{  ucfirst($prefix = (Request::segment(2) == '') ? "Dashboard" : Request::segment(2)). ' | Divine Word College of Legazpi' }}
	</title>
</head>
<body>
	@include('./dashboard/layouts/notification')
	@yield('content')
	
	<div class='page' value='{{Request::segment(1)}}'></div>
	<div class='action' value='{{Request::segment(2)}}'></div>
	<div id='session' value='{{Session::get("title")}}'></div>
</body>
</html>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('js/dashboard.js')}}"></script>
	<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer ></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	<script src="{{asset('ckfinder/ckfinder.js')}}"></script>
@stack('scripts')

