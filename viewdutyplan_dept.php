<?php include('header.php'); ?>
<br>
<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="well">
                    <div class="row">
                    <form action="" method="POST" enctype="multipart/form-data">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <select name="department" class="form-control" aria-describedby="basic-addon2" required>
                                        <option>Select Department</option>
                                        <?php
                                        $Qdepartment = mysql_query("SELECT * FROM department ORDER BY department");
                                        while ($row_department = mysql_fetch_array($Qdepartment)) {
                                            ?>
                                            <option value="<?php echo $row_department['department']; ?>"><?php echo $row_department['department']; ?></option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="input-group-btn" id="basic-addon2">
                                        <button type="submit" class="btn btn-info btn-block btn-fill" name="search_duty_by_dept"><span class="fa fa-search"></span></button>
                                    </span>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php
                        if (isset($_POST['search_duty_by_dept'])) {
                            $department = $_POST['department'];
                            //$date = $_POST['date'];
                            //echo $department;
                            $c = 0;
                            $datear = array();
                            $Qdate = mysql_query("SELECT DISTINCT date FROM routine WHERE department = '{$department}'");
                            while ($row_date = mysql_fetch_array($Qdate)) {
                                $datear[] = $row_date['date'];
                                $c++;
                            }
                            ?>
                        <br>
                            <div class="row">
                                <div class="col-md-11">
                                    <a name="pdfseatplan" href="pdfdutyplan.php?iddept=<?php echo $department ?>" target="_blank" class='btn btn-info btn-fill pull-right'>Export as PDF File</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-5">
                                    <h3><strong><?php echo 'Department of ' . $department; ?></strong></h3>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-5">
                                    <h5><?php echo $date; ?></h5>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <table class="table table-responsive table-bordered">

                                <tr class="info">
                                    <th>#</th>
                                    <th colspan="1">Name</th>
                                    <?php
                                    for ($i = 0; $i < $c; $i++) {
                                        ?>
                                        <th colspan="4" style="text-align: center"><?php echo date("d-M-y", strtotime($datear[$i])); ?></th>
                                        <?php
                                    }
                                    ?>
                                    <th colspan="1">Enrollmet</th>
                                </tr>

                                <?php
                                $serial = 0;
                                $sqlList = mysql_query("SELECT * FROM teacher WHERE department = '{$department}' ORDER BY teacher_designation  DESC  ");
                                while ($row_list = mysql_fetch_object($sqlList)) {
                                    $serial++;
                                    $teacher_id = $row_list->teacher_id;
                                    $teacher_name = $row_list->teacher_name;
                                    $teacher_designation = $row_list->teacher_designation;
                                    $enrollment = $row_list->enrollment;
                                    ?>
                                    <tr>
                                        <td colspan="1"><?php echo $serial; ?></td>
                                        <td colspan="1"><?php echo $teacher_name; ?> </td>
                                        <!--<td><?php
                            if ($teacher_designation == 1) {
                                echo "Lecturer";
                            }
                            if ($teacher_designation == 2) {
                                echo "Sr. Lecturer";
                            }
                            if ($teacher_designation == 3) {
                                echo "Ast. Professor";
                            }
                                    ?></td>-->
                                        <?php
                                        for ($j = 0; $j < $c; $j++) {

                                            $count = 0;
                                            $slot = array();
                                            $sqlslot = mysql_query("SELECT * FROM room_allot  WHERE (teacher1 = '{$teacher_id}' OR teacher2 = '{$teacher_id}') AND  date = '{$datear[$j]}'");
                                            while ($row_slot = mysql_fetch_object($sqlslot)) {
                                                $slot[] = $row_slot->slot;
                                                $count++;
                                            }
                                            ?>
                                            <td colspan="1"><?php
                                            for ($i = 0; $i < $count; $i++) {
                                                if ($slot[$i] == "A") {
                                                    echo "A";
                                                }
                                            }
                                            ?></td>
                                            <td colspan="1"><?php
                                                for ($i = 0; $i < $count; $i++) {
                                                    if ($slot[$i] == "B") {
                                                        echo "B";
                                                    }
                                                }
                                                ?></td>
                                            <td colspan="1"><?php
                                                for ($i = 0; $i < $count; $i++) {
                                                    if ($slot[$i] == "C") {
                                                        echo "C";
                                                    }
                                                }
                                                ?></td>
                                            <td colspan="1"><?php
                                                for ($i = 0; $i < $count; $i++) {
                                                    if ($slot[$i] == "D") {
                                                        echo "D";
                                                    }
                                                }
                                                ?></td>
                                            <?php } ?>
                                        <td colspan="1"><?php echo $enrollment; ?></td>
                                    </tr>

                                        <?php
                                    }
                                    ?>

                            </table>
                        
                            <div class="row">
                                <div class="col-md-11">
                                    <a name="pdfseatplan" href="pdfdutyplan.php?iddept=<?php echo $department ?>" target="_blank" class='btn btn-info btn-fill pull-right'>Export as PDF File</a>
                                </div>
                            </div>
    <?php                   
}
?>
                    </form>
                    <br>
                </div>
            </div>
        </div>

    </div>
</div>



<?php include('footer.php'); ?>