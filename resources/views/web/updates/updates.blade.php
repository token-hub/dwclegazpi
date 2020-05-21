@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($updates as $key => $update)
		<div class='date-and-content {{ $update["category"] }}'>
			<div class='date-content-left'>
				<p>{{ $update['day'] }}</p>
				<p>{{ $update['date'] }}</p>
			</div>
			<div class='date-content-right'>
					@if($update['clickable'])
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span class='clickable'>{{$update['title']}}</span> 
					@else 
						<span>{{$update['title']}}</span>
					@endif
				<p>{!! $update['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $updates->links("pagination::bootstrap-4") }}
@endsection
