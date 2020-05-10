@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Update role')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['url' => ['dashboard/roles', $role->id], 'method' => 'PATCH']) !!}
				<div class='dashboard-input'>
					{!! Form::text('title', $role->title, ['id' => 'title', 'class' => 'input-control']) !!} 
					{!! Form::label('title', 'Title') !!}
				</div>
				
				<div class='dashboard-input'>
					<div class="checkboxes">
						@foreach($permissions as $permission) 
							{!! Form::checkbox('permissions[]', $permission->id, $role->permissions->pluck('id')->contains($permission->id)) !!}
							<span>{{ $permission->title }}</span>
						@endforeach
					</div>
					{!! Form::label('permissions[]', 'Permissions') !!}
				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection