<?php

require_once 'db.php';
# Get username and password from the login form
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $designation = $_POST['designation'];
    $sql = "SELECT * FROM Attendance.my_user WHERE email = '$email' and password = '$password' and designation='$designation'";

    $query = $conn->prepare( $sql );
    $query->execute();

    if($query->rowCount() > 0 && $designation=='ceo'){
        header("Location: admin.php");
    }
    else if($query->rowCount() > 0 && $designation=='hr'){
        header("Location: index.php");
    }
    else if($query->rowCount() > 0 && $designation=='manager'){
        header("Location: manager.php");
    }
    else if($query->rowCount() > 0 && $designation=='developer'){
        header("Location: developer.php");
    }


}