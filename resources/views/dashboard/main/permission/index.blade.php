@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Permissions')

@can('create', App\Models\Entities\Permission::class)
	@section('wrapper-button')
		{!! Form::open(['url' => ['dashboard/permissions/create'], 'method' => 'GET']) !!}
			{{Form::submit('Add permission', ['style' => 'margin:0 5px;float:right', 'class' => 'btn btn-md btn-success'])}}
		{!! Form::close() !!}
	@endsection
@endcan

@section('wrapper-body')
	<table id="permission_example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th style='width:30%;'>Action</th>
            </tr>
        </thead>
    </table>
@endsection
@push('scripts')
   <script>
	    $(document).ready(function() {
	        $('#permission_example').DataTable({
	            processing: true,
	            serverSide: true,
	            "searching": true,
	            order: [ [0, 'desc'] ],
	            ajax: '{{ url("dashboard/permission-data") }}',
	            columns: [
	                { data: 'title', name: 'title' },
	                { data: 'action', name: 'action'}
	            ]
	        });

	        $('#permission_example').on('click', '.delete_permission', function (e) { 
			    $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					}
				});

			    $.ajax({
			        url: '/dashboard/permissions/'+$(this).attr("value"),
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
