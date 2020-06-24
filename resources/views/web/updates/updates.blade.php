@extends('web.layouts.navbar-layout')

@section('banner', 'admission')
@section('body-left')
		@foreach($updates as $key => $update)
			<div class='date-and-content'>
				<div class='date-content-left'>
					<p>{{ date("d", strtotime($update['created_at'])) }}</p>
					<p>{{ date("M", strtotime($update['created_at'])) }}</p>
				</div>
				<div class='date-content-right'>
					{!! Form::open(['url' => ['/updates/update', $update['id'] ] , 'method' => 'GET']) !!}
						{{ Form::submit($update['title'], ['class' => 'noborder'] )}}
					{!! Form::close() !!}

					<p>{!! $update['overview'] !!}</p>
				</div>
			</div>
	@endforeach
	{{ $updates->links("pagination::bootstrap-4") }}
@endsection

@section('body-right')
	@include('web.layouts.latest-post')
@endsection

