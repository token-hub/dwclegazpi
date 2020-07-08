@extends('web.updates.updates-overview')

@section('body-left')
	<div class='title-and-content'>
		<h2>{{ $update['title'] }}</h2>
	
		{!! $update['paragraph'] !!}

		<div class='littleSpace'>
			<p>{{ "Posted at ".date("F d, Y | h:i A", strtotime($update['created_at'])) }}</p>
		</div>
	</div>
	
	<div class='content-btns'>
		@if($update['next']['id'])
			<div class='content-newer content-btn'>
				<i class='fa fa-angle-left'></i>
				{!! Form::open(['url' => ['/updates/update-news-and-events', $update['next']['id'] ] , 'method' => 'GET']) !!}
					{{ Form::submit('Newer post', ['class' => 'noborder'] )}}
				{!! Form::close() !!}
			</div>
		@endif
		
		@if($update['prev']['id'])
			<div class='content-older content-btn'>
				{!! Form::open(['url' => ['/updates/update-news-and-events', $update['prev']['id'] ] , 'method' => 'GET']) !!}
					{{ Form::submit('Older post', ['class' => 'noborder'] )}}
				{!! Form::close() !!}
				<i class='fa fa-angle-right'></i>
			</div>
		@endif
	</div>
@endsection

