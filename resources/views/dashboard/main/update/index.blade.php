@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Updates')

@can('create', App\Models\Entities\Update::class)
	@section('wrapper-button')
		{!! Form::open(['url' => ['/dashboard/updates/create'], 'method' => 'GET']) !!}
			{{Form::submit('Add Updates', ['style' => 'margin:0 5px;float:right', 'class' => 'btn btn-md btn-success'])}}
		{!! Form::close() !!}
	@endsection
@endcan

@section('wrapper-body')
	<table id="update_example" class="table table-striped table-bordered">
        <thead>
            <tr>
            	<th>ID</th>
            	<th>Date</th>
                <th>Title</th>
                <th>Category</th>
                <th>User</th>
                <th style='width: 10%;'>Action</th>
            </tr>
        </thead>
    </table>
@endsection
@push('scripts')
   <script>
	    $(document).ready(function() {
	        $('#update_example').DataTable({
	            processing: true,
	            serverSide: true,
	            "searching": true,
	            order: [ [0, 'desc'] ],
	            ajax: '{{ url("dashboard/update-data") }}',
	            columns: [
	           		{ data: 'id', name: 'id' },
	                { data: 'date', name: 'date' },
	                { data: 'title', name: 'title' },
	                { data: 'category', name: 'category' },
	                { data: 'user', name: 'user' },
	                { data: 'action', name: 'action'}
	            ]
	        });

	        $('#update_example').on('click', '.delete_update', function (e) { 
			    $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					}
				});

			    $.ajax({
			        url: '/dashboard/updates/'+$(this).attr("value"),
			        type: 'DELETE',
			        data: {method: '_DELETE', submit: true},
			         success: function(data) {
				       window.location.reload();
				    },
				    error: function(data) {
				        console.log('Error:', data);
				    },
			    });
			});
	    });
	</script>
@endpush
