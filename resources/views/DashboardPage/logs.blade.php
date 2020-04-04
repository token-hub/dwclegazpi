<?php require_once  VIEWS.'dashboardHeader.php'; ?>
<?php require_once  VIEWS.'DashboardPage/dashboardnavs.phtml'; ?>

    <div class="dashboard-home-container">
        <div class='dashbord-home-content'>
            <h4>logs</h4>
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
                        foreach ($this->getRenderFiles()['logs'] as $key => $log) {
                            echo "<tr>
                                      <td>".$log['time']."</td>
                                      <td>".$log['username']."</td>
                                      <td>".$log['department_names']."</td>
                                      <td>".$log['log_types']."</td>
                                 </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>  
    </div>

<?php require_once  VIEWS.'DashboardPage/dashboardClosingNavs.phtml'; ?>
<?php require_once  VIEWS.'dashboardFooter.php'; ?>