@if(count($errors) > 0 && session('notification') === NULL)
	<div class='alert-custom-container'>
		@foreach($errors->all() as $error)
			<div class='alert-custom'>
				<p>{{$error}}</p>
			</div>
		@endforeach
	</div>
@endif

@if(session('status'))
	<div class='alert-custom-container'>
		<div class='alert-custom'>
			<p>{{session('status')}}</p>
		</div>
	</div>
@endif 