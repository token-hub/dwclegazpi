@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Users')
@section('wrapper-body')
	<table id="user_example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Department</th>
                <th>System Access</th>
                <th>Status</th>
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
	                { data: 'departments.name', name: 'departments.name', 'orderable': true },
	                { data: 'user_access.user_access', name: 'user_access.user_access' },
	                { data: 'is_active', name: 'is_active', 
	                	render:function(data, type, row){
		                	var btnType = row.is_active == 'Active' ? 'success' : 'danger';
		                	return "<a href='/dashboard/user-status-update/"+ row.id + "/"+ row.is_active +"'> <button style='width:100%;' class='btn btn-sm btn-"+ btnType +" '>"+ row.is_active +"</button> </a>"
	                	}
	            	}
	            ]
	        });
	    });
	</script>
@endpush
