@extends('web.updates.updates-overview')

@section('body-left')
	@foreach($items as $key => $item)
		<div class='date-and-content {{ $item["category"] }}'>
			<div class='date-content-left'>
				<p>{{ $item['day'] }}</p>
				<p>{{ $item['date'] }}</p>
			</div>
			<div class='date-content-right'>
					@if(empty($item['hidden']))
						<span>{{$item['title']}}</span>
					@else 
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span>{{$item['title']}}</span> 
						<span class='hidden'>{{$item['title']}}</span>
					@endif
				<p>{!! $item['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $items->links("pagination::bootstrap-4") }}
@endsection
