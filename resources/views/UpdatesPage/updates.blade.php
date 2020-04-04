@extends('UpdatesPage.updatesOverview')

@section('body-left')
	@foreach($items as $key => $item)
		<div class='date-and-content'>
			<div class='date-content-left'>
				<p>{{ $item['day'] }}</p>
				<p>{{ $item['date'] }}</p>
			</div>
			<div class='date-content-right'>
				<h3>
					@if(empty($item['hidden']))
						<a>{{$item['title']}}</a>
					@else 
						<a href="{{ url('redirect/'.$item['hidden']) }}">{{$item['title']}}</a>
					@endif
				</h3>
				<p>{!! $item['overview'] !!}</p>
			</div>
		</div>
	@endforeach
	{{ $items->links("pagination::bootstrap-4") }}
@endsection
