<?php
include "db.php";
include "header.php";

?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Employee</a>
            <a class="btn btn-info pull-right" href="index.php">Back</a>
        </h2>



        <div class="panel panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Serial Number</th>
                        <th>Dates</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $show = "SELECT DISTINCT my_date FROM attend_records";
                    $r = $conn->prepare($show);
                    $r->execute();
                    $count=0;
                    while ($row = $r->fetch(PDO::FETCH_ASSOC)){
                        $count++;
                        ?>
                        <tr>
                            <td> <?php echo $count; ?></td>
                            <td> <?php echo $row['my_date']; ?></td>
                            <td>
                                <form action="show_attend.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['my_date'] ?>" name="my_date">

                                    <input type="submit" value="Show Attendance" class="btn btn-primary">

                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
        </div>

    </div>
</div>
