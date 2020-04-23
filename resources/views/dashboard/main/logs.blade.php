@extends('dashboard.layouts.navbar-layout')

@section('wrapper-title', 'Logs')
@section('wrapper-body')
  <table id="logs" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Time</th>
            <th>Description</th>
            <th>User</th>
        </tr>
    </thead>
</table>
@endsection
@push('scripts')
   <script>
        $(document).ready(function() {
            $('#logs').DataTable({
                processing: true,
                serverSide: true,
                order: [ [0, 'desc'] ],
                "searching": true,
                ajax: '{{ url("dashboard/logsData") }}',
                columns: [
                    { data: 'timeAndDate', name: 'timeAndDate'},
                    { data: 'description', name: 'description'},
                    { data: 'username', name: 'username', 
                        render:function(data, type, row){
                            return "<a href='logs-view/"+row.causer_id+"/"+row.created_at+"' style='text-decoration:none;'>"+ row.username +"</a>";
                        }
                    },
                ]
            });
        });
    </script>
@endpush