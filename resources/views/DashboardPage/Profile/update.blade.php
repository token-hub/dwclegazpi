@extends('inc.dashboardNavbarLayout')

@section('dashboard-content')
	<div class="dashboard-right-form">
		<div class="dashboard-right-form-title registration">
			<h3>Profile</h3>
		</div>
		{!! Form::open(['route' => ['update-user', $user->id], 'method' => 'GET']) !!}
			<div class="dashboard-right-form-content">
				<div class='dashboard-right-input'>
					{!! Form::text('firstname', $user->personal_info->firstname, ['id' => 'firstname', 'autocomplete' => 'given-name', 'class' => 'dashboard-form-control']) !!}
					{!! Form::label('firstname', 'Firstname') !!}
				</div>
		
				<div class='dashboard-right-input'>
					{!! Form::text('lastname', $user->personal_info->lastname, ['id' => 'lastname', 'autocomplete' => 'family-name', 'class' => 'dashboard-form-control']) !!}
					{!! Form::label('lastname', 'Lastname', ['generated' => 'true']) !!}
				</div>
				
				<div class='dashboard-right-input'>
					{!! Form::select('gender', ['male' => 'Male', 'female' => 'Female'], strtolower($user->personal_info->gender), ['placeholder' => '', 'autocomplete' => 'sex', 'class' => 'dashboard-form-control', 'id' => 'gender']); !!}
					{!! Form::label('gender', 'Gender') !!}
				</div>

				<div class='dashboard-right-input'>
					{!! Form::text('username', $user->username, ['id' => 'username', 'autocomplete' => 'username', 'class' => 'dashboard-form-control']) !!}
					{!! Form::label('username', 'Username') !!}
				</div>

				<div class='dashboard-right-input'>
					{!! Form::select('department', [
						'shom' => 'SHOM',
						'soenas' => 'SOENAS',
						'soecs' => 'SOECS',
						'sbma' => 'SBMA',
						'gsbm' => 'GSBM'
						], strtolower($user->departments->name), ['class' => 'dashboard-form-control', 'id' => 'department']) !!} 
					{!! Form::label('department', 'Department') !!}
				</div>

				<center><p style='padding:0;margin:0;'><i> --* Change Password *--</i></p><small><i>Changing password will automatically log you out.</i></small></center>

				<div class='dashboard-right-input'>
					<div class="dashboard-right-input-password ">
						{!! Form::password('old_password', ['id' => 'old_password', 'class' => 'dashboard-form-control password', 'autocomplete' => 'current-password']) !!}
						<i class="fa fa-eye"></i>
					</div>
					{!! Form::label('old_password', 'Old Password') !!}
				</div>

				<div class='dashboard-right-input'>
					<div class="dashboard-right-input-password ">
						{!! Form::password('new_password', ['id' => 'new_password', 'class' => 'dashboard-form-control password', 'autocomplete' => 'new-password']) !!}
						<i class="fa fa-eye"></i>
					</div>
					{!! Form::label('new_password', 'New Password') !!}
				</div>

				<div class='dashboard-right-submit-button'>
					{{ Form::submit('Save')}}
				</div>
			</div>
		{!! Form::close() !!}
@endsection