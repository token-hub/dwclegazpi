@extends('inc.dashboardNavbarLayout2')

@section('title1', 'E-Mail Address :')
@section('content2')
	{!! Form::open(['route' => ['password.email'], 'method' => 'POST']) !!}
		{{ Form::email('email', '', ['autocomplete' => 'email', 'autofocus' => '', 'required' => '', 'class' => 'dashboard-form-control', 'id' => 'email'])}}
		{{ Form::submit('Send Password Reset Link')}}
	{!! Form::close() !!}
@endsection