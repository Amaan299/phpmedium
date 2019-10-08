<?php
include 'db.php';
if(isset($_POST['save'])) {

    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];


    if($timein!=' '){
        $sql = "INSERT INTO `Attendance`.`my_time` (`timein`, `timeout`) VALUES ( '$timein', ' ')";
        $query = $conn->prepare($sql);

        $query->execute();
    }
    else{
        $sql = "INSERT INTO `Attendance`.`my_time` (`timein`, `timeout`) VALUES ( ' ', '$timeout')";
        $query = $conn->prepare($sql);

        $query->execute();
    }
    header("Location: developer.php");
}
?>