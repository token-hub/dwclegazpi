@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Update Profile')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['route' => ['update-user', $user->id], 'method' => 'GET']) !!}
				<div class='dashboard-input'>
					{!! Form::text('firstname', $user->personal_info->firstname, ['id' => 'firstname', 'autocomplete' => 'given-name', 'class' => 'input-control']) !!}
					{!! Form::label('firstname', 'Firstname') !!}
				</div>
		
				<div class='dashboard-input'>
					{!! Form::text('lastname', $user->personal_info->lastname, ['id' => 'lastname', 'autocomplete' => 'family-name', 'class' => 'input-control']) !!}
					{!! Form::label('lastname', 'Lastname', ['generated' => 'true']) !!}
				</div>
				
				<div class='dashboard-input'>
					{!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], strtolower($user->personal_info->gender), ['placeholder' => '', 'autocomplete' => 'sex', 'class' => 'input-control', 'id' => 'gender']); !!}
					{!! Form::label('gender', 'Gender') !!}
				</div>

				<div class='dashboard-input'>
					{!! Form::text('username', $user->username, ['id' => 'username', 'autocomplete' => 'username', 'class' => 'input-control']) !!}
					{!! Form::label('username', 'Username') !!}
				</div>

				<div class='dashboard-input'>
					{!! Form::select('department', [
						'shom' => 'SHOM',
						'soenas' => 'SOENAS',
						'soecs' => 'SOECS',
						'sbma' => 'SBMA',
						'gsbm' => 'GSBM'
						], strtolower($user->departments->name), ['class' => 'input-control', 'id' => 'department']) !!} 
					{!! Form::label('department', 'Department') !!}
				</div>

				<center><p style='padding:0;margin:0;'><i> --* Change Password *--</i></p><small><i>Changing password will automatically log you out.</i></small></center>

				<div class='dashboard-input'>
					<div class="password-content">
						{!! Form::password('old_password', ['id' => 'old_password', 'class' => 'input-control password', 'autocomplete' => 'current-password']) !!}
						<i class="fa fa-eye"></i>
					</div>
					{!! Form::label('old_password', 'Old Password') !!}
				</div>

				<div class='dashboard-input'>
					<div class="password-content">
						{!! Form::password('new_password', ['id' => 'new_password', 'class' => 'input-control password', 'autocomplete' => 'new-password']) !!}
						<i class="fa fa-eye"></i>
					</div>
					{!! Form::label('new_password', 'New Password') !!}
				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
		{!! Form::close() !!}
		</div>
@endsection