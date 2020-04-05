<?php 
	$upcomingEvents = [
						[
							'title' => '59th FOUNDATION ANNIVERSARY',
							'date' => 'February 13-14, 2020'
						], 
						[
							'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
							'date' => 'February 13, 2020'
						],
					];

	$latestPosts = [
						[
							'title' => 'NON-WORKING HOLIDAY: February 24-25, 2019',
							'posts' => [],
							'posted' => 'February 21, 2020',
							'hiddenLink' => 'NON-WORKING HOLIDAY: February 24-25, 2019'	
						],
						[
							'title' => '59th FOUNDATION ANNIVERSARY',
							'posts' => [],
							'posted' => 'February 11, 2020',
							'hiddenLink' => ''
						],
						[
							'title' => 'THE NEW NORTH CAMPUS MAIN GATE',
							'posts' => [],
							'posted' => 'February 11, 2020',
							'hiddenLink' => ''
						]
				   ];
?>
<div class='posts-and-events'>
	<div class="items">
		<div class="top"><h2>Upcoming Events</h2></div>
		
		<div class="bottom">
			@foreach($upcomingEvents as $event)
				<div class="value">
					<a href="#">{{ $event['title'] }}</a>
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
					@if($latestPost['hiddenLink'])
						<a href='{{ url("redirect/".$latestPost["hiddenLink"]) }}'>{{ $latestPost['title'] }}</a>
					@else
						<a>{{ $latestPost['title'] }}</a>
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