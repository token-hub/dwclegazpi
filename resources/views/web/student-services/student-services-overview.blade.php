@extends('web.layouts.navbar-overview')

@section('banner', 'student-services')
@section('body-left')
	<div class="overview">
		<h3>OVERVIEW</h3>
		<ul>
			<li class='community-extension-services-li'><a href='community-extension-services'> Community extension Services</a></li>
			<li class='student-affairs-organization-li li-dropdown'>
				<a href='student-affairs-organization'> Student Affairs Organization</a>
				<button class='dpBtn2 aboutUs'><span class="fa fa-plus dwclBlue"></span></button>
			</li>

			<div class='li-dropdown-contents'>
				<li class='grade-school-li'><a href='grade-school'>Grade School</a></li>
				<li class='junior-high-school-li'><a href='junior-high-school'> Junior High School </a></li>
				<li class='senior-high-school-li'><a href='senior-high-school'> Senior High School </a></li>
				<li class='college-li'><a href='college'>College</a></li>
			</div>

			<li class='athletics-li'><a href='athletics'> Athletics</a></li>
			<li class='publication-li'><a href='publication'> Publication </a></li>
			<li class='campus-ministry-li'><a href='campus-ministry'> Campus Ministry </a></li>
			<li class='serbisyong-divine-li'><a href='serbisyong-divine'>Serbisyong Divine </a></li>
			<li class='registrar-li'><a href='registrar'> Registrar </a></li>
			<li class='library-li'><a href='library'> Library </a></li>
			<li class='research-li'><a href='research'> Research </a></li>
			<li class='clinic-li'><a href='clinic'>Clinic</a></li>
			<li class='canteen-li'><a href='canteen'>Canteen </a></li>
		</ul>
	</div>
@endsection