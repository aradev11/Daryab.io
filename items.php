<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";

?>

<script>
    function confirmDelete(id) {
        var result = confirm("Are You sure?");
        if(result) {
            window.location = 'items.php?id=' + id;
            <?php 
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $result = $conn->query("DELETE FROM item WHERE _id='$id'");
                if(!$result) {
                    die(mysqli_error($result));
                }    
            ?>
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
            <div class="col-md-6 col-8 align-self-center">
                <a href="items-cu.php?page_type=add"
                        class="btn btn-success text-white btn-sm">
                        <i class="mr-3 fas fa-plus" aria-hidden="true"></i>
                        <span class="d-md-none">
                        Add New
                        </span>
                </a>
            </div>
            <div class="col-md-6 col-4 ">
                <div class="nav align-items-center justify-content-end">
                    <a data-toggle="tab" href="#grid-view"
                        class=" d-none d-md-inline-block text-dark">
                        <i class="mr-3 fas fa-table" aria-hidden="true"></i>
                    </a>
                    <a  data-toggle="tab" href="#list-view"
                        class=" d-none d-md-inline-block text-dark">
                        <i class="mr-3 fas fa-align-justify" aria-hidden="true"></i>
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
                        <div class="row align-items-center">
                            <h4 class="card-title col-md-10 mb-md-0 mb-3">All Items Found or Lost</h4>
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
                                        <th class="border-top-0"">Assigned</th>
                                        <th class="border-top-0">Type</th>
                                        <th class="border-top-0">Category</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $num_per_page = 06;
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start_from = ($page - 1) * $num_per_page;
                                    $sql = "SELECT item.*, cat.name as catName FROM item INNER JOIN cat ON item.catID = cat._id Order by item.date DESC LIMIT $start_from, $num_per_page";
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        while($rows = mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr class="small">
                                                
                                                <td>
                                                    <h6><?php echo $rows['name']. " " . $rows['lastName'];?></h6>
                                                </td>
                                                <?php if($rows['type'] == "lost"){
                                                    ?><td><kbd class="bg-warning">Lost</kbd></td><?php
                                                    } else {
                                                    ?><td><kbd class="bg-success">Found</kbd></td><?php
                                                    }
                                                ?>
                                                <td><?php echo $rows['catName']; ?></td>
                                                <td><a href="tel:+93<?php echo $rows['phone']; ?>">+93 (0) <?php echo $rows['phone']; ?></a></td>
                                                <td><?php echo $rows['date']; ?></td>
                                                <td>
                                                    <a href="items-view.php?id=<?php echo $rows['_id']; ?>" data-toggle="tooltip" title="Expand">
                                                        <i class="fas fa-expand text-info btn-sm"></i>
                                                    </a>
                                                    <a href="items-cu.php?page_type=edit&id=<?php echo $rows['_id'];?>" data-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit text-success btn-sm"></i>
                                                    </a>
                                                    <a href="#" onclick="confirmDelete(<?php echo $rows['_id']; ?>)" data-toggle="tooltip" title="Delete">
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
                    <div class="card-footer">
                        <ul class="pagination pagination-sm">
                            <?php
                                if($page > 1) {
                                ?>
                                <li class="page-item"><a class="page-link" href="items.php?page=<?php echo $page - 1; ?>">Previous</a></li>
                                <?php
                                }

                                $pr_result = $conn->query("SELECT * FROM item");
                                $total_record = mysqli_num_rows($pr_result);
                                $total_page = ceil($total_record / $num_per_page);
                                
                                $i = 1;
                                for($i = 1; $i <= $total_page; $i++) {
                                    $active_page = "";
                                    if($i == $page) {
                                        $active_page = "active";
                                    }
                                    ?>
                                    <li class="page-item <?php echo $active_page; ?>">
                                        <a class="page-link" href="items.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php
                                }

                                if($page < $i) {
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="items.php?page=<?php echo $page + 1; ?>&view=list-view">Next</a>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Table -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Recent blogss -->
        <!-- ============================================================== -->
        <div class="grid-item-container tab-pane fade" id='grid-view'>
            <div class="row justify-content-center">
                <?php 
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while($rows = mysqli_fetch_assoc($result)){
                        ?>
                        <!-- Column -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card" style="cursor: pointer;" onclick="window.location.href='items-view.php?id=<?php echo $rows['_id']; ?>'">
                                <img class="card-img-top img-responsive" src="./assets/uploads/items/<?php echo $rows['img']; ?>" alt="Card"  height="300">
                                <div class="card-body">
                                    <ul class="list-inline d-flex">
                                        <li class="p-l-0">
                                            <i class="fas fa-calendar-check text-success"></i>
                                            <?php echo $rows['catName']; ?>
                                        </li>
                                        <li class="pl-5">
                                            <i class="fas fa-calendar-check text-warning"></i>
                                            <?php echo $rows['date']; ?>
                                        </li>
                                        <li class="ml-auto">
                                            <a href="javascript:void(0)" class="link">
                                            <i class=" fas fa-eye"></i>
                                            3</a>
                                        </li>
                                    </ul>
                                    <ul class="list-inline">
                                        <li>
                                            <i class="fas fa-user-circle text-info"></i>
                                            <?php echo $rows['name'] . " ". $rows['lastName']; ?>
                                        </li>
                                        <li>
                                            <i class="fas fa-phone text-info"></i>
                                            0<?php echo $rows['phone']; ?>
                                        </li>
                                        <li>
                                            <i class="fas fa-envelope text-info"></i>
                                            <?php echo $rows['email']; ?>
                                        </li>
                                        <li>
                                            <i class="fas fa-map-marker-alt text-info"></i>
                                            <?php echo $rows['location']; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <?php
                    }
                }
                ?>
            </div>
        </div>



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