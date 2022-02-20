<?php
require_once("db.config.php");

if(isset($_POST["usr-username"]) && !empty($_POST["usr-username"])) {


    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST["usr-email"];
    $username = $_POST["usr-username"];  
    $password = $_POST["usr-password"];  
    $rpassword = $_POST["usr-repassword"]; 
  
    
    $sql = "SELECT usr FROM user WHERE usr='$username'";
    $result = mysqli_query($conn, $sql);   
  

    if(mysqli_num_rows($result) > 0) {
        echo "Username Not Avilabile";
    } else {
        if($password == $rpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT); 
            $date = date("Y/m/d");
            $sql = "INSERT INTO `user`(`name`, `lastName`, `roll`, `usr`, `pwd`, `email`, `date`) 
                    VALUES ('$name','$lname','user','$username','$password','$email','$date')";

            $result = mysqli_query($conn, $sql); 
            if ($result) {
                header("location: ./sign-in.php");
            } else {
                echo "Insert Failer";
            }
        }
        else {
            echo "Password Not Match";
        }
    }
    
}

?>