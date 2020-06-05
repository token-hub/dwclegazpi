@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Active Slide/s')
@section('wrapper-body')
	<div class='wrapper-content-slider'>

		@if(count($active))
			@foreach($active as $slides)
			 	<div class='slider-contents '>
			 		@foreach($slides as $activeSlides)
					 	<div class='slider-image'>
							<img src="/storage/img/slider/active/{{ $activeSlides }}">
						</div>
			 		@endforeach
			 	</div>
			@endforeach

				@can('deleteActive', $slide)
					<button class='btn btn-danger slider-btn' id='img-active-btn-deactivate' disabled="">Deactivate slide</button>
				@endcan

				@can('updateActive', $slide)
					<button class='btn btn-info slider-btn' id='img-active-btn-arrange' disabled="">Arrange slide</button>
				@endcan

		@else 
			<center><p><i> --* No active slide/s found *--</i></p></center>
		@endif
	</div>
@endsection