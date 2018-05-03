<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}
?>
<?php include('header.php'); ?>
<?php
if (isset($_POST['search_date'])) {
    $department = $_POST['department'];
}
?>


<style type="text/css">

    .table > thead > tr > th, 
    .table > tbody > tr > th, 
    .table > tfoot > tr > th, 
    .table > thead > tr > td, 
    .table > tbody > tr > td, 
    .table > tfoot > tr > td {
        padding: 0px 0px;
        padding-top: 8px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        vertical-align: middle;
    }
</style>
<br>
<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title text-center text-primary">Search Seat Plan</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Department</label>
                                    <div class="input-group">
                                        <select name="department" class="form-control" aria-describedby="basic-addon2" required>
                                            <option>Select Department </option>
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
                                            <button type="submit" class="btn btn-info btn-fill" name="search_date"><span class="fa fa-search"></span></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            </form>					
                            <div class="col-md-12"></div>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="bootstrap-iso">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Department</label>
                                                <input name="department" type="text" class="form-control"value="<?php echo $department; ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <select name="date" class="form-control" aria-describedby="basic-addon2" required>
                                                    <option> </option>
                                                    <?php
                                                    $Qdate = mysql_query("SELECT DISTINCT date FROM routine
													WHERE department = '{$department}' ORDER BY date");
                                                    while ($row_date = mysql_fetch_array($Qdate)) {
                                                        ?>
                                                        <option value="<?php echo $row_date['date']; ?>"><?php echo date("d-M-Y", strtotime($row_date['date'])); ?></option>

                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Slot</label>
                                                <select name="slot" class="form-control" required>
                                                    <option> </option>
                                                    <?php
                                                    $Qslot = mysql_query("SELECT * FROM slot");
                                                    while ($row_slot = mysql_fetch_array($Qslot)) {
                                                        ?>
                                                        <option value="<?php echo $row_slot['slot']; ?>"><?php echo $row_slot['slot']; ?></option>

                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">

                                            <div class="form-group">
                                                <button name="searchplan" type="submit" class="btn btn-info btn-fill pull-right">Search Seat Plan</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                        </div>
                    </div>
            </form>

        </div>
    </div>
</div>



</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="content">
                <?php
                if (isset($_POST['searchplan'])) {
                    $department = $_POST['department'];
                    $date = $_POST['date'];
                    $slot = $_POST['slot'];
                    $Qtime = mysql_query("SELECT * FROM slot WHERE slot = '{$slot}'");
                    while ($row_time = mysql_fetch_object($Qtime)) {
                        $f = strtotime($row_time->timefrom);
                        $t = strtotime($row_time->timeto);
                        $from = date("h:i", $f);
                        $to = date("h:i", $t);
                    }
                    $roomc = 0;
                    $room_avail = array();
                    $sqlroom = mysql_query("SELECT DISTINCT room_number FROM studentseat 
										WHERE department = '{$department}' AND date = '{$date}' AND slot = '{$slot}'
										ORDER BY department, date, slot, room_number ASC ");
                    while ($row_room = mysql_fetch_object($sqlroom)) {
                        $room_avail[] = $row_room->room_number;
                        //echo $room[1];
                        $roomc++;
                    }
                    //echo $f." ".$t." ";
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <a name="pdfseatplan" href="../pdfseatplan.php?iddept=<?php echo $department ?>&&iddt=<?php echo $date ?>&&ids=<?php echo $slot ?>" target="_blank" class='btn btn-info btn-fill pull-right'>Export as PDF File</a>
                        </div>
                    </div>
                    <div class="row" style="text-align: center">
                        <div class="col-lg-12"><h4>Department of <?php echo $department; ?></h4></div>
                        <div class="col-lg-12"><h5>Date: <?php echo date("d-M-Y", strtotime($date)); ?></h5></div>
                        <div class="col-lg-12"><h5><?php echo "Slot: " . $slot . " (Time: " . $from . "-" . $to . ")"; ?></h5></div>
                    </div>
                    <?php
                    for ($i = 0; $i < $roomc; $i++) {
                        $room = $room_avail[$i];
                        $sqlinv = mysql_query("SELECT * FROM room_allot 
											WHERE room_number = '{$room}' AND department = '{$department}'
											AND date = '{$date}' AND slot = '{$slot}'");
                        while ($row_inv = mysql_fetch_object($sqlinv)) {
                            $teacher1id = $row_inv->teacher1;
                            $teacher2id = $row_inv->teacher2;
                        }
                        $sqlinv1 = mysql_query("SELECT * FROM teacher 
											WHERE department = '{$department}' AND teacher_id = '{$teacher1id}'");
                        while ($row_inv1 = mysql_fetch_object($sqlinv1)) {
                            $teacher1 = $row_inv1->teacher_initial;
                        }
                        $sqlinv2 = mysql_query("SELECT * FROM teacher 
											WHERE department = '{$department}' AND teacher_id = '{$teacher2id}'");
                        while ($row_inv2 = mysql_fetch_object($sqlinv2)) {
                            $teacher2 = $row_inv2->teacher_initial;
                        }
                        $clc = 0;
                        $rcol = array();
                        $rcap = array();
                        $rcrs = array();
                        $rbatch = array();
                        $rsection = array();
                        $rcrst = array();
                        $sqlcol = mysql_query("SELECT * FROM studentseat 
											WHERE department = '{$department}' AND room_number= '{$room}' 
											AND date = '{$date}' AND slot = '{$slot}'
											ORDER BY department, room_number, col ASC");
                        while ($row_col = mysql_fetch_object($sqlcol)) {
                            $rcol[] = $row_col->col;
                            $rcap[] = $row_col->capacity;
                            $rcrs[] = $row_col->course_id;
                            $rbatch[] = $row_col->batch;
                            $rsection[] = $row_col->section;
                            $rcrst[] = $row_col->courseteacher;
                            $clc++;
                        }
                        ?>

						<br />
                        <div class="row" style="text-align: center">
                            <div class="col-md-12"><strong>Room</strong><?php echo " " . $room . "(" . $teacher1 . ", " . $teacher2 . ")"; ?></div>
                        </div>
                        <div class="row" style="text-align: center">
                            <table class="table table-responsive table-bordered">
                                <tr>
                                    <?php
                                    for ($j = 0; $j < $clc; $j++) {
                                        ?>				<th class="info" style="text-align: center"><?php echo "Col " . $rcol[$j]; ?></th>

                                    <?php } ?>
                                </tr>
                                <tr>
                                    <?php
                                    for ($j = 0; $j < $clc; $j++) {
                                        $sqlcrs = mysql_query("SELECT * FROM course 
											WHERE department = '{$department}' AND course_id = '{$rcrs[$j]}' AND batch = '{$rbatch[$j]}'");
                                        while ($row_crs = mysql_fetch_object($sqlcrs)) {
                                            $course = $row_crs->course_name;
                                        }
                                        ?>				
										<td  style="text-align: center">
                                        <?php echo $rcrs[$j] . "</br>" . $course . "</br>" . $rsection[$j]. "</br>" .$rcrst[$j]; ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <?php
                                    for ($j = 0; $j < $clc; $j++) {
                                        ?>				<th class="info" style="text-align: center"><?php echo $rcap[$j]; ?></th>

                                    <?php } ?>
                                </tr>
                            </table>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                            <a name="pdfseatplan" href="../pdfseatplan.php?iddept=<?php echo $department ?>&&iddt=<?php echo $date ?>&&ids=<?php echo $slot ?>" target="_blank" class='btn btn-info btn-fill pull-right'>Export as PDF File</a>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<script>
    function confirm_delete() {
        return confirm("Are you sure to delete this data.");
    }
</script>

<?php include('footer.php'); ?>