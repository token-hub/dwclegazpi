@extends('layouts.dashboard')

@section('content')
	<div class='dashboard flexCenters centuryGothic '>
		<div class="dashboard-container flexCenters">
			<div class="dashboard-left">
				<div class='dashboard-left-bg'></div>
				<div class='dashboard-left-layer'></div>
				<div class='dashboard-left-paragraph flexCenters'> 
					<div class='dashboard-left-paragraph-item'>
						<h1>Welcome</h1>
						<p>to DWCL login form</p>
					</div>
				</div>
			</div>
			<div class="dashboard-right">
				<div class="dashboard-right-return-home">
					<div class="dashboard-right-return-home-content">
						<a href="/"><button><i class='fa fa-angle-left'></i></button></a><span>Return to website</span>
					</div>
				</div>
				<div class="dashboard-right-form">
					{!! Form::open(['route' => ['login'], 'method' => 'POST']) !!}
					<div class="dashboard-right-form-title">
						<h3>SIGN IN</h3>
					</div>
					<div class="dashboard-right-form-content">
						
						<div class='dashboard-right-input'>
							{{ Form::text('username', '', ['autocomplete' => 'username', 'autofocus' => '', 'required' => '', 'class' => 'dashboard-form-control', 'id' => 'username'])}}
							{{ Form::label('username', 'Username') }}
						</div>
						<div class='dashboard-right-input'>
							{{ Form::password('password', ['autocomplete' => 'new-password',  'required' => '', 'class' => 'dashboard-form-control', 'id' => 'password'])}}

							{{ Form::label('password', 'Password') }}
						</div>
						<div class='rememberMe'>
							{{ Form::checkbox('remember', null) }}<span>Remember me</span>
						</div>
					</div>
					<div class='dashboard-right-submit-button'>
						{{ Form::submit('Login')}}
						{!! Form::close() !!}
					</div>
					<div class='forgotPassword'>
							{!! Form::open(['route' => ['password.request'], 'method' => 'GET']) !!}
								{{Form::submit('Forgot password?', ['class' => 'noborder'])}}
							{!! Form::close() !!}
						</div>
				</div>
			</div>
		</div>
	</div>
@endsection