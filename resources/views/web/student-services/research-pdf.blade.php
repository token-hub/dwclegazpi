@extends('web.layouts.navbar-layout')

@section('banner', 'admission')
@section('body-left')
	<h1>{{$pdf}}</h1>
	<iframe src="/storage/pdf/{{$pdf}}.pdf#toolbar=0"  frameborder="0"></iframe>
@endsection

@section('body-right')
	@include('web.layouts.latest-post')
@endsection