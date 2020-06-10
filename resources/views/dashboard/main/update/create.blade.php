@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Add Updates')
@section('wrapper-body')
	<div class="wrapper-content-second">
		<div class="form">
			{!! Form::open(['url' => ['/dashboard/updates'], 'method' => 'POST']) !!}

				<div class='dashboard-input'>
					{!! Form::text('title', '', ['id' => 'updates', 'class' => 'input-control', 'required' => 'required']) !!} 
					{!! Form::label('updates', 'Title') !!}
				</div>

				<div class='dashboard-input'>
					{!! Form::text('overview', '', ['id' => 'overview', 'class' => 'input-control', 'required' => 'required']) !!} 
					{!! Form::label('overview', 'Overview') !!}
				</div>

				<div class='dashboard-input'>
					{!! Form::select('category', 
						[
							'announcement' => 'ANNOUNCEMENT',
							'news-and-events' => 'NEWS AND EVENTS',
						],
					null, 
					['placeholder' => '', 'class' => 'input-control', 'id' => 'category', 'required' => 'required']); !!}
				{!! Form::label('category', 'Category') !!}
				</div>
				
				<div class='dashboard-input'>
					<textarea class="form-control" id="ckeditor" name="paragraph"></textarea>
				</div>

				<div class='dashboard-submit-button'>
					{{ Form::submit('Save')}}
				</div>
		{!! Form::close() !!}
		</div>
	</div>
@endsection
@push('scripts')
	<script>
		CKEDITOR.replace( 'ckeditor', {
		    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
		    filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?type=Flash',
		    // filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    		filebrowserUploadMethod: 'form',
		    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		    filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		} );
	</script>
@endpush