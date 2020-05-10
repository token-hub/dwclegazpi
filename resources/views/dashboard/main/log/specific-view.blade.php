@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Logs view')
@section('wrapper-body')
	<div class='wrapper-content-third'>
		<div class='third-left third-content'>
			<p>Date&Time :</p>
			<p>Description :</p>
		
			@if(strpos($log['log_name'], 'account') || strpos($log['log_name'], 'information'))
				<p>By whom :</p>
				<p>To whom :</p>
				<p>{{ ucwords($log['description']).' :' }}</p>
			@else 
				<p>by whom :</p>
			@endif

			@if(strpos($log['description'], 'updated'))
				<p>From :</p>
				<p>To :</p>
			@endif
		</div>
		<div class='third-right third-content'>
			<p>{{date("F d, Y | h:i A", strtotime($log['created_at'])) }}</p>
				
			@if(strpos($log['log_name'], 'log') === 0)
				<p>{{ 'A user '.$log['description'] }}</p>
			@else 
				<p>{{ 'A '.$log['log_name'].' '.$log['description'] }}</p>
			@endif

			@if(strpos($log['log_name'], 'account') || strpos($log['log_name'], 'information'))
				<p>{{ $log['username'] }}</p>
				<p>{{ $log['subject_username'] }}</p>
			@else 
				<p>{{ $log['username'] }}</p>
			@endif

			@if(strpos($log['description'], 'updated'))
				<p style='border:none;margin-bottom: 35px;'></span>
				@foreach($log->properties['old'] as $key => $from)
					<p>{{$log->properties['old'][$key]}}</p>
				@endforeach

				@foreach($log->properties['attributes'] as $key => $to)
					<p>{{$log->properties['attributes'][$key]}}</p>
				@endforeach
			@else
			
			@foreach($log['properties'] as $key => $first)
				@foreach($first as $key2 => $second)
					
						@if($key2 == 'old')
							@foreach($second as $key3 => $third)
								<p>{{ ucwords($key3).'(old): '.$third.' ' }}</p>
							@endforeach
						@else 
						
							
							@foreach($second as $key3 => $third)
								<p>{{ ucwords($key3).'(new): '.$third.' ' }}</p>
							@endforeach
						@endif
				@endforeach	
			@endforeach
		@endif
	@endsection