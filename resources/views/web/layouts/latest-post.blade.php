<div class='posts-and-events'>
	<div class="items">
		<div class="top"><h2>Upcoming Events</h2></div>
		<div class="bottom">
			@if(count($latestUpcoming['upcomingEvents']) > 0)
				@foreach($latestUpcoming['upcomingEvents'] as $upcomingEvent)
					<div class='value'>
						@if($upcomingEvent['clickable'] == 1)
							{!! Form::open(['url' => ['/updates/update', $upcomingEvent['id'] ] , 'method' => 'GET']) !!}
								{{ Form::submit($upcomingEvent['title'], ['class' => 'noborder'] )}}
							{!! Form::close() !!}
						@else
							<span>{{ $upcomingEvent['title'] }}</span>
						@endif
						<p class='red'>{{  date('F d, Y', strtotime($upcomingEvent['created_at']))  }}</p>
					</div>
				@endforeach
			@else 
				<div class='value'>
					<center><span class='black'>No Upcoming Events</span></center>
				</div>
			@endif
		</div>
	</div>

	<div class="items">
		<div class="top"><h2>Latest Post</h2></div>
		<div class="bottom">
			@if(count($latestUpcoming['latestPosts']) > 0)
				@foreach($latestUpcoming['latestPosts'] as $latestPosts)
				<div class='value'>
					@if($latestPosts['clickable'] == 1)
						{!! Form::open(['url' => ['/updates/update', $latestPosts['id'] ] , 'method' => 'GET']) !!}
							{{ Form::submit($latestPosts['title'], ['class' => 'noborder'] )}}
						{!! Form::close() !!}
					@else
						<span>{{ $latestPosts['title'] }}</span>
					@endif
					<p>{{  date('F d, Y | h:s A', strtotime($latestPosts['created_at']))  }}</p>
				</div>
				@endforeach
			@else 
				<center><span class='black'>No Upcoming Events</span></center>
			@endif
		</div>
	</div>

	<div class="items">
		<div class="top"><h2>Categories</h2></div>
		<div class="bottom">
			<div class="value">
				<a href="{{ url('/updates/announcement-overview') }}">Announcement </a>
			</div>
			<div class="value">
				<a href="{{ url('/updates/news-and-events-overview') }}">News and Events</a>
			</div>
		</div>
	</div>
</div>

