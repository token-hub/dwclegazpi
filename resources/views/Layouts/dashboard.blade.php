<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

<!-- 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="icon" type="image/ico" href="/storage/img/others/dwcl-Logo.png" />
	<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
	
	<title>
		{{  ucfirst($prefix = (Request::segment(2) == '') ? "Dashboard" : Request::segment(2)). ' | Divine Word College of Legazpi' }}
	</title>
</head>
<body>
	<div class="notification flexCenters">
		<div class="notif-left flexCenters"><i class='fa'></i></div>
		<div class="notif-right">
			<div class="notif-right-div">
				<h6></h6>
				<input type="text" id="notifValue" disabled="" value="{{Session::get('notification')['message']}}">
				<input type="text" id="notifType" hidden  value="{{Session::get('notification')['type']}}">
			</div>
		</div>
	</div>
		@include('inc.messages')
		@yield('content')
		<div class='page' value='{{Request::segment(1)}}'></div>
		<div class='action' value='{{Request::segment(2)}}'></div>
		<div id='session' value='{{Session::get("title")}}'></div>
</body>
</html>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{asset('js/dashboard.js')}}"></script>

<!-- 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->
	
	<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer ></script>
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.20/sorting/date-de.js"></script> -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	@stack('scripts')

