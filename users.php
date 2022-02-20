<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";

$sql = "SELECT * FROM user WHERE user.roll != 'admin' AND user._id != '$user_id' Order by user.date DESC";
$result = $conn->query($sql);

?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">


    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 col-8 align-self-center">
            <a href="items-cu.php?page_type=add"
                    class="btn btn-success text-white btn-sm">
                    <i class="mr-3 fas fa-plus" aria-hidden="true"></i>
                    Add New</a>
            </div>
            <div class="col-md-6 col-4 ">
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid tab-content">



        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <h4 class="card-title col-md-10 mb-md-0 mb-3">Projects of the Month</h4>
                            <select class="custom-select col-md-2 ml-auto">
                                <option selected="">January</option>
                                <option value="1">February</option>
                                <option value="2">March</option>
                                <option value="3">April</option>
                            </select>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table class="table stylish-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Assigned</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Created On</th>
                                        <th class="border-top-0" rowspan="2">Roll</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(mysqli_num_rows($result)) {
                                        foreach($result as $account) {
                                            ?>
                                            <tr class="active">
                                                <td>
                                                    <span class="round"  width="50" height="50">
                                                        <img src="./assets/uploads/profile/<?php echo $account['prfImg']; ?>" alt="user"  width="50" height="50">
                                                    </span>
                                                </td>
                                                <td>
                                                    <h6><?php echo $account['name'] ." ". $account['lastName']; ?></h6>
                                                    <small class="text-muted">@ <?php echo $account['usr'];?></small>
                                                </td>
                                                <td>
                                                    <a href="mailto:<?php echo $account['email']; ?>">
                                                    <?php echo $account['email']; ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $account['date']; ?></td>
                                                <td>User</td>
                                                <td>
                                                    <a href="user-view.php?id=<?php echo $account['_id']; ?>" data-toggle="tooltip" title="Expand">
                                                        <i class="fas fa-expand text-info btn-sm"></i>
                                                    </a>
                                                    <a href="#" onclick="confirmDelete(<?php echo $account['_id']; ?>)" data-toggle="tooltip" title="Delete">
                                                        <i class="fas fa-trash-alt text-danger btn-sm"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php       
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>

<script>
    function back() {
        window.history.back();
    }
</script>
<?php require_once "./components/footer.php"; ?>