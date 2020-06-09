@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($newsAndEvents as $newsAndEvent)
		<div class='title-and-content'>
			<h1><a href='#'>{{ $newsAndEvent['title'] }}</a></h1><br>
			
			{!! $newsAndEvent['paragraph'] !!}

			<div class='littleSpace'>
				<p>{{ "Posted at ".date("F d, Y | h:i A", strtotime($newsAndEvent['created_at'])) }}</p>
			</div>
		</div>
	@endforeach

	<div class='content-btns'>
		<div class='content-newer content-btn'><i class='fa fa-angle-left'></i><a href="#">Newer post</a></div>
		<div class='content-older content-btn'><a href="#">Older post</a><i class='fa fa-angle-right'></i></div>
	</div>
@endsection

