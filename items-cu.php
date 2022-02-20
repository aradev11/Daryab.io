<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";
$page_type = isset($_GET['page_type']) ? $_GET['page_type'] : "add";
$name = "";
$lname = "";
$email = "";
$phone = "";
$about = "";
$location = "";
$image = "";
$date = "";
$cat = "";
$type = "";

// Get the value of user
if(isset($_GET['id']) && $_GET['page_type'] == 'edit') {
    $query = "SELECT item.*, cat._id as catName FROM item INNER JOIN cat ON item.catID = cat._id AND item._id = '$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($rows = mysqli_fetch_assoc($result)) {
            $name = $rows['name'];
            $lname = $rows['lastName'];
            $email = $rows['email'];
            $phone = $rows['phone'];
            $about = $rows['about'];
            $location = $rows['location'];
            $image = $rows['img'];
            $date = $rows['date'];
            $cat = $rows['catName'];
            $type = $rows['type'];
    
        }
    }
}

// Update Value of User profile
if(isset($_POST['update-form-submit'])) {

    $targetImg = "./assets/uploads/items/" . basename($_FILES['image']['name']);

    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];
    $date = $_POST['date'];
    $catID = $_POST['cat'];
    $typeID = $_POST['type'];
    

    if($image == "") {
        $updateImage = $_POST['old-img'];
    } else {
        $updateImage = $image;
    }

    if($catID == ""){
        $update_cat = $cat;
    } else {
        $update_cat = $catID;
    }

    if($typeID == "") {
        $update_type = $type;
    } else {
        $update_type = $typeID;
    }

    $updateSql = "UPDATE `item` SET `name`='$name',`lastName`='$lname',`img`='$updateImage',`about`='$about',`phone`='$phone',`email`='$email',`type`='$update_type',`location`='$location',`date`='$date',`catID`='$update_cat' WHERE item._id = '$id'";
                  
    $updateResult = mysqli_query($conn, $updateSql);

    if($updateResult) {
        move_uploaded_file($_FILES['image']['tmp_name'], $targetImg);
        ?>
        <script>
            alert("item Updated Successfully");
            window.location.href = 'item-view.php';
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

    $targetImg = "./assets/uploads/items/" . basename($_FILES['image']['name']);

    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about = $_POST['about'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];
    $date = $_POST['date'];
    $cat = $_POST['cat'];
    $type = $_POST['type'];
    

    if($image == "") {
        $updateImage = $_POST['old-img'];
    } else {
        $updateImage = $image;
    }

    $addSql = "INSERT INTO `item`(`name`, `lastName`, `img`, `about`, `phone`, `email`, `type`, `location`, `view`, `date`, `catID`) 
    VALUES ('$name','$lname','$updateImage','$about','$phone','$email','$type','$location',0,'$date','$cat')";
                  
    $updateResult = mysqli_query($conn, $addSql);

    if($updateResult) {
        move_uploaded_file($_FILES['image']['tmp_name'], $targetImg);
        ?>
        <script>
            alert("item with id of <?php echo $id ?> Updated Successfully");
            window.location.href = 'items.php';
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
                                    <h3 class="mb-4 card-title">Items Information</h3>

                                </div>
                                <div class="card-body">
                                        <div class="form-group row pr-2 pl-2">
                                            <div class="col-md-9">
                                                <p class="alert alert-info">
                                                    <strong>Note - </strong>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et molestiae non vero quasi dolorum, modi excepturi illum eligendi nisi veritatis rerum ipsam iste laboriosam. Magnam reiciendis autem porro debitis odio.
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class='card-profile-image'>
                                                    <?php
                                                        if($image != "") {
                                                            ?>
                                                            <img src="./assets/uploads/items/<?php echo $image; ?>" width="150" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <img src="./assets/uploads/items/default.png" width="150" />
                                                            <?php
                                                        }
                                                    ?>
                                                    <div class="middle" id='uploaded-file'>
                                                        <i class="fas fa-plus icon"></i>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="old-img" value="<?php echo $image; ?>" />
                                                <input type="file" name="image" accept="image/*" value="<?php echo $image; ?>" id='profile-img' hidden/>
                                            </div>
                                        </div>
                                        <div class="form-group row pr-2 pl-2">
                                            <div class="col-md-6">
                                                <label class="col-md-12 p-0">First Name</label>

                                                <input name="name" value='<?php echo $name; ?>' type="text" placeholder="Johnathan" 
                                                    class="form-control pl-0 form-control-line">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-md-12 p-0">Last Name</label>
                                                <input name="lname" value='<?php echo $lname; ?>' type="text" placeholder="Doe"
                                                    class="form-control pl-0 form-control-line">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">About</label>
                                            <div class="col-md-12">
                                                <textay name="about" value='<?php echo $about; ?>' rows="5" class="form-control pl-0 form-control-line"><?php echo $about; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row pr-2 pl-2">
                                            <div class="col-md-6">
                                                <label class="col-md-12 p-0">Email</label>
                                                <input name="email" value='<?php echo $email; ?>' type="email" placeholder="johnathan@admin.com" 
                                                    class="form-control form-control-line">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-md-12">Phone</label>
                                                <div class="col-md-12">
                                                    <input name="phone" value='<?php echo $phone; ?>' type="numer" maxlength="9"
                                                        class="form-control  mt-1 form-control-line">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Your Location</label>
                                            <div class="col-md-12">
                                                <input name="location" value='<?php echo $location;?>' type="text" placeholder="Kabul, Afghanistan"
                                                    class="form-control pl-0 form-control-line">
                                            </div>
                                        </div>

                                        <div class="form-group row pr-2 pl-2">
                                            <div class="col-md-4">
                                                <label for="example-email" class="col-md-12">Date</label>
                                                <div class="col-md-12">
                                                    <input name="date" value='<?php echo $date; ?>' type="date"
                                                        class="form-control pl-0 form-control-line">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="example-email" class="col-md-12">Category</label>
                                                <div class="col-md-12">
                                                <select name='cat' class="form-control form-control-line" onchange="addNew(value);">
                                                        <option selected value="" hidden></option>
                                                        <?php 
                                                            $sql = "SELECT * FROM cat";
                                                            $result = mysqli_query($conn, $sql);
                                                            if(mysqli_num_rows($result)) {
                                                                foreach($result as $items) {
                                                                    ?>
                                                                    <option value="<?php echo $items['_id']; ?>" ><?php echo $items['name']; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
                                                        <option value="add" class="btn text-info btn-sm">Add New</option>

                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="example-email" class="col-md-12">Select Type</label>
                                                <div class="col-md-12">
                                                <select name="type" class="form-control form-control-line">
                                                        <option selected value="" hidden></option>
                                                        <option value="found" >Founded</option>
                                                        <option value="lost">Losted</option>
                                                </select>
                                                </div>
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


<script>
    function addNew(value) {
        if(value == "add") {
            window.location = "items.php";
            document.location = "items.php";
        }
    }
</script>


<?php require_once "./components/footer.php"; ?>