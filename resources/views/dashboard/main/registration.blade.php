@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Registration')
@section('wrapper-body')

<div class="wrapper-content-second">
	<div class="form">
		{!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
			<div class='dashboard-input'>
				{!! Form::text('firstname', '', ['id' => 'firstname', 'autocomplete' => 'given-name', 'class' => 'input-control', 'required' => 'required' ]) !!}
				{!! Form::label('firstname', 'Firstname') !!}
			</div>
	
			<div class='dashboard-input'>
				{!! Form::text('lastname', '', ['id' => 'lastname', 'autocomplete' => 'family-name', 'class' => 'input-control', 'required' => 'required']) !!}
				{!! Form::label('lastname', 'Lastname', ['generated' => 'true']) !!}
			</div>

			<div class='dashboard-input'>
				{!! Form::email('email', '', ['id' => 'email', 'autocomplete' => 'email', 'class' => 'input-control', 'required' => 'required']) !!}
				{!! Form::label('email', 'Email') !!}
			</div>

			<div class='dashboard-input'>	
				{!! Form::select('gender', ['1' => 'Male', '2' => 'Female'], null, ['placeholder' => '', 'autocomplete' => 'sex', 'class' => 'input-control', 'id' => 'gender', 'required' => 'required']); !!}
				{!! Form::label('gender', 'Gender') !!}
			</div>

			<div class='dashboard-input'>
				{!! Form::text('username', '', ['id' => 'username', 'autocomplete' => 'username', 'class' => 'input-control', 'required' => 'required']) !!}
				{!! Form::label('username', 'Username') !!}
			</div>

			<div class='dashboard-input'>
				<div class="password-content">
					{!! Form::password('password', ['id' => 'password', 'autocomplete' => 'new-password', 'class' => 'input-control password', 'required' => 'required']) !!}
					<i class="fa fa-eye"></i>
				</div>
				{!! Form::label('password', 'password') !!}
			</div>

			<div class='dashboard-input'>
				{!! Form::select('department', [
					'shom' => 'SHOM',
					'soenas' => 'SOENAS',
					'soecs' => 'SOECS',
					'sbma' => 'SBMA',
					'gsbm' => 'GSBM'],
					null, 
					['placeholder' => '', 'class' => 'input-control', 'id' => 'department', 'required' => 'required']); !!}
				{!! Form::label('department', 'Department') !!}
			</div>
			
			<div class='dashboard-input'>
				{!! Form::select('system_access', ['view' => 'View', 'add' => 'Add', 'edit' => 'Edit', 'delete' => 'Delete'], 0, ['placeholder' => '', 'class' => 'input-control', 'id' => 'system_access', 'required' => 'required']) !!}
				{!! Form::label('system_access', 'System Access', ['aria-required' => 'true']) !!}
			</div>

			<div class='dashboard-submit-button'>
				{{ Form::submit('Register')}}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection
