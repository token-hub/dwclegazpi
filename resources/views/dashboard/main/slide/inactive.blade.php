@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Inactive Slide/s')
@section('wrapper-body')
	<div class='wrapper-content-slider'>
		{!! Form::open(['url' => ['dashboard/slides-inactive/image-upload'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
			{{Form::label('image_name', 'Select image/s to upload')}}
			{{Form::file('image_name[]', ['accept' => 'image/*', 'multiple' => 'multiple', 'type' => 'file'])}}
			{{Form::submit('Upload image', ['class' => 'btn btn-info'])}}
		{!! Form::close() !!}
		<br>
	
		@if($inactive)
			@foreach($inactive as $slides)
			 	<div class='slider-contents '>
			 		@foreach($slides as $inactiveSlide)
					 	<div class='slider-image'>
							<img src="/storage/img/slider/inactive/{{ $inactiveSlide }}">
						</div>
			 		@endforeach
			 	</div>
			@endforeach
				
				@can('deleteInactive', $slide)
					<button class='btn btn-danger slider-btn' id='img-inactive-btn-remove' disabled="">Remove slide</button>
				@endcan

				@can('updateInactive', $slide)
					<button class='btn btn-info slider-btn' id='img-inactive-btn-remove' disabled="">Activate slide</button>
				@endcan

		@else 
			<center><p><i> --* No inactive slide/s found *--</i></p></center>
		@endif
	</div>
@endsection