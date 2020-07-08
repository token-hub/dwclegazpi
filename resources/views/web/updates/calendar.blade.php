@extends('web.layouts.app')

@section('content')
	<div class='banner'>
		<img src="/storage/img/banner/updates.jpg">
	</div>
	<div class="calendar">
		<div class="content">
			 {!! $calendar->calendar() !!}
   			 {!! $calendar->script() !!}
		</div>
	</div>
@endsection
@push('scripts')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@endpush