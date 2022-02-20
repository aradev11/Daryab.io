<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";


// Get the value of user
$query = "SELECT * FROM user WHERE _id='$user_id'";
$result = $conn->query($query);
    // output data of each row
    foreach($result as $rows) {
        $name = $rows['name'];
        $lname = $rows['lastName'];
        $email = $rows['email'];
        $about = $rows['about'];
        $usr = $rows['usr'];
        $pwd = $rows['pwd'];
        $profile = $rows['prfImg'];
    }

// Update Value of User profile
 if(isset($_POST['update-profile-form-submit'])) {

    $targetImg = "./assets/uploads/profile/" . basename($_FILES['profile']['name']);

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $emailadd = $_POST['email'];
    $profileimg = $_FILES['profile']['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $describe = $_POST['about'];

    if($profileimg == "") {
        $updateProfile = $_POST['old-profile'];
    } else {
        $updateProfile = $profileimg;
    }

    $updateSql = "UPDATE `user` 
                  SET `name`='$firstname',`lastName`='$lastname',`usr`='$username',`pwd`='$password',`prfImg`='$updateProfile',`email`='$emailadd',`about`='$describe'
                  WHERE user._id = '$user_id'";
                  
    $updateResult = mysqli_query($conn, $updateSql);

    if($updateResult) {
        move_uploaded_file($_FILES['profile']['tmp_name'], $targetImg);
        ?>
        <script>
            alert("Profile Updated Successfully");
        </script>
        <?php
        
    }else {
        ?>
        <script>
            alert("There is an error Please Try Again!");
        </script>
        <?php
    }
}
//--- END


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
                <form enctype="multipart/form-data" method="post" class="form-horizontal form-material" >
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
                                        <input type="hidden" name="old-profile" value="<?php echo $profile; ?>" />
                                        <input type="file" name="profile" accept="image/*" value="<?php echo $profile; ?>" id='profile-img' hidden/>
                                        
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
                                <div class="card-body">
                                    
                                        <div class="form-group row pr-2 pl-2">
                                            <div class="col-md-6">
                                                <label class="col-md-12 p-0">First Name</label>

                                                <input name="fname" value='<?php echo $name; ?>' type="text" placeholder="Johnathan Doe" 
                                                    class="form-control pl-0 form-control-line">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-md-12 p-0">Last Name</label>
                                                <input name="lname" value='<?php echo $lname; ?>' type="text" placeholder="Johnathan Doe"
                                                    class="form-control pl-0 form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Username</label>
                                            <div class="col-md-12">
                                                <input name="username" value='<?php echo $usr ?>' type="text" placeholder="Your Username"
                                                    class="form-control pl-0 form-control-line" name="usr">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Password</label>
                                            <div class="col-md-12">
                                                <input name="password" value='<?php echo $pwd; ?>' type="password" value="password"
                                                    class="form-control pl-0 form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input name="email" value='<?php echo $email; ?>' type="email" placeholder="johnathan@admin.com"
                                                    class="form-control pl-0 form-control-line" name="example-email"
                                                    id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">About</label>
                                            <div class="col-md-12">
                                                <textarea name="about" value='<?php echo $about; ?>' rows="5" class="form-control pl-0 form-control-line"><?php echo $about; ?></textarea>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="col-sm-12 d-flex">
                                                <a href="profile.php">
                                                <input 
                                                type='submit' 
                                                name="update-profile-form-submit" 
                                                class="btn btn-success mx-auto mx-md-0 text-white" value="Update" />
                                                </a>
                                            </div>
                                            
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                </form>
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