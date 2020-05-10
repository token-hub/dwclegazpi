@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Add Permission')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['url' => ['dashboard/permissions'], 'method' => 'POST']) !!}
				<div class='dashboard-input'>
					{!! Form::text('title', '', ['id' => 'role', 'class' => 'input-control']) !!} 
					{!! Form::label('role', 'Title') !!}
				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
		{!! Form::close() !!}
		</div>
	</div>
@endsection