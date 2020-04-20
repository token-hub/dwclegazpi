@extends('dashboard.layouts.dashboard')

@section('content')
	<div class="dashboard-main">

		<!-- ===== [ NAVBAR ] ===== -->
		<div class="main-top"> 
			<div class="main-content">
				<div class="left">
					<img src="/storage/img/others/logo.png">
					<a>DWCL Admin</a>
				</div>
				<div class="right">
				</div>
			</div>
		</div>
		<div class="main-bottom">
			<div class="content-2">
				<div class="content-2-item">
					<div class="wrapper wrapper-160">
						<h3>@yield('wrapper-title')</h3><hr>
						@yield('wrapper-body')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection