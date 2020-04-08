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
							'title' => 'NON-WORKING HOLIDAY: February 24-25, 2019',
							'posts' => [],
							'posted' => 'February 21, 2020',
							'hidden' => 'NON-WORKING HOLIDAY: February 24-25, 2019',
							'category' => 'announcement'
						],
						[
							'title' => '59th FOUNDATION ANNIVERSARY',
							'posts' => [],
							'posted' => 'February 11, 2020',
							'hidden' => '59th FOUNDATION ANNIVERSARY',
							'category' => 'news-and-events'
						],
						[
							'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
							'posts' => [],
							'posted' => 'February 11, 2020',
							'hidden' => 'THE NEW NORTH CAMPUS MAIN GATE',
							'category' => 'news-and-events'
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
						<h4>{{$event['title']}}</h4> 
						<a class='hidden'>{{$event['hidden']}}</a>
						<a class="hidden">{{$event['category']}}</a>
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
						<h4>{{$latestPost['title']}}</h4> 
						<a class='hidden'>{{$latestPost['hidden']}}</a>
						<a class="hidden">{{$latestPost['category']}}</a>
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
				<a href="{{ url('/updates/announcement') }}">Announcement </a>
			</div>
			<div class="value">
				<a href="{{ url('/updates/news-and-events') }}">News and Events</a>
			</div>
		</div>
	</div>
</div>