@extends('web.layouts.navbar-overview')

@section('banner', 'admission')
@section('body-left')
	<div class="overview">
		<h3>OVERVIEW</h3>
		<ul>
			<li class='online-enrollment-li'><a href='online-enrollment' >Online Enrollment</a></li>
			<li class='grade-school-li'><a href='grade-school' >Grade School</a></li>
			<li class='junior-high-school-li'><a href='junior-high-school'> Junior High School </a></li>
			<li class='free-secondary-distance-li'><a href='free-secondary-distance'> Free Secondary Distance Program</a></li>
			<li class='senior-high-school-li'><a href='senior-high-school'> Senior High School </a></li>
			<li class='college-li'><a href='college'> College </a></li>
			<li class='graduate-school-li'><a href='graduate-school'> Graduate School </a></li>
			<li class='scholarship-li'><a href='scholarship'> Scholarship </a></li>
		</ul>
	</div>
@endsection