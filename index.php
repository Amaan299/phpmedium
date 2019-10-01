<?php
include "db.php";
include "header.php";
$flag = 0;
$update = 0;
if(isset($_POST["submit"])) {
    $date = date("Y-m-d");
    $records = $conn->prepare("SELECT * FROM attend_records WHERE my_date = '$date'");

    $record_result = $records->execute();

    $num = $records->rowCount();

    if ($num!=0) {

        foreach ($_POST["attend_status"] as $id => $attend_status) {
            $name = $_POST["name"][$id];
            $department = $_POST["department"][$id];
            $salary = $_POST["salary"][$id];
            $profile = $_POST["profile"][$id];
            $boss = $_POST["boss"][$id];
            $designation = $_POST["designation"][$id];
            $date = date("Y-m-d");

            $sql = "UPDATE attend_records SET emp_name = '" . $_POST["name"][$id] . "', department = '" . $_POST["department"][$id] . "', salary = '" . $_POST["salary"][$id] . "',
            profile = '" . $_POST["profile"][$id] . "', boss = '" . $_POST["boss"][$id] . "' , designation = '" . $_POST["designation"][$id] . "', attendance = '" . $_POST["attend_status"][$id] . "' , my_date = '$date'
            WHERE my_date = '$date'";
            $result = $conn->exec($sql);
            if ($result) {
                $update = 1;
            }
        }
    } else {
        foreach ($_POST["attend_status"] as $id => $attend_status) {
            $sql = "INSERT INTO attend_records (emp_name, department, salary, profile, boss, designation,attendance,my_date)
            VALUES ('" . $_POST["name"][$id] . "','" . $_POST["department"][$id] . "','" . $_POST["salary"][$id] . "','" . $_POST["profile"][$id] . "','" . $_POST["boss"][$id] . "','" . $_POST["designation"][$id] . "','" . $_POST["attend_status"][$id] . "','$date')";
            $result = $conn->exec($sql);

            if ($result) {
                $flag = 1;
            }
        }
    }
}

?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">Add Employee</a>
            <a class="btn btn-info pull-right" href="view_all.php">View All</a>
        </h2>
        <?php if($flag) { ?>
            <div class="alert alert-success">
                <strong>DB Data Inserted Successfully!</strong>
            </div>
        <?php }?>
        <?php if($update) { ?>
            <div class="alert alert-success">
                <strong>Data Updated Successfully!</strong>
            </div>
        <?php }?>
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
                    $show = "SELECT * FROM employee";
                    $r = $conn->prepare($show);
                    $r->execute();
                    $count = 0;
                    while ($row = $r->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td> <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['emp_name']; ?>
                                <input type="hidden" value="<?php echo $row['emp_name'];?>" name="name[]">
                            </td>
                            <td> <?php echo $row['department']; ?>
                                <input type="hidden" value="<?php echo $row['department'];?>" name="department[]">
                            </td>
                            <td> <?php echo $row['salary']; ?>
                                <input type="hidden" value="<?php echo $row['salary'];?>" name="salary[]">
                            </td>
                            <td> <?php echo $row['profile']; ?>
                                <input type="hidden" value="<?php echo $row['profile'];?>" name="profile[]">
                            </td>
                            <td> <?php echo $row['boss']; ?>
                                <input type="hidden" value="<?php echo $row['boss'];?>" name="boss[]">
                            </td>
                            <td> <?php echo $row['designation']; ?>
                                <input type="hidden" value="<?php echo $row['designation'];?>" name="designation[]">
                            </td>
                            <td>
                                <input type="radio" name="attend_status[<?php echo $count; ?>]" value="present"
                                       <?php if(isset($_POST['attend_status'][$count]) && $_POST['attend_status'][$count]=="present") {
                                           echo "checked=checked";
                                       }?> required>Present
                                <input type="radio" name="attend_status[<?php echo $count; ?>]" value="absent"
                                    <?php if(isset($_POST['attend_status'][$count]) && $_POST['attend_status'][$count]=="absent") {
                                        echo "checked=checked";
                                    }?> required>Absent
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                    ?>
                </table>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </form>

        </div>

    </div>
</div>
