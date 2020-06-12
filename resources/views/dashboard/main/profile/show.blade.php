@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Account Profile')
@section('wrapper-body')
	<div class='wrapper-content-third'>
		<div class='third-left third-content'>
			<p>Firstname</p>
			<p>Lastname</p>
			<p>Gender</p>
			<p>Department</p>
			<p>Password</p>
		</div>
		<div class='third-right third-content'>
			<p>{{$user->personal_info->firstname}}</p>
			<p>{{$user->personal_info->lastname}}</p>
			<p>{{$user->personal_info->gender}}</p>
			<p>{{strtoupper($user->department->department_name)}}</p>
			<p>*******</p>

			{!! Form::open(['url' => ['dashboard/profile/'.$user->id.'/edit'], 'method' => 'GET']) !!}
				<div class='dashboard-submit-button'>
					{{ Form::submit('Edit') }}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection