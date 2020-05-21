@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($announcements as $key => $announcement)
		<div class='date-and-content {{ $announcement["category"] }}'>
			<div class='date-content-left'>
				<p>{{ $announcement['day'] }}</p>
				<p>{{ $announcement['date'] }}</p>
			</div>
			<div class='date-content-right'>
					@if($announcement['clickable'])
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span class='announcement clickable'>{{$announcement['title']}}</span> 
					@else 
						<span>{{$announcement['title']}}</span>
					@endif
				<p>{!! $announcement['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $announcements->links("pagination::bootstrap-4") }}
@endsection
