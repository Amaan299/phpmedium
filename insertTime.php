<?php
include 'db.php';
if(isset($_POST['save'])) {
    $timein = $_GET['timein'];
    $timeout = $_GET['timeout'];

    $sql = "INSERT INTO my_time VALUES ('$timein','$timeout')";

    $query = $conn->prepare($sql);
    $query->execute();
}
?>