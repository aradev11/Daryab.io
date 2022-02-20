<?php 
require_once "./components/header.php";
require_once "./components/sidebar.php";



?>

<script>
    function confirmDelete(id) {
        var result = confirm("Are You sure?");
        if(result) {
            window.location = 'cat.php?id=' + id;
            <?php 
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $result = $conn->query("DELETE FROM cat WHERE _id='$id'");
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
            <div class="col-md-6 col-sm-12 col-8 align-self-center">
            <a href="cat-cu.php?page_type=add"
                    class="btn btn-success text-white btn-sm">
                    <i class="mr-3 fas fa-plus" aria-hidden="true"></i>
                    <span class="d-md-none">
                    Add New

                    </span>
                    </a>
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
                            <h4 class="card-title col-md-10 mb-md-0 mb-3">Categories</h4>
                            
                        </div>
                        <div class="table-responsive m-t-40">
                            <table class="table stylish-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Assigned</th>
                                        <th class="border-top-0">Category Name</th>
                                        <th class="border-top-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $sql = "SELECT cat.*, user.name as usr_name FROM cat, user WHERE cat.add_by = user._id";
                                    $result = $conn->query($sql);
                                    if(mysqli_num_rows($result) > 0) {
                                        foreach($result as $category) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <h6><?php echo $category['usr_name']; ?></h6>
                                                </td>
                                                <td>
                                                    <?php echo $category['name']; ?>
                                                </td>
                                                <td>
                                                    <a href="cat-cu.php?page_type=edit&id=<?php echo $category['_id'];?>" data-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit text-success btn-sm"></i>
                                                    </a>
                                                    <a href="#" onclick="confirmDelete(<?php echo $category['_id']; ?>)" data-toggle="tooltip" title="Delete">
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

<?php require_once "./components/footer.php"; ?>