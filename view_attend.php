<?php
include "db.php";
include "header.php";

?>
<div class="panel panel-default">
    <div class="panel panel-heading">
        <h2>
            <div class="well text-center">
                <a class="btn btn-info pull-right" href="developer.php">Back</a>
                Date:<?php echo  date(" Y-m-d")?>
            </div>
        </h2>

        <div class="panel panel-body">
            <form action="index.php" method="POST">
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Time In</th>
                        <th>Time Out</th>

                    </tr>
                    <?php

                    $show = "SELECT * FROM my_time";
                    $r = $conn->prepare($show);

                    $r->execute();
                    while ($row = $r->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td> <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['timein']; ?></td>
                            <td> <?php echo $row['timeout']; ?></td>

                        </tr>
                        <?php
                    }
                    ?>
                </table>

            </form>

        </div>

    </div>
</div>
