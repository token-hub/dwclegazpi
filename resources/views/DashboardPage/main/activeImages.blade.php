@extends('inc.dashboardNavbarLayout')

@section('wrapper-title', 'Active Image/s')
@section('wrapper-body')
	<div class='wrapper-content-slider'>
		<div class='slider-contents'>
			<div class='slider-image'>
				<img src='/storage/img/slider/active/CPA.jpg'>
			</div>
			<div class='slider-image'>
				<img src='/storage/img/slider/active/CPA.jpg'>
			</div>
			<div class='slider-image'>
				<img src='/storage/img/slider/active/CPA.jpg'>
			</div>
		</div>

		<div class='slider-contents'>
			<div class='slider-image'>
				<img src='/storage/img/slider/active/CPA.jpg'>
			</div>
			<div class='slider-image'>
				<img src='/storage/img/slider/active/CPA.jpg'>
			</div>
			<div class='slider-image'>
				<img src='/storage/img/slider/active/CPA.jpg'>
			</div>
		</div>

		<button class='btn btn-danger slider-btn' disabled="">Remove image</button>
		<button class='btn btn-info slider-btn'  disabled="">Arrange image</button>
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