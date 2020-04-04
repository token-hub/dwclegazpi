@extends('inc.dashboardNavbarLayout2')

@section('title1', 'E-Mail Address :')
@section('title2', 'Password :')
@section('title3', 'Confirm Password :')
@section('content2')

	{!! Form::open(['route' => ['password.update'], 'method' => 'POST']) !!}
		{{ Form::hidden('token', $token, ['id' => 'token']) }}

		{{ Form::email('email', $email, ['autocomplete' => 'email', 'autofocus' => '', 'required' => '', 'class' => 'dashboard-form-control margin-bottom-rem', 'id' => 'email', 'readonly' => ''])}}

		{{ Form::password('password', ['autocomplete' => 'new-password', 'autofocus' => '', 'required' => '', 'class' => 'dashboard-form-control margin-bottom-rem', 'id' => 'password'])}}

		{{ Form::password('password_confirmation', ['autocomplete' => 'new-password', 'autofocus' => '', 'required' => '', 'class' => 'dashboard-form-control margin-bottom-rem', 'id' => 'password_confirmation'])}}

		{{ Form::submit('Reset password')}}
	{!! Form::close() !!}
	
@endsection