@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($announcements as $key => $announcement)
		<div class='date-and-content {{ $announcement["category"] }}'>
			<div class='date-content-left'>
				<p>{{ date("d", strtotime($announcement['created_at'])) }}</p>
				<p>{{ date("M", strtotime($announcement['created_at'])) }}</p>
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
