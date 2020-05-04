@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Inactive Image/s')
@section('wrapper-body')
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
			 		@foreach($images as $image)
					 	<div class='slider-image'>
							<img src="/storage/img/slider/inactive/{{ $image['image_name'] }}">
						</div>
			 		@endforeach
			 	</div>
			@endforeach
		@else 
			<center><p><i> --* No inactive image/s found *--</i></p></center>
		@endif
		
		<button class='btn btn-danger slider-btn' id='img-inactive-btn-remove' disabled="">Remove image</button>
		<button class='btn btn-info slider-btn' id='img-inactive-btn-remove' disabled="">Activate image</button>
	</div>
@endsection














<!-- 	<form action="../dashboard/uploadImage" method="post" enctype="multipart/form-data" class="fivePercent">
Select image to upload
<input type="file" name="image[]" id="image" accept='image/*' multiple="multiple">
<input type="submit" value="Upload Image" disabled="" class='btn btn-info' id='btn-upload-image' name="submit">
</form> -->

<?php
// foreach ($this->fileValue['images'] as $key => $images) { 
	//echo "<div class='dashbord-img-container'>"; // per 3 imgs, create a new dashbord-img-container div
	//	 foreach ($images as $key => $image) {  // loop through imgs maximum of 3 and show it.
	//	 echo "<div class='dashbord-img-container-img'><img src='../../../public/img/slider/active/".$image."' class='img-content'><p class='image-count flexCenters'>1</p></div>";
	//	 }
//	echo "</div>";
//	}
?>