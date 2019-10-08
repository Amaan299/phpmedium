<?php
include "db.php";
include "header.php";
$date = $_POST['my_date'];

?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Employee</a>
            <a class="btn btn-info pull-right" href="view_all.php">Back</a>
        </h2>
        <h2>
            <div class="well text-center">
                Date:<?php echo  date(" Y-m-d")?>
            </div>
        </h2>

        <div class="panel panel-body">
            <form action="index.php" method="POST">
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Salary</th>
                        <th>Profile</th>
                        <th>Boss</th>
                        <th>Designation</th>
                        <th>Attendance</th>
                    </tr>
                    <?php

                    $show = "SELECT DISTINCT id, emp_name,department,salary,profile,boss,designation,attendance
                                FROM attend_records WHERE my_date='$date'";
                    $r = $conn->prepare($show);

                    $r->execute();
                    while ($row = $r->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td> <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['emp_name']; ?>
                            <td> <?php echo $row['department']; ?>
                            </td>
                            <td> <?php echo $row['salary']; ?>
                            </td>
                            <td> <?php echo $row['profile']; ?>
                            </td>
                            <td> <?php echo $row['boss']; ?>
                            </td>
                            <td> <?php echo $row['designation']; ?>
                            </td>
                            <td>
                                <?php echo $row['attendance']; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

            </form>

        </div>

    </div>
</div>
