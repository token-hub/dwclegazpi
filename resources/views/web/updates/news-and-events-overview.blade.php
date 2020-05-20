@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($newsAndEvents as $key => $newsAndEvent)
		<div class='date-and-content {{ $newsAndEvent["category"] }}'>
			<div class='date-content-left'>
				<p>{{ $newsAndEvent['day'] }}</p>
				<p>{{ $newsAndEvent['date'] }}</p>
			</div>
			<div class='date-content-right'>
					@if(empty($newsAndEvent['hidden']))
						<span>{{$newsAndEvent['title']}}</span>
					@else 
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span class='newsAndEvent'>{{$newsAndEvent['title']}}</span> 
						<span class='hidden'>{{$newsAndEvent['title']}}</span>
					@endif
				<p>{!! $newsAndEvent['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $newsAndEvents->links("pagination::bootstrap-4") }}
@endsection
