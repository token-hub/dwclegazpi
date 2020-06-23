@extends('web.layouts.navbar-layout')

@section('banner', 'admission')
@section('body-left')
	<iframe src="/storage/pdf/{{$pdf}}.pdf"  frameborder="0"></iframe>
@endsection

@section('body-right')
	@include('web.layouts.latest-post')
@endsection