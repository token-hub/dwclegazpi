<?php 
	$upcomingEvents = [
						[
							'title' => '59th FOUNDATION ANNIVERSARY',
							'date' => 'February 13-14, 2020',
							'hidden' => '59th FOUNDATION ANNIVERSARY',
							'category' => 'news-and-events'
						], 
						[
							'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
							'date' => 'February 13, 2020',
							'hidden' => 'THE NEW NORTH CAMPUS MAIN GATE',
							'category' => 'news-and-events'
						],
					];

	$latestPosts = [
						[
							'title' => 'CHANGES/UPDATES TO MEMO NO.9, s. 2020',
							'posts' => [],
							'posted' => 'May 19, 2020',
							'hidden' => 'CHANGES/UPDATES TO MEMO NO.9, s. 2020',
							'category' => 'announcement'
						],
						[
							'title' => 'ACKNOWLEDGE RECEIPT OF OPEN LETTER DATED MAY 4, 2020',
							'posts' => [],
							'posted' => 'May 19, 2020',
							'hidden' => 'ACKNOWLEDGE RECEIPT OF OPEN LETTER DATED MAY 4, 2020',
							'category' => 'announcement'
						],
						[
							'title' => 'GUIDELINES IN POSTING OFFICIAL COMMUNICATION',
							'posts' => [],
							'posted' => 'May 19, 2020',
							'hidden' => 'GUIDELINES IN POSTING OFFICIAL COMMUNICATION',
							'category' => 'announcement'
						]
				   ];
?>
<div class='posts-and-events'>
	<div class="items">
		<div class="top"><h2>Upcoming Events</h2></div>
		
		<div class="bottom">
			@foreach($upcomingEvents as $event)
				<div class="value">

					@if (empty($event['hidden'])) 
						<a href="#">{{ $event['title'] }}</a>
					@else	
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span>{{$event['title']}}</span> 
						<span class="hidden">{{$event['category']}}</span>
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

					@if(empty($latestPost['hidden']))
						<a>{{ $latestPost['title'] }}</a>
					@else
						<!-- ==== [ HAS A CONNECTION WITH JAVASCRIPT ] ==== -->
						<span>{{$latestPost['title']}}</span> 
						<span class="hidden">{{$latestPost['category']}}</span>
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