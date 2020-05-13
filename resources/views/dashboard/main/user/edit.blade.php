@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Update Account')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['url' => ['dashboard/users', $user->id], 'method' => 'PATCH']) !!}
				<div class='dashboard-input'>
					{!! Form::text('username', $user->username, ['id' => 'username', 'class' => 'input-control', 'disabled' => 'disabled']) !!} 
					{!! Form::label('username', 'Username') !!}
				</div>
				<!-- <center><p style='padding:0;margin:0;'><i> --* Actions *--</i></p></center> -->
				<div class='dashboard-input'>
					<div class="checkboxes">
						@foreach($roles as $role) 
							{!! Form::checkbox('roles[]', $role->id, $user->roles->contains($role->id) ) !!}
							<span>{{ $role->title }}</span>
						@endforeach
					</div>
					{!! Form::label('roles[]', 'Roles') !!}
				</div>

				<div class='dashboard-input'>
					{!! Form::select('status', [
						'1' => 'Active',
						'0' => 'Inactive',
						], strtolower($user->is_active), ['class' => 'input-control', 'id' => 'status']) !!} 
					{!! Form::label('status', 'Status') !!}
				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
		{!! Form::close() !!}
		</div>
	</div>
@endsection