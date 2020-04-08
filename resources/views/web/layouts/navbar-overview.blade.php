@extends('web.layouts.app')

@section('content')
<div class='banner'>
	<img src="/storage/img/banner/@yield('banner').jpg">
</div>

<!-- -----------------------[ Divine container ] ----------------------- -->
<div class='divine-container-second'>
	<div class='content'>

		<div class='items left'>
			@yield('body-left')
		</div>

		<div class='items right' >
			<h1>@yield('title')</h1><hr>
			@yield('body-right')
		</div>

	</div>
</div>
@endsection

