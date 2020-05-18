@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Active Image/s')
@section('wrapper-body')
	<div class='wrapper-content-slider'>

		@if(count($active))
			@foreach($active as $images)
			 	<div class='slider-contents '>
			 		@foreach($images as $img)
					 	<div class='slider-image'>
							<img src="/storage/img/slider/active/{{ $img['image_name'] }}">
						</div>
			 		@endforeach
			 	</div>
			@endforeach

				@can('deleteActive', $image)
					<button class='btn btn-danger slider-btn' id='img-active-btn-deactivate' disabled="">Deactivate image</button>
				@endcan

				@can('updateActive', $image)
					<button class='btn btn-info slider-btn' id='img-active-btn-arrange' disabled="">Arrange image</button>
				@endcan

		@else 
			<center><p><i> --* No active image/s found *--</i></p></center>
		@endif
	</div>
@endsection