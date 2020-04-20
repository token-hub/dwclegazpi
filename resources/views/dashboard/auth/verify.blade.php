@extends('dashboard.layouts.navbar-layout-2')

@section('wrapper-title', 'Verify Your Email Address')
@section('wrapper-body')
Before proceeding, please check your email for a verification link.
{!! Form::open(['route' => ['verification.resend'], 'method' => 'GET']) !!}
	 <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
{!! Form::close() !!}
@endsection