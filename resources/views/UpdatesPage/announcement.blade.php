@extends('UpdatesPage.updatesOverview')

@section('body-left')
	@foreach($announcements as $announcement)
		<div class='title-and-content'>
			<h1><a href='#'>{{ $announcement['title'] }}</a></h1><br>
			
			@foreach($announcement['paragraphs'] as $paragraph)
				{!! $paragraph !!}
			@endforeach

			@foreach($announcement['image'] as $image)
				<img src="/storage/img/newsAndEvents/{{ $image }}" class='storage-img'>
			@endforeach

			<div class='littleSpace'>
				<p>{{ $announcement['posted'] }}</p>
			</div>
		</div>
	@endforeach

	<div class='content-btns'>
		<div class='content-newer content-btn'><i class='fa fa-angle-left'></i><a href="#">Newer post</a></div>
		<div class='content-older content-btn'><a href="#">Older post</a><i class='fa fa-angle-right'></i></div>
	</div>
@endsection

