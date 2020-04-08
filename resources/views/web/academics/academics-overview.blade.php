@extends('web.layouts.navbar-overview')

@section('banner', 'academics')
@section('body-left')
	<div class="overview">
		<h3>OVERVIEW</h3>
		<ul>
			<li class='grade-school-department-li'><a href='grade-school-department' >Grade School Department</a></li>
			<li class='junior-high-school-department-li'><a href='junior-high-school-department'> Junior High School Department</a></li>
			<li class='free-secondary-distance-program-li'><a href='free-secondary-distance-program'> Free Secondary Distance Program</a></li>
			<li class='senior-high-school-department-li'><a href='senior-high-school-department'> Senior High School Department</a></li>
			
			<li class='college-li li-dropdown'>
				<a href='college'> College </a>
				<button class='dpBtn2 aboutUs'><span class="fa fa-plus dwclBlue"></span></button>
			</li>

			<div class='li-dropdown-contents'>
				<li class='son-li'><a href='son'> School of Nursing</a></li>
				<li class='shom-li'><a href='shom'> School of Hospitality Management</a></li>
				<li class='seas-li'><a href='seas'> School of Education, Arts and Sciences</a></li>
				<li class='soecs-li'><a href='soecs'> School of Engineering & computer studies</a></li>
				<li class='sbma-li'><a href='sbma'> School of Business Management and Accountancy</a></li>
			</div>
			<li class='graduateSchool-li'><a href='graduate-school'> Graduate School or Business and Management</a></li>
		</ul>
	</div>
@endsection