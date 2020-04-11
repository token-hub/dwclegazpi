@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Logs view')
@section('wrapper-body')
	<div class='wrapper-content-third'>
		<div class='third-left third-content'>
			<p>Date&Time :</p>
			<p>Description :</p>

			@if(strpos($logs[0]->description, 'account') || strpos($logs[0]->description, 'information'))
			<p>By whom :</p>
			<p>To whom :</p>
			@else 
			<p>by whom :</p>
			@endif
			
			@if(strpos($logs[0]->description, 'updated'))
				<p>{{ ucwords(strrev(substr(strrev($logs[0]->description), 1, 8))) }}</p>
				<p>From :</p>
				<p>To :</p>
			@else
				@if(!strpos($logs[0]->description, 'logs'))
					<p>{{ ucwords(strrev(substr(strrev($logs[0]->description), 1, 8))) }}</p>
				@endif
			@endif
		</div>
		<div class='third-right third-content'>
			<p>{{date("F d, Y | h:i A", strtotime($logs[0]->created_at)) }}</p>
			<p>{{ $logs[0]->description }}</p>

			@if(strpos($logs[0]->description, 'account') || strpos($logs[0]->description, 'information'))
				<p>{{ $logs[0]->username }}</p>
				<p>{{ $logs[0]->properties['toUsername'] }}</p>
			@else 
			<p>{{ $logs[0]->username }}</p>
			@endif

			@if(strpos($logs[0]->description, 'updated'))
				<p style='border:none;margin-bottom: 35px;'></span>
				@foreach($logs[0]->properties['old'] as $key => $from)
					<p>{{$logs[0]->properties['old'][$key]}}</p>
				@endforeach

				@foreach($logs[0]->properties['attributes'] as $key => $to)
					<p>{{$logs[0]->properties['attributes'][$key]}}</p>
				@endforeach
				
			@else
				@if($logs[0]->properties != '[]') 
					@foreach($logs[0]->properties['attributes'] as $key => $from)
						<p>{{$logs[0]->properties['attributes'][$key]}}</p>
					@endforeach	
				@endif
			@endif
		</div>
	</div>
@endsection