@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Update role')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['url' => ['dashboard/roles', $role->id], 'method' => 'PATCH']) !!}
				<div class='dashboard-input'>
					{!! Form::text('title', $role->title, ['id' => 'title', 'class' => 'input-control']) !!} 
					{!! Form::label('title', 'Title') !!}

				<div class='dashboard-input '>
					<div class="checkboxes-placeholder">
						@foreach($permissions as $permission) 
							@if($role->permissions->pluck('id')->contains($permission->id))
								<span>{{$permission->title. ','}}</span>
							@endif
						@endforeach
					</div>
					
					{!! Form::label('permissions[]', 'Permissions') !!}

					<div class='checkbox-container'>
						@foreach($permissions as $permission) 
							<div class='checkbox-item {{ $role->permissions->pluck("id")->contains($permission->id) ? "highlighted" : "" }}' >
								{{ Form::checkbox('permissions[]', $permission->id, $role->permissions->pluck('id')->contains($permission->id)) }}
								<span>{{ $permission->title }}</span>
							</div>
						@endforeach
					</div>

				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection