@extends('layouts.app')

@section('content')
	<!-- -----------------------[ Parallax image ] ----------------------- -->
		<div class='parallax'>
		</div>
	<!-- -----------------------[ Parallax image end] ----------------------- -->

	<!-- -----------------------[ Divine container ] ----------------------- -->
	<div class='divine-container-reverse'>
		<div class='divine-content-left-reverse' >
			<p>Please visit us again as we are currently updating information on this page. Thank you.</p>
		</div>
		<?php require_once  VIEWS.'latestPost.html'; ?>
	</div>
	<!-- -----------------------[ Divine container end ] ----------------------- -->
@endsection