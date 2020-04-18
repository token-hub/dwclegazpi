@if(Session::has('notification'))
	<div class="notification {{Session::get('notification')['type']}}">
		<div class='notification-icon'>
			<i class='fa'></i>
		</div>
		<div class="notification-content">
			<ul>
				<li>
					{{Session::get('notification')['message']}}
				</li>
			</ul>
		</div>
	</div>
@endif

@if($errors->any())
	<div class="notification notif-danger">
		<div class='notification-icon'>
			<i class='fa'></i>
		</div>
		<div class="notification-content">
			<ul>
				@foreach ($errors->all() as $error)
	            	<li>{{ $error }}</li>
	            @endforeach
			</ul>
		</div>
	</div>
@endif
