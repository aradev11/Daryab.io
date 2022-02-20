<?php
    require_once "./includes/db.config.php";
    require_once "./includes/sesstion.config.php";
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, Monsterlite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Daryab</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="./assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/main-style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <script>
        var result = document.getElementById("alert");
        result.style.background = 'red';
        
        function Message(msg) {
            if(msg.title != "" && msg.type == "success") {
            } else if (msg.title != "" && msg.type == "warn") {
                console.log("helo wold");
            } else if (msg.title != "" && msg.type == "danger") {
                console.log("helo wold");
            } else if (msg.title != "" && msg.type == "info") {
                console.log("helo wold");
            }
        }


        function confirmMessage(msg, link) {
            if(msg != "", link != "") {
                var c = confirm(msg);
                if(c) {
                    window.location.href = link;
                }
            }
        }
        function back() {
            window.history.back();
        }
        </script>

        

</head>

<body >
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark bg-info">
                <div class="navbar-header" data-logobg="skin6">
                    
                    <h5 class="page-title mb-0 pl-4 d-md-none" onclick="back();" style="cursor: pointer;">
                        <i class=" fas fa-arrow-left mr-2"></i>
                    </h5>
                    
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand justify-content-center" href="index.php">
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon">
                            <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                        </b>  -->
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text display-7" style="font-family: Brush Script MT;">
                            <!-- dark Logo text -->
                            <span>daryab.io</span>

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item">
                            <h5 class="page-title mb-0 pl-4 text-white" onclick="back();" style="cursor: pointer;">
                                <i class=" fas fa-arrow-left mr-2"></i>
                            </h5>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item">
                            <form class="app-search pl-3">
                                <input type="text" class="form-control" placeholder="Search for..."> <a
                                    class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="title">
                                <?php echo $username . " " . $lastname; ?>
                                </span>
                                <img src="./assets/uploads/profile/<?php echo $image; ?>" alt="user"  width="50" height="30" class="profile-pic ml-2">

                            </a>
                            <div class="dropdown-menu">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="mr-3 far fa-user-circle" aria-hidden="true"></i>
                                        Profile
                                    </a>
                                    <h5 class="dropdown-header">Authentication</h5>
                                    <?php 
                                        if($user_roll == "") {
                                            ?>
                                            <a class="dropdown-item" href="#">
                                                <i class="mr-3 fas fa-sign-in-alt" aria-hidden="true"></i>
                                                Sign in
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="mr-3  fas fa-address-card" aria-hidden="true"></i>
                                                Sign up
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <button class="dropdown-item" onclick="confirmMessage('Are You Sure!', './includes/sign-out.php')">
                                                <i class="mr-3 fas fa-power-off" aria-hidden="true"></i>
                                                Sign out
                                            </button>
                                            <?php
                                        }

                                    ?>  
                                    <h5 class="dropdown-header">Settings</h5>
                                    <a class="dropdown-item" href="#">
                                    <i class="mr-3 fas fa-wrench" aria-hidden="true"></i>
                                    Setting</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        