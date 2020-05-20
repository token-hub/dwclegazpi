@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($announcements as $key => $announcement)
		<div class='date-and-content {{ $announcement["category"] }}'>
			<div class='date-content-left'>
				<p>{{ $announcement['day'] }}</p>
				<p>{{ $announcement['date'] }}</p>
			</div>
			<div class='date-content-right'>
					@if(empty($announcement['hidden']))
						<span>{{$announcement['title']}}</span>
					@else 
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span class='announcement'>{{$announcement['title']}}</span> 
						<span class='hidden'>{{$announcement['title']}}</span>
					@endif
				<p>{!! $announcement['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $announcements->links("pagination::bootstrap-4") }}
@endsection
