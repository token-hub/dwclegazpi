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
						<a>{{$item['title']}}</a>
					@else 
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<h3>{{$item['title']}}</h3> 
						<a class='hidden'>{{$item['title']}}</a>
					@endif
				<p>{!! $item['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $items->links("pagination::bootstrap-4") }}
@endsection
