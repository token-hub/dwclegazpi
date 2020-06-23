@extends('web.layouts.navbar-layout')

@section('banner', 'admission')
@section('body-left')
	
		@foreach($pdfs as $key => $pdf)
		<div class='date-and-content {{ $pdf["category"] }}'>
			<div class='date-content-left'>
				<p>{{ $pdf['day'] }}</p>
				<p>{{ $pdf['month'] }}</p>
			</div>
			<div class='date-content-right'>
				{!! Form::open(['url' => ['/student-services/research-pdf', $pdf['title'] ] , 'method' => 'GET']) !!}
					<span>   </span>
					{{ Form::submit($pdf['title'], ['class' => 'noborder'] )}}
				{!! Form::close() !!}

				<p>{!! $pdf['overview'] !!}</p>
			</div>
		</div>
	@endforeach
@endsection

@section('body-right')
	@include('web.layouts.latest-post')
@endsection