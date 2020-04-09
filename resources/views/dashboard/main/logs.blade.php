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
                ajax: '{{ url("dashboard/logs-data") }}',
                columns: [
                    { data: 'created_at', name: 'created_at' },
                    { data: 'description', name: 'description'},
                    { data: 'causer_id', name: 'causer_id', 
                        render:function(data, type, row){
                            return "<a href='#"+row.id+"' style='text-decoration:none;'>"+ row.causer_id +"</a>";
                        }
                    },
                ]
            });
        });
    </script>
@endpush