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
		<div class="dashboard-home-nav-3rd"></div>
	</nav>
	
	<div class="dashboard-medium-container flexCenters">
		<div class="dashboard-medium-inner-container">
			<div class="dashboard-medium-upper-container">
				<p>Reset Password</p> <hr>
			</div>
			<div class="dashboard-medium-bottom-container">
				<div class='dashboard-medium-bottom-inner-container-left'>
					<p>@yield('title1')</p>
					<p>@yield('title2')</p>
					<p>@yield('title3')</p>
				</div> 
				<div class='dashboard-medium-bottom-inner-container-right'>
					@yield('content2')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection