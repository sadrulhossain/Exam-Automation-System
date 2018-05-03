<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}
?>
<?php include('header.php'); ?>
<?php include('../database.php'); ?>
<?php
if (isset($_POST['search_room_teacher'])) {
    //department
    $department = $_POST['department'];
    $sqlCountTeacher = mysql_query("SELECT COUNT(teacher_id)as totalteacher FROM teacher
		WHERE department = '{$department}'");
    while ($row = mysql_fetch_object($sqlCountTeacher)) {
        //number of teachers in the department
        $no_of_teacher = $row->totalteacher;
    }
}

$success = "";
if (isset($_POST['create_dutyplan'])) {

    $department = $_POST['department'];
    $no_of_teacher = $_POST['no_of_teacher'];
    $date = $_POST['exam_date'];
    $slot = $_POST['exam_slot'];
	$sqlsrchxstnc = mysql_query("SELECT * FROM room_allot 
		WHERE  department = '{$department}' AND date = '{$date}' AND slot = '{$slot}' 
		ORDER BY department, date, slot, room_number ASC");
	if(mysql_num_rows($sqlsrchxstnc) > 0){
		$err .= "The Plan for $date, Slot $slot of $department Department Already Exists";
	}
	else{
		$room_avail = array();
		$roomc = 0;
		//$success .= $department.' '.$no_of_room.' '.$no_of_teacher.' '.$date.' '.$slot;
		//delete all data in teacher_allot table
		//$sqlRefresh1 = mysql_query("DELETE FROM room_allot WHERE department = '{$department}'");
		$sqlRefresh2 = mysql_query("DELETE FROM teacherset");
		$sqlselectroom = mysql_query("SELECT DISTINCT room_number FROM studentseat 
			WHERE  department = '{$department}' AND date = '{$date}' AND slot = '{$slot}' 
			ORDER BY department, date, slot, room_number ASC");
		while ($row = mysql_fetch_object($sqlselectroom)) {
			$room_avail[] = $row->room_number;
			$roomc++;
		}
		for ($q = 0; $q < $roomc; $q++) {
			$room = $room_avail[$q];
			//echo $room;
			$sqlInsertSlot = mysql_query("INSERT INTO room_allot (room_number, department, date, slot)
								VALUES('{$room}', '{$department}',
										'{$date}', '{$slot}')");
		}
		$teacher_req = $roomc * 2;
		$t = array();
		//$t2 = array();
		$todd = array();
		$teven = array();
		$sqlSortTeacher = mysql_query("SELECT * FROM teacher 
			WHERE  department = '{$department}' AND available > 0 
			ORDER BY teacher_designation ASC");
		while ($row = mysql_fetch_object($sqlSortTeacher)) {
			$t[] = $row->teacher_id;
		}
		//echo $t[2].'<br />';
		$r = array_rand($t, $teacher_req);
		//echo $t[$r[2]].'<br />';

		for ($i = 0; $i < $teacher_req; $i++) {
			$mod = $i % 2;
			if ($mod == 0 || $i == 0) {
				$teven[] = $t[$r[$i]];
			} else {
				$todd[] = $t[$r[$i]];
			}
		}
		//echo $teven[1].'<br />'.$todd[1].'<br />'.$teven[0].'<br />'.$todd[0];

		for ($j = 0; $j < $roomc; $j++) {
			$t1 = $todd[$j];
			$t2 = $teven[$j];
			$ids = $j + 1;
			$sqlteacherset = mysql_query("INSERT INTO teacherset (id, teacher1, teacher2) 
									VALUES('{$ids}', '{$t1}', '{$t2}')");
		}
		$sqlcheckAgain = mysql_query("SELECT * FROM room_allot  WHERE date = '{$date}' AND slot = '{$slot}'");
		$idt = 1;
		while ($row = mysql_fetch_object($sqlcheckAgain)) {
			$idn = $row->id;
			$sqlselectteacher = mysql_query("SELECT * FROM teacherset  WHERE id = '{$idt}'");
			while ($row = mysql_fetch_object($sqlselectteacher)) {
				$teacher1 = $row->teacher1;
				$teacher2 = $row->teacher2;
			}
			$idt++;
			$sqlSetTeacher = mysql_query("UPDATE room_allot 
										SET teacher1 = '{$teacher1}', teacher2 = '{$teacher2}'
										WHERE id = '{$idn}'");
		}
		$sqlGetTeacher = mysql_query("SELECT * FROM room_allot WHERE date = '{$date}' AND slot = '{$slot}'");
		while ($row = mysql_fetch_object($sqlGetTeacher)) {
			$teacher1st = $row->teacher1;
			$teacher2nd = $row->teacher2;
			$sqlAvailability = mysql_query("UPDATE teacher 
					SET available = available-1 
					WHERE teacher_id IN ('{$teacher1st}', '{$teacher2nd}')");
		}
		
	}
}
?>
<!-- -->
<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-10">
                    <div class="card">
                        <div class="header">
                            <h4 class="title text-center text-primary">Create Duty Plan</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Select Department:</label>
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
                                            <button type="submit" class="btn btn-info btn-fill" name="search_room_teacher"><span class="fa fa-search"></span></button>
                                        </span>
                                    </div>

                                </div>
                            </div>

                            </form>					
                            <div class="col-md-12"></div>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="bootstrap-iso">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Department:</label>
                                                <input type="text" name="department" class="form-control" value="<?php echo $department; ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No of Teachers:</label>
                                                <input type="text" name="no_of_teacher" class="form-control" value="<?php echo $no_of_teacher; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function () {

                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <select name="exam_date" class="form-control" aria-describedby="basic-addon2" required>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Slot:</label>
                                                <select name="exam_slot" class="form-control" required>
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
                                        <div class="col-md-8">

                                            <div class="form-group">
                                                <button name="create_dutyplan" type="submit" class="btn btn-info btn-fill pull-right">Create Duty Plan</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                        </div>
                    </div>
            </form>
            <div class="row"><div class="col-md-3"><?php echo $success; ?></div></div>
			<div class="row"><div class="col-md-6"><?php echo $err; ?></div></div>
        </div>
    </div>
</div>



</div>	
</div>
</div>

<!--jQuery -->


<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>

<?php include('footer.php'); ?>
