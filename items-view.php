<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";
$more = isset($_GET['d']) ? $_GET['d'] : "less";
if($id != "" && isset($id)) {
    $sql = "SELECT item.*, cat.name as catName FROM item INNER JOIN cat ON item.catID = cat._id AND item._id = '$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        foreach($result as $item) {
            $name = $item['name'];
            $lname = $item['lastName'];
            $fullName = $item['name'] . " ". $item['lastName'];
            $date = $item['date'];
            $phone = $item['phone'];
            $email = $item['email'];
            $location = $item['location'];
            $type = $item['type'];
            $about = $item['about'];
            $view = $item['view'];
            $cat = $item['catName'];
            $img = $item['img'];
        }
    }
}

?>

<script>
    function confirmDelete(id) {
        var result = confirm("Are You sure?");
        if(result) {
            window.location = "items-view.php?id=<?php echo $id; ?>&dID=" + id;
            <?php 
                $dID = isset($_GET['dID']) ? $_GET['dID'] : "";
                $result = $conn->query("DELETE FROM item WHERE _id='$dID'");
                if(!$result) {
                    die(mysqli_error($result));
                }
            ?>
            window.location.href = "items.php";
        } 
    }
</script>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">


    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-8 col-8 align-self-center">
                <a href="items-cu.php?page_type=add" class="btn btn-success text-white btn-sm">
                    <i class="mr-3 fas fa-plus" aria-hidden="true"></i>
                    Add New
                </a>
                <a href="items-cu.php?page_type=edit&id=<?php echo $id;?>" class="btn btn-success text-white btn-sm">
                    <i class="mr-3  fas fa-edit" aria-hidden="true"></i>
                    Edit
                </a>
                <a href="items-cu.php?page_type=add" class="btn btn-info text-white btn-sm">
                    <i class="mr-3   fas fa-print" aria-hidden="true"></i>
                    Print
                </a>
            </div>
            <div class="col-md-4 col-4 ">
                <div class="nav align-items-center justify-content-end">
                    <a onclick="confirmDelete(<?php echo $id;?>);" class="btn btn-danger text-white btn-sm">
                        <i class="mr-3 fas fa-trash-alt" aria-hidden="true"></i>
                        Delete
                    </a>
                </div>
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
        <div class="row tab-pane active" id='list-view'>       
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between mr-1">
                            <h4 class="card-title col-md-10 mb-md-0 mb-3">
                            Published By:
                            <i><?php echo $fullName; ?></i>
                            </h4>
                            <div class="date text-info">
                                <?php echo $date;?>
                                <i class="fas fa-calendar-alt ml-2"></i>
                            </div>
                        </div>
                        <div class="m-t-40 row">

                            <div class="col-md-3 mb-4 text-center">
                                <div class="img">
                                    <img src="./assets/uploads/items/<?php echo $img; ?>" width="200" />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h3 class="card-title">Item information</h3>
                                <ul class="list">
                                    <li>
                                    Firstname: <span><?php echo $name; ?></span>
                                    </li>
                                    <li>
                                    Lastname: <span><?php echo $lname; ?></span>
                                    </li>
                                    <li>
                                    Type: <?php
                                        if($type == "lost") {
                                            ?><span class="text-dangar"><?php echo $type; ?></span><?php
                                        } else {
                                            ?><span class="text-success"><?php echo $type; ?></span><?php
                                        }
                                    ?>
                                    </li>
                                    <li>
                                    Category: <span><?php echo $cat; ?></span>
                                    </li>
                                    <li>
                                    Viewed by: <span><?php echo $view; ?></span>, users
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <h3 class="card-title">Contact information</h3>
                                <ul class="list">
                                    <li>
                                        <a href="tel:+93<?php echo $phone; ?>">
                                            <i class="fas fa-phone mr-2 text-info"></i>
                                            <span>+93 (0) <?php echo $phone; ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:<?php echo $email; ?>">
                                            <i class="fas fa-envelope mr-2 text-info"></i>
                                            <span><?php echo $email; ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <i class="fas fa-map-marker-alt text-info mr-2"></i>
                                            <span><?php echo $location; ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="col-md-12">
                                <h3 class="card-title">Description</h3>
                                    <?php if($more == "less") {
                                        echo substr($about, 0 , 450);
                                        if(strlen($about) > 450) {
                                            ?><a href="items-view.php?id=<?php echo $id; ?>&d=more" class=""> readmore</a><?php
                                        }
                                    } else {
                                        echo $about;
                                        ?><a href="items-view.php?id=<?php echo $id; ?>" class=""> readless</a><?php
                                    }
                                    ?>
                            </div>
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
