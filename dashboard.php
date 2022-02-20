<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";

$total_found = 0;
$total_lost = 0;
$total_view = 0;
$total_users = 0;

// return items filter by found
$sql = "SELECT COUNT(name) as f FROM item WHERE item.type = 'found'";
$new_result = mysqli_query($conn, $sql);
if(mysqli_num_rows($new_result) > 0) {
    while($rows = mysqli_fetch_assoc($new_result)) {
        // $total_found += $rows['n'];
        $total_found += $rows["f"];
    }
}
// return items filter by lost
$sql = "SELECT COUNT(name) as l FROM item WHERE item.type = 'lost'";
$new_result = mysqli_query($conn, $sql);
if(mysqli_num_rows($new_result) > 0) {
    while($rows = mysqli_fetch_assoc($new_result)){
        $total_lost = $rows['l'];
    }
}
// return views
$sql = "SELECT sum(view) as v FROM item";
$new_result = mysqli_query($conn, $sql);
if(mysqli_num_rows($new_result) > 0) {
    while($rows = mysqli_fetch_assoc($new_result)){
        $total_view = $rows['v'];
    }
}
// return users count
$sql = "SELECT count(usr) as u FROM user WHERE roll != 'admin'";
$new_result = mysqli_query($conn, $sql);
if(mysqli_num_rows($new_result) > 0) {
    while($rows = mysqli_fetch_assoc($new_result)){
        $total_users = $rows['u'];
    }
}


?>
        
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Report chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Item Founds</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><i class="fas fa-search pr-3 text-success"></i><?php echo $total_found; ?></h2>
                            <span class="text-muted">Last Week Report</span>
                        </div>
                        <span class="text-success">80%</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Item Losts</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><i class="fas fa-bullhorn pr-3 text-warning"></i><?php echo $total_lost;?></h2>
                            <span class="text-muted">Last Week Report</span>
                        </div>
                        <span class="text-warning">80%</span>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar"
                                style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Views</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><i class="fas fa-eye pr-3 text-info"></i><?php echo $total_view; ?></h2>
                            <span class="text-muted">Last Week Report</span>
                        </div>
                        <span class="text-info">50%</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar"
                                style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- Report chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Account</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><i class="far fa-user pr-3 text-success"></i><?php echo $total_users; ?></h2>
                            <span class="text-muted">All Users</span>
                        </div>
                        <span class="text-success">80%</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar"
                                style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Application Health</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><i class="fas fa-heartbeat pr-3 text-danger"></i></h2>
                            <span class="text-muted">Storage</span>
                        </div>
                        <span class="text-danger">20%</span>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar"
                                style="width: 20%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Items Statistics</h4>
                        <div class="flot-chart">
                            <div class="flot-chart-content " id="flot-line-chart"
                                style="padding: 0px; position: relative;">
                                <canvas class="flot-base w-100" height="20"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
        </div>
        
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<?php require_once "./components/footer.php"; ?>