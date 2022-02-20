<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";

// Get the value of user
$query = "SELECT * FROM user WHERE _id='$id'";
$result = $conn->query($query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    foreach($result as $user) {
        $fullName = $user['name'] . " " . $user['lastName'];
        $name = $user['name'];
        $lname = $user['lastName'];
        $email = $user['email'];
        $about = $user['about'];
        $usr = $user['usr'];
        $pwd = $user['pwd'];
        $profile = $user['prfImg'];
        $roll = $user['roll'];
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body profile-card">
                                    <center class="m-t-30"> 
                                        <div class='card-profile-image'>

                                            <img src="./assets/uploads/profile/<?php echo $profile; ?>" width="150" />
                                            <div class="middle" id='uploaded-file'>
                                                <i class="fas fa-plus icon"></i>
                                            </div>
                                        </div>
                                        
                                        <h4 class="card-title m-t-10"><?php echo $name . " " . $lname; ?></h4>
                                        <h6 class="card-subtitle">@<?php echo $usr; ?></h6>
                                        <div class="row justify-content-center">
                                            <p>
                                            <?php echo $about; ?>
                                            </p>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    2021/1/1
                                </div>
                                <div class="card-body row">
                                    <div class="col-md-6">
                                        <h3 class="card-title">
                                            Personal Information
                                        </h3>
                                        <ul class="list">
                                            <li class='d-flex justify-content-between'>
                                                Name: <span><?php echo $name; ?></span>
                                            </li>
                                            <li class='d-flex justify-content-between'>
                                                Last Name: <span><?php echo $lname; ?></span>
                                            </li>
                                            <li class='d-flex justify-content-between'>
                                                Email: <span><a href="mailto: <?php echo $email; ?>"> <?php echo $email; ?></a></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="card-title">
                                            Account Information
                                        </h3>
                                        <ul class="list">
                                            <li class='d-flex justify-content-between'>
                                                Username: <span><?php echo $usr; ?></span>
                                            </li>
                                            <li class='d-flex justify-content-between'>
                                                Password: <span><?php echo $pwd; ?></span>
                                            </li>
                                            <li class='d-flex justify-content-between'>
                                                Roll: <span><?php echo $roll; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php 
                                    if($about != "") {
                                        ?>
                                        <div class="col-md-12">
                                            <h3 class="card-title">
                                                About <?php echo $fullName; ?>
                                            </h3>
                                            <?php echo $about; ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
        
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>

<?php require_once "./components/footer.php"; ?>