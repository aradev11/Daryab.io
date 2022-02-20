<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";
$page_type = isset($_GET['page_type']) ? $_GET['page_type'] : "add";
$assign = "";
$name = "";


// Get the value of user
if(isset($_GET['id']) && $_GET['page_type'] == 'edit') {
    $query = "SELECT * FROM cat WHERE _id='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($rows = mysqli_fetch_assoc($result)) {
            $name = $rows['name'];
        }
    }
}

// Update Value of User category
if(isset($_POST['update-form-submit'])) {

    $name = $_POST['name'];

    $updateSql = "UPDATE `cat` SET `name`='$name' WHERE cat._id = '$id'";
                  
    $updateResult = $conn->query($updateSql);

    if($updateResult) {
        ?>
        <script>
            alert("Category Item Updated Successfully");
            window.location.href = 'cat.php';
        </script>
        <?php
        
    }else {
        return false;
        ?>
        <script>
            alert("There is an error Please Try Again!");
        </script>
        <?php
    }
}
//--- END


// Update Value of User profile
 if(isset($_POST['add-form-submit'])) {

    $name = $_POST['name'];

    $addSql = "INSERT INTO `cat`(`name`, `add_by`) VALUES ('$name','$user_id')";
                  
    $updateResult = $conn->query($addSql);

    if($updateResult) {
        ?>
        <script>
            alert("Successfully Add");
            window.location.href = 'cat.php';
        </script>
        <?php
        
    }else {
        return false;
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
                        <div class="col-lg-12 col-xlg-9 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="mb-4 card-title">Category Information</h3>

                                </div>
                                <div class="card-body">
                                        
                                        <div class="form-group row pr-2 pl-2">
                                            <div class="col-md-6">
                                                <label class="col-md-12 p-0">Category Name</label>

                                                <input name="name" value='<?php echo $name; ?>' type="text" placeholder="Johnathan" 
                                                    class="form-control pl-0 form-control-line">
                                            </div>
                                           
                                        </div>                                        
                                </div>
                                    <div class="card-footer pt-0 pb-0 bg-white">
                                        <div class="form-group">
                                            <div class="col-sm-12 d-flex">
                                                <input 
                                                type='submit' 
                                                name="<?php 
                                                    if($page_type == 'add') {
                                                        echo "add-form-submit";
                                                    } else {
                                                        echo "update-form-submit";
                                                    }
                                                ?>" 
                                                class="btn btn-success mx-auto mx-md-0 text-white" value="<?php 
                                                    if($page_type == 'add') {
                                                        echo "Add Item";
                                                    } else {
                                                        echo "Update";
                                                    }
                                                ?>" />
                                                
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