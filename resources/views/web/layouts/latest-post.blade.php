<?php 
	$upcomingEvents = [
						[
							'title' => '59th FOUNDATION ANNIVERSARY',
							'date' => 'February 13-14, 2020',
							'clickable' => true,
							'category' => 'news-and-events'
						], 
						[
							'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
							'date' => 'February 13, 2020',
							'clickable' => true,
							'category' => 'news-and-events'
						],
					];

	$latestPosts = [
						[
			   				'title' => 'CANCELLATION OF TUITION FEE INCREASE, SY 2020-2021',
			   				'posts' => [],
			   				'posted' => 'May 19, 2020',
			   				'clickable' => true,
			   				'category' => 'announcement',
			   			],
						[
							'title' => 'CHANGES/UPDATES TO MEMO NO.9, s. 2020',
							'posts' => [],
							'posted' => 'May 19, 2020',
							'clickable' => true,
							'category' => 'announcement'
						],
						[
							'title' => 'ACKNOWLEDGE RECEIPT OF OPEN LETTER DATED MAY 4, 2020',
							'posts' => [],
							'posted' => 'May 19, 2020',
							'clickable' => true,
							'category' => 'announcement'
						],
				   ];
?>
<div class='posts-and-events'>
	<div class="items">
		<div class="top"><h2>Upcoming Events</h2></div>
		
		<div class="bottom">
			@foreach($upcomingEvents as $event)
				<div class="value">

					@if ($event['clickable']) 
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span class='clickable'>{{$event['title']}}</span> 
						<span class="hidden">{{$event['category']}}</span>
					@else	
						<span>{{ $event['title'] }}</span>
					@endif

					<p class='red'>{{ $event['date'] }}</p>
				</div>
			@endforeach 
		</div>
	</div>

	<div class="items">
		<div class="top"><h2>Latest Post</h2></div>
		<div class="bottom">
			@foreach($latestPosts as $latestPost)
				<div class='value'>

					@if($latestPost['clickable'])
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span class='clickable'>{{$latestPost['title']}}</span> 
						<span class="hidden">{{$latestPost['category']}}</span>
					@else
						<span>{{ $latestPost['title'] }}</p>
					@endif

					@foreach($latestPost['posts'] as $post)
						<p class='red'>{{ $post }}</p>
					@endforeach
						<p>Posted: {{ $latestPost['posted'] }}</p>
				</div>
			@endforeach
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