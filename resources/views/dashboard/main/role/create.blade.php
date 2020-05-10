@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Add Role')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['url' => ['dashboard/roles'], 'method' => 'POST']) !!}
				<div class='dashboard-input'>
					{!! Form::text('title', '', ['id' => 'role', 'class' => 'input-control']) !!} 
					{!! Form::label('role', 'Title') !!}
				</div>
				
				<div class='dashboard-input'>
					<div class="checkboxes">
						@foreach($permissions as $permission) 
							{!! Form::checkbox('permissions[]', $permission->id) !!}
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