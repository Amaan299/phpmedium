<?php
include "header.php";
?>
<html>
<head>

</head>
<body>
<h2>Click to mark Attendance of Date:<?php echo date("d-m-Y")?></h2>
<div class="container">
        <h1>Login</h1>
        <button type="submit" name="timein" class="btn btn-success form-control" onclick="timein()">Mark Time in</button><br/>
        <div id="timein"></div>
        <button type="submit" name="timeout" class="btn btn-danger form-control" onclick="timeout()">Mark Time out</button><br/>
        <div id="timeout"></div>
        <button type="submit" name="save" class="btn btn-info form-control" onclick="closeForm()">Save</button>
</div>
</div>
<script>
    function timein() {
        document.getElementById("timein").innerText = "<?php echo date("h:i:s");?>"
    }
    function timeout() {
        document.getElementById("timeout").innerText = "<?php echo date("h:i:s");?>"
    }
    function closeForm() {
       window.location.replace('insertTime.php');
    }
</script>
</body>
</html>
