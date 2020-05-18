@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Inactive Image/s')
@section('wrapper-body')
	<div class='wrapper-content-slider'>
		{!! Form::open(['url' => ['dashboard/images-inactive/image-upload'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
			{{Form::label('image_name', 'Select image/s to upload')}}
			{{Form::file('image_name[]', ['accept' => 'image/*', 'multiple' => 'multiple', 'type' => 'file'])}}
			{{Form::submit('Upload image', ['class' => 'btn btn-info'])}}
		{!! Form::close() !!}
		<br>
	
		@if($inactive)
			@foreach($inactive as $images)
			 	<div class='slider-contents '>
			 		@foreach($images as $img)
					 	<div class='slider-image'>
							<img src="/storage/img/slider/inactive/{{ $img['image_name'] }}">
						</div>
			 		@endforeach
			 	</div>
			@endforeach
				
				@can('deleteInactive', $image)
					<button class='btn btn-danger slider-btn' id='img-inactive-btn-remove' disabled="">Remove image</button>
				@endcan

				@can('updateInactive', $image)
					<button class='btn btn-info slider-btn' id='img-inactive-btn-remove' disabled="">Activate image</button>
				@endcan

		@else 
			<center><p><i> --* No inactive image/s found *--</i></p></center>
		@endif
	</div>
@endsection