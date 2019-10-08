<?php
include "header.php";
include "db.php";
?>
<html>
<head>

</head>
<body>
<button class="btn btn-info" onclick="move()">View Attendance</button>
<h2>Mark Attendance of Date:<?php echo date("d-m-Y")?></h2>


        <h1>Login</h1>
        <button type="submit" name="timein" class="btn btn-success form-control" onclick="timein()">Mark Time in</button><br/>
        <div ><h2 id="timein"></h2></div>
        <button type="submit" name="timeout" class="btn btn-danger form-control" onclick="timeout()">Mark Time out</button><br/>
        <div ><h2 id="timeout"></h2></div>
    <form action="insertTime.php" method="POST">
        <input type="hidden" value="<?php echo date("H:i:s") ?>" name="timeout">
        <input type="hidden" value="<?php echo date("H:i:s") ?>" name="timein">
        <button type="submit" name="save" class="btn btn-info form-control">Save</button>
    </form>
<script>
    function timein() {
        document.getElementById("timein").innerText = "<?php echo date("H:i:s");?>"
    }
    function timeout() {
        document.getElementById("timeout").innerText = "<?php echo date("H:i:s");?>"
    }
    function move() {
        window.location.replace("view_attend.php");
    }
</script>
</body>
</html>
