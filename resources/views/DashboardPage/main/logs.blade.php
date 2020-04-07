@extends('inc.dashboardNavbarLayout')

@section('wrapper-title', 'Logs')
@section('wrapper-body')
  <table id="example" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Time</th>
            <th>Username</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // foreach ($this->getRenderFiles()['logs'] as $key => $log) {
            //     echo "<tr>
            //               <td>".$log['time']."</td>
            //               <td>".$log['username']."</td>
            //               <td>".$log['department_names']."</td>
            //               <td>".$log['log_types']."</td>
            //          </tr>";
            // }
        ?>
    </tbody>
</table>
@endsection