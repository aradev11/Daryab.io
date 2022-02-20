<?php 
    require_once("./includes/sign-up.php");
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
    <title>Daryab | Sign UP to System</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="./assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="./css/main-style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class='form-container login-container'>



<div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card pr-4 pl-4 pt-1"> 
                    <div class="card-header d-flex justify-content-between mb-3">
                        <a href="index.php">
                        <i class="fas fa-arrow-left"></i>
                        </a>
                        <h3 class="card-title">
                            Sign Up | Create Your Own Account
                        </h3>
                        <div></div>

                    </div>  

                    <div class='row align-items-center  '>
                        <div class='col'>
                            <form id="submitForm" name='registration-from' method="post">
                                <div class="form-group required">
                                    <div class="row">
                                        <div class="col-md-6">
                                          <label for="name">First Name</label>
                                          <input type="text" class="form-control" id="name" required="" name="name">
                                        </div>
                                        <div class="col-md-6">
                                          <label for="lname">Last Name</label>
                                          <input type="text" class="form-control" id="lname" required="" name="lname">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group required">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="usr-username" required="" name="usr-username">
                                </div>  
                                <div class="form-group required">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" id="usr-email" required="" name="usr-email">
                                </div>                  
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="usr-password">Password</label>
                                    <input type="password" class="form-control" required="" id="usr-password" name="usr-password">
                                </div>
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="usr-repassword">Repassword</label>
                                    <input type="password" class="form-control" required="" id="usr-repassword" name="usr-repassword">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success text-white form-control" type="submit" name='signup'>Sign Up</button>
                                </div>
                                <p class="small-xl pt-3 text-center">
                                  <span class="text-muted">I have already Account?</span>
                                  <a href="./sign-in.php">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>