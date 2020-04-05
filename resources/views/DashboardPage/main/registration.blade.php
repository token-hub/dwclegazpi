@extends('inc.dashboardNavbarLayout')

@section('dashboard-content')

	<div class="dashboard-right-form">
		<div class="dashboard-right-form-title registration">
			<h3>Registration</h3>
		</div>

		{!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
			<div class="dashboard-right-form-content">
				<div class='dashboard-right-input'>
					{!! Form::text('firstname', '', ['id' => 'firstname', 'autocomplete' => 'given-name', 'class' => 'dashboard-form-control', 'required' => 'required' ]) !!}
					{!! Form::label('firstname', 'Firstname') !!}
				</div>
		
				<div class='dashboard-right-input'>
					{!! Form::text('lastname', '', ['id' => 'lastname', 'autocomplete' => 'family-name', 'class' => 'dashboard-form-control', 'required' => 'required']) !!}
					{!! Form::label('lastname', 'Lastname', ['generated' => 'true']) !!}
				</div>

				<div class='dashboard-right-input'>
					{!! Form::email('email', '', ['id' => 'email', 'autocomplete' => 'email', 'class' => 'dashboard-form-control', 'required' => 'required']) !!}
					{!! Form::label('email', 'Email') !!}
				</div>

				<div class='dashboard-right-input'>	
					{!! Form::select('gender', ['1' => 'Male', '2' => 'Female'], null, ['placeholder' => '', 'autocomplete' => 'sex', 'class' => 'dashboard-form-control', 'id' => 'gender', 'required' => 'required']); !!}
					{!! Form::label('gender', 'Gender') !!}
				</div>

				<div class='dashboard-right-input'>
					{!! Form::text('username', '', ['id' => 'username', 'autocomplete' => 'username', 'class' => 'dashboard-form-control', 'required' => 'required']) !!}
					{!! Form::label('username', 'Username') !!}
				</div>

				<div class='dashboard-right-input'>
					<div class="dashboard-right-input-password ">
						{!! Form::password('password', ['id' => 'password', 'autocomplete' => 'new-password', 'class' => 'dashboard-form-control password', 'required' => 'required']) !!}
						<i class="fa fa-eye"></i>
					</div>
					{!! Form::label('password', 'password') !!}
				</div>

				<div class='dashboard-right-input'>
					{!! Form::select('department', [
						'shom' => 'SHOM',
						'soenas' => 'SOENAS',
						'soecs' => 'SOECS',
						'sbma' => 'SBMA',
						'gsbm' => 'GSBM'],
						null, 
						['placeholder' => '', 'class' => 'dashboard-form-control', 'id' => 'department', 'required' => 'required']); !!}
					{!! Form::label('department', 'Department') !!}
				</div>
				
				<div class='dashboard-right-input'>
					{!! Form::select('system_access', ['view' => 'View', 'add' => 'Add', 'edit' => 'Edit', 'delete' => 'Delete'], 0, ['placeholder' => '', 'class' => 'dashboard-form-control', 'id' => 'system_access', 'required' => 'required']) !!}
					{!! Form::label('system_access', 'System Access', ['aria-required' => 'true']) !!}
				</div>

				<div class='dashboard-right-submit-button'>
					{{ Form::submit('Register')}}
				</div>
			</div>
		{!! Form::close() !!}
@endsection
