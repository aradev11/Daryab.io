<?php 
    session_start();
    require_once "db.config.php";

    if(isset($_POST["username"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];
       
        $pwd = password_hash($password, PASSWORD_DEFAULT);

        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM user WHERE usr='$username' AND pwd='$password'";

        $result = mysqli_query($conn, $sql);

        if(!$result) {
            mysqli_close($conn);
            header("location: ./sign-in.php");
        } else {
            while($rows = mysqli_fetch_assoc($result)) {
                if($rows < 0) {
                    mysqli_close($conn);
                    header("location: ./sign-in.php");
                }
                else {
                    $_SESSION['usr'] = $rows['usr'];
                    $_SESSION['_id'] = $rows['_id'];
                    $_SESSION['roll'] = $rows['roll'];
                    $_SESSION['name'] = $rows['name'];
                    $_SESSION['lastName'] = $rows['lastName'];
                    $_SESSION['prfImg'] = $rows['prfImg'];
                    header("location: ./dashboard.php");
                }
            }
        }
    }
    
mysqli_close($conn);

?>