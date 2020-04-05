@extends('layouts.dashboard')

@section('content')
	<div class="dashboard-main">

		<!-- ===== [ NAVBAR ] ===== -->
		<div class="main-top"> 
			<div class="main-content">
				<div class="left">
					<img src="/storage/img/others/logo.png">
					<a>DWCL Admin</a>
				</div>
				<div class="right">
					<p>SOECS1</p>
					<i class='fa fa-angle-down'></i>
				</div>
			</div>
		</div>

		<div class="main-bottom">

			<!-- ===== [ USER DROPDOWN ] ===== -->
			<div class="user-dropdown">
				<div class="user-dropdown-content">
					<i class="fa fa-user"></i>
					<a href="#">Profile</a>
				</div>
				<div class="user-dropdown-content">
					<i class="fa fa-sign-out"></i>
					<a href="#">Logout</a>
				</div>
			</div>

			<!-- ===== [ SIDEBAR ] ===== -->
			<div class="left bottom">
				<div class="left-content">
					<h4>DASHBOARD</h4>
					<div class='left-content-link link-active'>
						<i class='fa fa-home'></i><a href="{{url('dashboard/home')}}">Home</a>
					</div>
				</div>

				<div class="left-content">
					<h4>CONTENTS</h4>
					<div class='left-content-link'>
						<i class='fa fa-home'></i><a href="{{url('dashboard/registration')}}">Registration</a>
					</div>
					<div class='left-content-link'>
						<i class='fa fa-user'></i><a href="{{url('dashboard/users')}}">Users</a>
					</div>
					<div class='left-content-link '>
						<i class='fa fa-sliders'></i><a href="#">Slider</a>
						<span class='fa fa-sort-desc'></span>
					</div>

					<div class='content-dropdown'>
						<div class='left-content-link'>
							<i class='fa fa-toggle-on'></i><a href="{{url('dashboard/active-images')}}">Active</a>
						</div>
						<div class='left-content-link'>
							<i class='fa fa-toggle-off'></i><a href="{{url('dashboard/inactive-images')}}">Inactive</a>
						</div>
					</div>

					<div class='left-content-link'>
						<i class='fa fa-history'></i><a href="{{url('dashboard/logs')}}">Logs</a>
					</div>
				</div>
			</div>
			<div class="right bottom">
				<div class="right-content">
					<div class="right-wrapper">
						<h3>@yield('wrapper-title')</h3>
						@yield('wrapper-boby')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
