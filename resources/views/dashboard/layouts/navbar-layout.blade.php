@extends('dashboard.layouts.dashboard')

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
					<p>{{ strtoUpper(Auth::user()->username) }}</p>
					<i class='fa fa-angle-down'></i>
				</div>
			</div>
		</div>

		<div class="main-bottom">

			<!-- ===== [ USER DROPDOWN ] ===== -->
			<div class="user-dropdown">
				<div class="user-dropdown-content">
					<i class="fa fa-user"></i>
					<a href="{{url('dashboard/profile/'.Auth::user()->id)}}">Profile</a>
				</div>
				<div class="user-dropdown-content">
					<i class="fa fa-sign-out"></i>
					{!! Form::open(['url' => ['dashboard/logout'], 'method' => 'POST']) !!}
						{{Form::submit('Logout', ['class' => 'noborder'])}}
					{!! Form::close() !!}
				</div>
			</div>

			<!-- ===== [ SIDEBAR ] ===== -->
			<div class="left bottom">
				<div class="left-content">
					<h4>DASHBOARD</h4>
					<div class='left-content-link'>
						<i class='fa fa-home'></i><a href="{{url('dashboard/home')}}">Home</a>
					</div>
				</div>

				<div class="left-content">
					<h4>CONTENTS</h4>

					@if( 
						 Gate::check('viewAny', App\Models\Entities\Permission::class) ||
						 Gate::check('viewAny', App\Models\Entities\Role::class) ||
						 Gate::check('viewAny', App\Models\Entities\User::class)
						)
						<div class='left-content-link '>
							<i class='fa fa-user-circle-o'></i><a href="#">User management</a>
							<span class='fa fa-sort-desc'></span>
						</div>
					
						<div class='content-dropdown'>
							@can('viewAny', App\Models\Entities\Permission::class)
								<div class='left-content-link'>
									<i class='fa fa-unlock'></i><a href="{{url('dashboard/permissions')}}">Permissions</a>
								</div>
							@endcan

							@can('viewAny', App\Models\Entities\Role::class)
								<div class='left-content-link'>
									<i class='fa fa-briefcase'></i><a href="{{url('dashboard/roles')}}">Roles</a>
								</div>	
							@endcan

							@can('viewAny', App\Models\Entities\User::class)
								<div class='left-content-link'>
									<i class='fa fa-user'></i><a href="{{url('dashboard/users')}}">Users</a>
								</div>
							@endcan
						</div>
					@endif
					
					@if (
							Gate::check('viewAnyActive', App\Models\Entities\Image::class) || 
							Gate::check('viewAnyInactive', App\Models\Entities\Image::class)
						)
						<div class='left-content-link '>
							<i class='fa fa-sliders'></i><a href="#">Slider</a>
							<span class='fa fa-sort-desc'></span>
						</div>

						<div class='content-dropdown'>
							@can('viewAnyActive', App\Models\Entities\Image::class)
								<div class='left-content-link'>
									<i class='fa fa-toggle-on'></i><a href="{{url('dashboard/images-active')}}">Active</a>
								</div>
							@endcan

							@can('viewAnyInactive', App\Models\Entities\Image::class)
							<div class='left-content-link'>
								<i class='fa fa-toggle-off'></i><a href="{{url('dashboard/images-inactive')}}">Inactive</a>
							</div>
							@endcan
						</div>
					@endif
					
					@can('viewAny', Spatie\Activitylog\Models\Activity::class)
						<div class='left-content-link'>
							<i class='fa fa-history'></i><a href="{{url('dashboard/logs')}}">Logs</a>
						</div>
					@endcan
				</div>
			</div>
			<div class="right bottom">
				<div class="right-content">
					<div class="wrapper">
						<div class="wrapper-header">
							<h3>@yield('wrapper-title')</h3>
							@yield('wrapper-button')
						</div><hr>
						@yield('wrapper-body')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
