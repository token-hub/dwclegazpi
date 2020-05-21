@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($newsAndEvents as $key => $newsAndEvent)
		<div class='date-and-content {{ $newsAndEvent["category"] }}'>
			<div class='date-content-left'>
				<p>{{ $newsAndEvent['day'] }}</p>
				<p>{{ $newsAndEvent['date'] }}</p>
			</div>
			<div class='date-content-right'>
					@if($newsAndEvent['clickable'])
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span class='newsAndEvent clickable'>{{$newsAndEvent['title']}}</span> 
					@else 
						<span>{{$newsAndEvent['title']}}</span>
					@endif
				<p>{!! $newsAndEvent['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $newsAndEvents->links("pagination::bootstrap-4") }}
@endsection
