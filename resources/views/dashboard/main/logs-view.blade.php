@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Logs view')
@section('wrapper-body')
	<div class='wrapper-content-third'>
		<div class='third-left third-content'>
			<p>Date&Time :</p>
			<p>Description :</p>

			@if(strpos($log->description, 'account') || strpos($log->description, 'information'))
				<p>By whom :</p>
				<p>To whom :</p>
			@else 
				<p>by whom :</p>
			@endif
			
			@if(strpos($log->description, 'updated'))
				<p>{{ ucwords(strrev(substr(strrev($log->description), 1, 8))) }}</p>
				<p>From :</p>
				<p>To :</p>
			@else
				@if(!strpos($log->description, 'log'))
					<p>{{ ucwords(strrev(substr(strrev($log->description), 1, 8))) }}</p>
				@endif
			@endif
		</div>
		<div class='third-right third-content'>
			<p>{{date("F d, Y | h:i A", strtotime($log->created_at)) }}</p>
			<p>{{ $log->description }}</p>

			@if(strpos($log->description, 'account') || strpos($log->description, 'information'))
				<p>{{ $log->username }}</p>
				<p>{{ $log->properties['toUsername'] }}</p>
			@else 
				<p>{{ $log->username }}</p>
			@endif

			@if(strpos($log->description, 'updated'))
				<p style='border:none;margin-bottom: 35px;'></span>
				@foreach($log->properties['old'] as $key => $from)
					<p>{{$log->properties['old'][$key]}}</p>
				@endforeach

				@foreach($log->properties['attributes'] as $key => $to)
					<p>{{$log->properties['attributes'][$key]}}</p>
				@endforeach
				
			@else
				@if($log->properties != '[]') 
					@foreach($log->properties['attributes'] as $key => $from)
						<p>{{$log->properties['attributes'][$key]}}</p>
					@endforeach	
				@endif
			@endif
		</div>
	</div>
@endsection