@extends('layouts.app')
@section('content')
	<!-- ---------------- [ student portal button ] ---------------- -->	
	<div class='student-portal'><h2><a href="http://apps.dwc-legazpi.edu/app/student-online.cf">Student Portal</a></h2></div>

	<!-- ---------------- [ slider show ] ---------------- -->
	<div class="slideshow-container">
		<?php
			// loop for image slider
			// foreach ($this->fileValue['images'] as $key => $image) { 
			// 	echo "<div class='mySlides fade'>
			// 		<img src='../../../public/img/slider/active/".$image."' class='img'>
			// 	</div>";
			// }
			$imgArray = ['CPA', 'librarian', 'SYSTEMCOVER'];
		?>
		@foreach($imgArray as $img)
			<div class='mySlides fade slides'>
				<img src='/storage/img/slider/active/{{$img}}.jpg' class='img'>
			</div>
		@endforeach

		<div class="slide-show-btn">
			<div class="slide-content">
		  		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  		<a class="next" onclick="plusSlides(1)">&#10095;</a>
	  		</div>
		</div>
	</div>
	<div class="slideshow-replacement"><img src='/storage/img/others/tablet.jpg'></div>

	<!-- ---------------- [ 3 DIVISIONS ] ---------------- -->
	<div class='three-divs DidactGothic' >
		<div class='content'>
			<h2>Why Choose Divine Word</h2>
			<div class="items">
				<p><i class='fa fa-caret-right'></i><a href="about-us/mission-vision-goal">Our Vision, Mission, Goal, Values</a></p>
				<p><i class='fa fa-caret-right'></i><a href="about-us/history">History</a></p>
				<p><i class='fa fa-caret-right'></i><a href="about-us/facilities">School Facilities</a></p>
			</div>
		</div>
		<div class='content'>
			<h2>Academic Programs</h2>
			<div class="items">
				<p><i class='fa fa-caret-right'></i><a href="academics/grade-school-department">Grade School Department</a></p>
				<p><i class='fa fa-caret-right'></i><a href="academics/junior-high-school-department">Junior High School Department</a></p>
				<p><i class='fa fa-caret-right'></i><a href="academics/free-secondary-distance-program">Free Secondary Discount Program</a></p>
				<p><i class='fa fa-caret-right'></i><a href="academics/senior-high-school-department">Senior High School Department</a></p>
				<p><i class='fa fa-caret-right'></i><a href="academics/college">College</a></p>
				<p><i class='fa fa-caret-right'></i><a href="academics/graduate-school">Graduate School of Business and Management</a></p>
			</div>
		</div>
		<div class='content'>
			<h2>Admissions</h2>
			<div class="items">
				<p><i class='fa fa-caret-right'></i><a href="admission/grade-school">Grade School</a></p>
				<p><i class='fa fa-caret-right'></i><a href="admission/junior-high-school">Junior High School</a></p>
				<p><i class='fa fa-caret-right'></i><a href="admission/free-secondary-distance">Free Secondary Distance Program</a></p>
				<p><i class='fa fa-caret-right'></i><a href="admission/senior-high-school">Senior High School</a></p>
				<p><i class='fa fa-caret-right'></i><a href="admission/college">College</a></p>
				<p><i class='fa fa-caret-right'></i><a href="admission/graduate-school">Graduate School</a></p>
			</div>
		</div>
	</div>

	<!-- ---------------------------------------------- [ President's message ] ---------------------------------------------- -->
	<div class='message-from-president'>
		<div class='content'>
			<div class='items left'>
				<div class="values">
					<h2 class='message-title dwclBlue'>A Message From The President</h2>
					<p>Welcome to Divine Word College of Legazpi. It matters to us that you know who we are and why this institution exists and will continue to exist.</p>
					<p>The raison d’être of Divine Word College of Legazpi reflects the vision of Saint Arnold Janssen, the founder of the religious-missionary congregation – the <b> Society of the Divine Word </b>(SVD). Education is among the missionary apostolates of the Society. Our Founder, a secondary school teacher himself teaching natural sciences and mathematics, understood the importance of education as a method for evangelization, and as an effective way of missionary service. He impressed upon his missionaries that an integral approach in education is critical in the faith-formation of the person. To this day, we continue to live his vision and ensure that integral formation of the human person takes place in our schools. Our aim is to inform and mold individuals into “persons of the Word”, hearers and doers of the Word – in the language of the Divine Word Educational Association, <b>"witnesses to the Word in the world".</b></p> <p> To honor this commitment, here at Divine Word College of Legazpi, we value excellence, service, and professionalism. We also ascribe to the values of justice, peace and integrity of creation as an acknowledgment of our common origin as created beings, and our interrelatedness with one another through mutual respect and co-responsibility – hence, our being a family. These values are at the core of our day-to-day undertaking – a way of life, a pledge we honor and desire to render to our students and other stakeholders. </p> <p> I invite you then to learn more about us. As you move through the pages of our website you will discover that our academic programs are designed to provide life skills and competencies that enable our young people to navigate confidently in the constantly changing milieu of the 21st century. Our commitment to academic excellence and holistic development nurtured in a healthy organizational environment and permeated with a missionary paradigm, our sense of corporate social responsibility and best practices in community involvement are meant to prepare our young to succeed in life as competent professionals with a Christian missionary character – ready for the world. </p> <p> I wish you to be part of our family here at Divine Word College of Legazpi. We are here to serve. We give you our word. </p> <p> In the Divine Word, </p> <p>REV. FR. NIELO M. CANTILADO, SVD <br> DWCL President</p>
				</div>
			</div>

			<div class='items right'>
				<div class="values">
					<img src='/storage/img/others/president.jpg'>
				</div>
			</div>
		</div>
	</div>

	<!-- ---------------------------------------------- [ News and Events End ] ---------------------------------------------- -->
	<div class='news-and-events'>
		<div class='content'>
			<h1>NEWS AND EVENTS</h1>
				<div class="items">
					@foreach($homeArrays['newsAndEvents'] as $newsAndEvents)
						<div class='values'>
							<img src="/storage/img/newsAndEvents/{{ $newsAndEvents['image'] }}">
							<p class='bold DidactGothic'>{{ $newsAndEvents['title'] }}</p>
							<hr>
							<a href='{{ url("redirect/".$newsAndEvents["title"]) }}'> <button>READ MORE</button></a>
						</div>
					@endforeach
				</div> 
			</div>
		</div>
	</div>

	<!-- ----------------------------------------------[ Announcement ] ---------------------------------------------- -->
	<div class='annoucement'>
		<h1> ANNOUNCEMENT </h1>
		<div class='content'>
			<div class='items'>

				<div class='values'>
					<div class="inner">
						<div class="most">
							<div class="left">
								<p>DEC</p>
								<p>09</p>
							</div>
							<div class="right">
								<a href="#">CLASSES AND WORK RESUMPTION</a>
							</div>
						</div>
					</div>
					<div class="inner">
						<div class="most">
							<div class="left">
								<p>DEC</p>
								<p>04</p>
							</div>
							<div class="right">
								<a href="#">CLASSES SUSPENSION</a>
							</div>
						</div>
					</div>
				</div>

				<div class='values'>
					<div class="inner">
						<div class="most">
							<div class="left">
								<p>DEC</p>
								<p>09</p>
							</div>
							<div class="right">
								<a href="#">CLASSES AND WORK RESUMPTION</a>
							</div>
						</div>
					</div>
					<div class="inner">
						<div class="most">
							<div class="left">
								<p>DEC</p>
								<p>04</p>
							</div>
							<div class="right">
								<a href="#">CLASSES SUSPENSION</a>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection
