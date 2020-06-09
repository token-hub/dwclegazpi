@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($announcements as $announcement)
		<div class='title-and-content'>
			<h1><a href='#'>{{ $announcement['title'] }}</a></h1><br>
		
			{!! $announcement['paragraph'] !!}

			<div class='littleSpace'>
				<p>{{ "Posted at ".date("F d, Y | h:i A", strtotime($announcement['created_at'])) }}</p>
			</div>
		</div>
	@endforeach

	<div class='content-btns'>
		<div class='content-newer content-btn'><i class='fa fa-angle-left'></i><a href="#">Newer post</a></div>
		<div class='content-older content-btn'><a href="#">Older post</a><i class='fa fa-angle-right'></i></div>
	</div>
@endsection

