@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Roles')

@can('create', App\Models\Entities\Role::class)
	@section('wrapper-button')
		{!! Form::open(['url' => ['dashboard/roles/create'], 'method' => 'GET']) !!}
			{{Form::submit('Add Role', ['style' => 'margin:0 5px;float:right', 'class' => 'btn btn-md btn-success'])}}
		{!! Form::close() !!}
	@endsection
@endcan

@section('wrapper-body')
	<table id="role_example" class="table table-striped table-bordered">
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
	        $('#role_example').DataTable({
	            processing: true,
	            serverSide: true,
	            "searching": true,
	            order: [ [0, 'desc'] ],
	            ajax: '{{ url("dashboard/role-data") }}',
	            columns: [
	                { data: 'title', name: 'title' },
	                { data: 'action', name: 'action'}
	            ]
	        });

	        $('#role_example').on('click', '.delete_role', function (e) { 
			    $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					}
				});

			    $.ajax({
			        url: '/dashboard/roles/'+$(this).attr("value"),
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
