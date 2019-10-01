<?php
include "header.php";
include "db.php";

try {
    if(isset($_POST["submit"])){
        $sql = "INSERT INTO employee (emp_name, department, salary, profile, boss, designation)
        VALUES ('".$_POST["name"]."','".$_POST["department"]."','".$_POST["salary"]."','".$_POST["profile"]."','".$_POST["boss"]."','".$_POST["designation"]."')";
        $result = $conn->exec($sql);


        header("Location: admin.php");
    }
}
catch (PDOException $e){
    echo $e->getMessage();
}

?>

<div class="panel panel-default">


    <div class="panel panel-heading">
        <h2>
            <a class="btn btn-success" href="add_hr.php">Add HR</a>
            <a class="btn btn-info pull-right" href="">Back</a>
        </h2>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">
                    HR Name
                </label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="department">
                    Department
                </label>
                <input type="text" name="department" id="department" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="salary">
                    Salary
                </label>
                <input type="number" name="salary" id="salary" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="profile">
                    Profile Picture
                </label>
                <input type="file" name="profile" id="profile" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="boss">
                    Boss
                </label>
                <div class="mt-2">
                    <select autofocus class="form-control" type="text" name="boss" required>
                        <option  value="none" >--- Select One ---</option>
                        <option  value="HR" >HR</option>
                        <option  value="Manager">Manager</option>
                        <option  value="Developer">Developer</option>
                        <option value="CEO">CEO</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="designation">
                    Designation
                </label>
                <div class="mt-2">
                    <select autofocus class="form-control" type="text" name="designation" required>
                        <option  value="none" >--- Select One ---</option>
                        <option  value="HR" >HR</option>
                        <option  value="Manager">Manager</option>
                        <option  value="Developer">Developer</option>
                        <option value="CEO">CEO</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
            </div>
        </form>

    </div>

</div>
