@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Users')

@can('create', App\Models\Entities\User::class)
	@section('wrapper-button')
		{!! Form::open(['url' => ['dashboard/users/create'], 'method' => 'GET']) !!}
			{{Form::submit('Add User', ['style' => 'margin:0 5px;float:right', 'class' => 'btn btn-md btn-success'])}}
		{!! Form::close() !!}
	@endsection
@endcan

@section('wrapper-body')
	<table id="user_example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Department</th>
                <th>Roles</th>
                <th>Status</th>
                <th style='width: 10%;'>Action</th>
            </tr>
        </thead>
    </table>
@endsection
@push('scripts')
   <script>
	    $(document).ready(function() {
	        $('#user_example').DataTable({
	            processing: true,
	            serverSide: true,
	            "searching": true,
	            order: [ [0, 'desc'] ],
	            ajax: '{{ url("dashboard/user-data") }}',
	            columns: [
	                { data: 'username', name: 'username' },
	                { data: 'department.name', name: 'department.name' },
	                { data: 'roles.title', name: 'roles.title' },
	                { data: 'is_active', name: 'is_active' },
	                { data: 'action', name: 'action'}
	            ]
	        });

	        $('#user_example').on('click', '.delete_account', function (e) { 
			    $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					}
				});

			    $.ajax({
			        url: '/dashboard/users/'+$(this).attr("value"),
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
