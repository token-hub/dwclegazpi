@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Users')
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
	            ajax: '{{ url("dashboard/users-data") }}',
	            columns: [
	                { data: 'username', name: 'username' },
	                { data: 'department.name', name: 'department.name' },
	                { data: 'roles.title', name: 'roles.title' },
	                { data: 'is_active', name: 'is_active' },
	                { data: '', name: '', 
	                	render:function(data, type, row)
	                	{
		                	return "<a href='/dashboard/users/"+ row.id + "/edit'> <button style='width:100%;margin:2px 0;' class='btn btn-sm btn-info '> Update </button> </a> <button value='"+row.id+"' style='width:100%;' class='btn btn-sm btn-danger delete_account'> Delete </button>";
	                	}
	            	}
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
