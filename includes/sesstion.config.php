<?php
    session_start();
    require_once "db.config.php";

    $user_check = $_SESSION['usr'];
    $user_id = $_SESSION['_id'];
    $user_roll = $_SESSION['roll'];
    
    $username = $_SESSION['name'];
    $lastname = $_SESSION['lastName'];
    $image = $_SESSION['prfImg'];

    $ses_sql = "SELECT usr FROM user WHERE usr = '$user_check'";
    $result = mysqli_query($conn, $ses_sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $login_session = $row['usr'];
        
    } else {
        echo "errr";
    }

    if(!isset($login_session)) {
        mysqli_close($conn);
        header("Location: ./sign-up.php");
    }



?>