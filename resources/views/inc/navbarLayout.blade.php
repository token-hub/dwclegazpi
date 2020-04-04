@extends('layouts.app')

@section('content')
<div class='banner'>
	<img src="/storage/img/banner/@yield('banner').jpg">
</div>

<!-- -----------------------[ Divine container ] ----------------------- -->
<div class='divine-container'>
	<div class='content'>

		<div class='items left'>
			<h1>@yield('title')</h1>
			@yield('body-left')
		</div>

		<div class='items right' >
			@yield('body-right')
		</div>

	</div>
</div>
@endsection