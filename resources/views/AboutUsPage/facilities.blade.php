@extends('AboutUsPage.aboutUsOverview')

@section('title', 'Facilities')
@section('body-right')
<!-- ----------------------- welcome message Carousel Start ----------------------- -->
<div class="slideshow-container slide-facilities">
	<?php
		$facilities = ['1COL-SHS', '2JHS-GS', '3SC-chapel', '4NC-chapel', '5NC-GS-LIB', '6NC-GS-PRINCIPAL', '7NC-JHS-AGTC', '8NC-JHS-LIB', '9NC-MED', '10NC-GYM', '11NC-HM-LAB', '12NC-SCI-LAB', '13SC-AV-HALL', '14social-hall', '15SC-CLASSROOM', '16SC-COLL-LIBRARY', '17SC-COM-LAB', '18SC-DRAW-LAB', '19swimming-pool', '20SC-CANTEEN', '21SC-MED', '22SC-GRAD-LIB', '23SC-PRES-OFFICE', '24SC-CES', '25SC-GRAD-OFFICE', '26SC-REG', '27SC-SAO'];
	?>

	 @foreach($facilities as $facility)
		<div class="welcome-mySlides welcome-fade slides">
	   		<img src="/storage/img/facilities_slider/{{ $facility }}.png">
	 	</div>	
	 @endforeach
	 <div class="slide-show-btn">
		<div class="slide-content">
	  		<a class="welcome-prev" onclick="plusSlides2(-1)">&#10094;</a>
		    <a class="welcome-next" onclick="plusSlides2(1)">&#10095;</a>
  		</div>
	</div>
</div>
<!-- -----------------------[ Divine container end ] ----------------------- -->
@endsection