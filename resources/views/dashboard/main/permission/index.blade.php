@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Permissions')

@section('wrapper-button')
	{!! Form::open(['url' => ['dashboard/permissions/create'], 'method' => 'GET']) !!}
		{{Form::submit('Add permission', ['style' => 'margin:0 5px;float:right', 'class' => 'btn btn-md btn-success'])}}
	{!! Form::close() !!}
@endsection

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
	                { data: '', name: '', 
	                	render:function(data, type, row)
	                	{
		                	return "<a href='/dashboard/permissions/"+ row.id + "/edit'> <button style='width:100%;margin:2px 0;' class='btn btn-sm btn-info '> Update </button> </a> <button value='"+row.id+"' style='width:100%;' class='btn btn-sm btn-danger delete_permission'> Delete </button>";
	                	}
	            	}
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
