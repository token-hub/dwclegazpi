@extends('layouts.dashboard')

@section('content')
	<div class='dashboard-home Muli'>
		<!-- ------------ [navbar] ------------ -->
		<nav>
			<div class="dashboard-home-nav-1st">
				<div class='nav-1st-content flexCenters'>
					<div class="nav-1st-logo"><img src="/storage/img/others/dwcl-logo.png"></div>
					<div class="nav-1st-title flexCenters"><a href="{{url('dashboard/home')}}" class="Muli">DWCL Admin</a></div>
				</div>
			</div>
			<div class="dashboard-home-nav-2nd"></div>
			<div class="dashboard-home-nav-3rd">
				<div class='nav-3rd-content'>
					<span> {{ strtoupper(auth::user()->username) }} </span>
					<i class='fa fa-angle-down coldGray' id='dashboard-dropdown'></i>
				</div>
			</div>
		</nav>

		<div class="dashboard-dropdown">
			<div class='dashboard-dropdown-content'>
				<div class='dashboard-dropdown-items'>
					<i class='fa fa-user flexCenters'></i><a href="{{url('dashboard/profile-show/'.auth::user()->id)}}">Profile</a>
				</div>
				<div class='dashboard-dropdown-items'>
					<i class='fa fa-sign-out flexCenters' ></i>
					{!! Form::open(['route' => ['logout'], 'method' => 'POST']) !!}
						{{Form::submit('Logout', ['class' => 'noborder'])}}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		
		<!-- ------------ [sidebar] ------------ -->
		<div class="sidenav">
			<div class="sidenav-item-content">
				<div class="sidenav-item">
					<h5 class='coldBlue'>DASHBOARDS</h5>
					<div class="sidenav-item-link">
						<i class='fa fa-home coldGray'></i><a href="{{url('dashboard/home')}}">Home</a>
					</div>
				</div>
			</div>
			
			<div class="sidenav-item-content">
				<div class="sidenav-item">
					<h5 class='coldBlue'>CONTENTS</h5>
					<div class="sidenav-item-link">
						<i class='fa fa-edit coldGray'></i><a href="{{url('dashboard/registration')}}">Registration</a>
					</div>
					<div class="sidenav-item-link">
						<i class='fa fa-table coldGray'></i><a href="{{url('dashboard/users')}}">Users</a>
					</div>

					<!-- ------------------------------------------------------------------------ -->
					<div class="sidenav-item-link slider-dropdown">
						<i class='fa fa-sliders coldGray'></i><a href="#">Slider</a>
						<button class='dpBtn slider'><span class="fa fa-sort-desc"></span></button>
					</div>

					<div class="slider-content">
						<div class="sidenav-item-link ">
							<i class='fa fa-toggle-on coldGray'></i><a href="activeImages">Active</a>
						</div>
						<div class="sidenav-item-link ">
							<i class='fa fa-toggle-off coldGray'></i><a href="inactiveImages">Inactive</a>
						</div>
					</div>
					
					<!-- ------------------------------------------------------------------------ -->
					<div class="sidenav-item-link">
						<i class='fa fa-history coldGray'></i><a href="logs">logs</a>
					</div>
				</div>
			</div>
		</div>
		<!-- ------------ [main] ------------ -->
		<div class="dashboard-home-main">
			<div class="dashboard-home-container">
				<div class='dashboard-home-content'>
					<h3>@yield('title')</h3>
					@yield('dashboard-content')
				</div>
			</div>
		</div>
	</div>
@endsection