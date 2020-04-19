@extends('dashboard.layouts.dashboard')

@section('content')
	<div class="dashboard-login">
		<div class="login-content">
			<div class="login-content-left">
				<h1>Welcome</h1>
				<p>to DWCL login form</p>
			</div>
			<div class="login-content-right">
				<div class="login-item-top">
					<a href="/"><i class='fa fa-angle-left'></i></a><span>Return to website</span>
				</div>
				<div class="login-item-bottom">
					<div class="title"><h3>SIGN IN</h3></div>
					<div class="form">
						<div class="form-top">
							{!! Form::open(['url' => ['dashboard/login'], 'method' => 'POST']) !!}
							
							<div class='dashboard-input'>
								{{ Form::text('username', '', ['autocomplete' => 'username', 'autofocus' => '', 'required' => '', 'class' => 'input-control', 'id' => 'username'])}}
								{{ Form::label('username', 'Username') }}
							</div>
							<div class='dashboard-input'>
								<div class='password-content'>
									{{ Form::password('password', ['autocomplete' => 'new-password',  'required' => '', 'class' => 'password input-control', 'id' => 'password'])}}
									<i class='fa fa-eye'></i>
								</div>
								
								{{ Form::label('password', 'Password') }}
							</div>
							<div class='remember-me'>
								{{ Form::checkbox('remember', null) }}<span>Remember me</span>
							</div>
						</div>
						<div class="form-bottom">
							<div class='dashboard-submit-button'>
								{{ Form::submit('Login')}}
								{!! Form::close() !!}
							</div>

							<div class='forgot-password'>
								{!! Form::open(['url' => ['dashboard/password-reset'], 'method' => 'GET']) !!}
									{{Form::submit('Forgot password?', ['class' => 'noborder'])}}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection