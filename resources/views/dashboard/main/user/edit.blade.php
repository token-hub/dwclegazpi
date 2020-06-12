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

				<div class='dashboard-input '>
					<div class="checkboxes-placeholder">
						@foreach($roles as $role) 
							@if($user->roles->contains($role->id))
								<span>{{$role->title. ','}}</span>
							@endif
						@endforeach
					</div>
					
					{!! Form::label('roles[]', 'roles') !!}

					<div class='checkbox-container'>
						@foreach($roles as $role) 
							<div class='checkbox-item {{ $user->roles->contains($role->id) ? "highlighted" : "" }}' >
								{{ Form::checkbox('roles[]', $role->id, $user->roles->contains($role->id) ) }}
								<span>{{ $role->title }}</span>
							</div>
						@endforeach
					</div>

				</div>
				
				<div class='dashboard-input'>
					{!! Form::select('status', [
						'Active' => 'Active',
						'Inactive' => 'Inactive',
						], $user->is_active, ['class' => 'input-control', 'id' => 'status' , 'required' => 'required']) !!} 
					{!! Form::label('status', 'Status') !!}
				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
		{!! Form::close() !!}
		</div>
	</div>
@endsection