@extends('inc.dashboardNavbarLayout')

@section('dashboard-content')
@section('title', 'Account Profile')
	<div class='dashboard-show-info'>
		<div class='dashboard-show-info-container dashboard-show-info-left'>
			<p>Firstname</p>
			<p>Lastname</p>
			<p>Gender</p>
			<p>Department</p>
			<p>Password</p>
		</div>
		<div class='dashboard-show-info-container dashboard-show-info-right'>
			<p>{{$user->personal_info->firstname}}</p>
			<p>{{$user->personal_info->lastname}}</p>
			<p>{{$user->personal_info->gender}}</p>
			<p>{{strtoupper($user->departments->name)}}</p>
			<p>*******</p>

			{!! Form::open(['route' => ['edit_user', $user->id], 'method' => 'GET']) !!}
				<div class='dashboard-right-submit-button displayBlock'>
					{{ Form::submit('Update')}}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection