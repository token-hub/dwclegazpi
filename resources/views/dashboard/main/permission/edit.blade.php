@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Update Permission')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['url' => ['dashboard/permissions', $permission->id], 'method' => 'PATCH']) !!}
				<div class='dashboard-input'>
					{!! Form::text('title', $permission->title, ['id' => 'title', 'class' => 'input-control']) !!} 
					{!! Form::label('title', 'Title') !!}
				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection