<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
}
?>
<?php include('header.php'); ?>
<?php include('../database.php'); ?>

<?php
if (isset($_POST['search_date'])) {
    $department = $_POST['department'];
}

if (isset($_POST['create_seatplan'])) {
    $department = $_POST['department'];
    $date = $_POST['date'];
    $slot = $_POST['slot'];
    if ($slot == "D") {
        $shift = 1;
    }
    if ($slot == "A" || $slot == "B" || $slot == "C") {
        $shift = 0;
    }
	
	$sqlsrchxstnc = mysql_query("SELECT * FROM studentseat 
		WHERE  department = '{$department}' AND date = '{$date}' AND slot = '{$slot}' 
		ORDER BY department, date, slot, room_number ASC");
	if(mysql_num_rows($sqlsrchxstnc) > 0){
		$err .= "The Plan for $date, Slot $slot of $department Department Already Exists";
	}
	else{
		$crsc = 0;
		$course_evenc = 0;
		$course_oddc = 0;
		$course_avail = array();
		$course_even = array();
		$course_odd = array();
		$sqlcrs = mysql_query("SELECT * FROM routine 
					WHERE department = '{$department}' AND date = '{$date}' AND slot = '{$slot}' 
					ORDER BY date, slot ASC ");
		while ($row_crs = mysql_fetch_object($sqlcrs)) {
			$course_avail[] = $row_crs->course_id;
			$crsc++;
		}
		//echo $course_avail[1];
		//echo $crsc;
		for ($t = 0; $t < $crsc; $t++) {
			$mod = $t % 2;
			if ($mod == 0 || $t == 0) {
				$course_odd[] = $course_avail[$t];
				$course_oddc++;
			} else {
				$course_even[] = $course_avail[$t];
				//echo $course_avail[$i];
				$course_evenc++;
			}
		}
		//echo $course_evenc;
		//echo $course_oddc;
		$roomc = 0;
		$room_avail = array();
		//$course_even = array();
		//$course_odd = array();
		$sqlroom = mysql_query("SELECT * FROM room 
					WHERE department = '{$department}'  
					ORDER BY department,room_number ASC ");
		while ($row_room = mysql_fetch_object($sqlroom)) {
			$room_avail[] = $row_room->room_number;
			//echo $room[1];
			$roomc++;
		}
		//echo $room[5];
		$i = 0;
		$p = 0;
		$ts = 0;
		$capacity = 0;
		$i1 = 0;
		$p1 = 0;
		$ts1 = 0;
		$capacity3 = 0;
		for ($j = 0; $j < $roomc; $j++) {
			$room = $room_avail[$j];
			//echo $room." ";
			$cl = 0;
			$col_evenc = 0;
			$col_oddc = 0;
			$col_avail = array();
			$col_even = array();
			$col_odd = array();
			$sqler = mysql_query("SELECT * FROM col 
										WHERE room_number = '{$room}'
										ORDER BY room_number, col ASC ");
			while ($row_er = mysql_fetch_object($sqler)) {
				$col_avail[] = $row_er->col;
				$cl++;
			}
			//echo $cl." ".$col_avail[4]." ";
			for ($n = 0; $n < $cl; $n++) {
				$mod = $n % 2;
				if ($mod == 0 || $n == 0) {
					$col_odd[] = $col_avail[$n];
					$col_oddc++;
				} else {
					$col_even[] = $col_avail[$n];
					$col_evenc++;
				}
			}
			//echo $col_evenc." ".$col_even[1]." |  ";	
			for ($k = 0; $k < $col_evenc; $k++) {
				$col = $col_even[$k];
				//echo $room." ".$col." |   ";
				if ($i < $course_evenc) {
					$course1 = $course_even[$i];
					//echo $course1;
					//echo $shift;
					$sqlbatch1 = mysql_query("SELECT * FROM course 
								WHERE department = '{$department}' AND course_id = '{$course1}' AND shift = '{$shift}'");
					while ($row_batch1 = mysql_fetch_object($sqlbatch1)) {
						$batch1 = $row_batch1->batch;
						//echo $batch1." ";
						$ns = 0;
						$sec1 = array();
						$ct1 = array();
						$nos1 = array();
						$sqlnos = mysql_query("SELECT * FROM batch 
									WHERE department = '{$department}' AND batch = '{$batch1}' ");
						while ($row_nos = mysql_fetch_object($sqlnos)) {
							$sec1[] = $row_nos->section;
							$nos1[] = $row_nos->no_of_student;
							$ns++;
							$totalstudent1 = array_sum($nos1);
						}
						$sqlct = mysql_query("SELECT * FROM courseteacher 
									WHERE department = '{$department}' AND batch = '{$batch1}' AND course_id = '{$course1}' 
									ORDER BY department, batch, section ");
						while ($row_ct = mysql_fetch_object($sqlct)) {
							$ct1[] = $row_ct->course_teacher;
							//echo $ct;
						}
						$sqlcap = mysql_query("SELECT * FROM col 
											WHERE room_number = '{$room}' AND col = '{$col}'
											ORDER BY room_number, col ASC ");
						while ($row_cap = mysql_fetch_object($sqlcap)) {
							$capacity1 = $row_cap->capacity;
							//echo $capacity." ";
							//echo $totalstudent1." ";
							if (($totalstudent1 - $ts) >= 0) {
								$ts = $ts + $capacity1;

								$np = $nos1[$p] - $capacity1 - $capacity;
								$capacity = $capacity + $capacity1;
								if ($np >= 0) {
									if ($np > 0) {
										$section1 = "(" . $sec1[$p] . ")";
										$crst1 = $ct1[$p];
									}
									if ($np == 0) {
										$section1 = "(" . $sec1[$p] . ")";
										$crst1 = $ct1[$p];
										$capacity = 0;
										$p++;
									}
								} else {
									if (($totalstudent1 - $ts) >= 0) {
										$section1 = "(" . $sec1[$p]."+".$sec1[$p + 1].")";
										if($ct1[$p] == $ct1[$p + 1]){
											$crst1 = $ct1[$p];
										}
										else{
											$crst1 = $ct1[$p]."+".$ct1[$p + 1];
										}
										$nos1[$p + 1] = $nos1[$p + 1] + $np;
										$capacity = 0;
										$p++;
									} else {
										$section1 = "(".$sec1[$p].")";
										$crst1 = $ct1[$p];
									}
								}


								//echo $totalstudent1." / ";
								//echo $course1." ".$batch1." ".$department." ". $date." ".$slot." ".$totalstudent1." ".$room." ".$col." | ";
								$sqlinsertseat = mysql_query("INSERT INTO studentseat(course_id, batch, department, date, slot, room_number, col, capacity, section, courseteacher) VALUES('{$course1}',  
															   '{$batch1}',
															   '{$department}',
															   '{$date}',
															   '{$slot}',
															   '{$room}',
															   '{$col}',
															   '{$capacity1}',
															   '{$section1}',
															   '{$crst1}')");
							} else {
								$p = 0;
								$capacity = 0;
								$ts = 0;
								$i++;
							}
						}
					}
				} else {
					break;
				}
			}
			for ($k = 0; $k < $col_oddc; $k++) {
				$col = $col_odd[$k];
				//echo $room." ".$col." |   ";
				if ($i1 < $course_oddc) {
					$course2 = $course_odd[$i1];
					//echo $course1;
					//echo $shift;
					$sqlbatch2 = mysql_query("SELECT * FROM course 
								WHERE department = '{$department}' AND course_id = '{$course2}' AND shift = '{$shift}'");
					while ($row_batch2 = mysql_fetch_object($sqlbatch2)) {
						$batch2 = $row_batch2->batch;
						//echo $batch1." ";
						$ns = 0;
						$sec2 = array();
						$ct2 = array();
						$nos2 = array();
						$sqlnos = mysql_query("SELECT * FROM batch 
									WHERE department = '{$department}' AND batch = '{$batch2}' ");
						while ($row_nos = mysql_fetch_object($sqlnos)) {
							$sec2[] = $row_nos->section;
							$nos2[] = $row_nos->no_of_student;
							$ns++;
							$totalstudent2 = array_sum($nos2);
						}
						$sqlct = mysql_query("SELECT * FROM courseteacher 
									WHERE department = '{$department}' AND batch = '{$batch2}' AND course_id = '{$course2}' 
									ORDER BY department, batch, section ASC");
						while ($row_ct = mysql_fetch_object($sqlct)) {
							$ct2[] = $row_ct->course_teacher;
							//echo $ct2;
						}
						$sqlcap = mysql_query("SELECT * FROM col 
											WHERE room_number = '{$room}' AND col = '{$col}'
											ORDER BY room_number, col ASC ");
						while ($row_cap = mysql_fetch_object($sqlcap)) {
							$capacity2 = $row_cap->capacity;
							//echo $capacity." ";
							//echo $totalstudent1." ";
							if (($totalstudent2 - $ts1) >= 0) {
								$ts1 = $ts1 + $capacity2;

								$np = $nos2[$p1] - $capacity2 - $capacity3;
								$capacity3 = $capacity3 + $capacity2;
								if ($np >= 0) {
									if ($np > 0) {
										$section2 = "(" . $sec2[$p1] . ")";
										$crst2 = $ct2[$p1];
									}
									if ($np == 0) {
										$section2 = "(" . $sec2[$p1] . ")";
										$crst2 = $ct2[$p1];
										$capacity3 = 0;
										$p1++;
									}
								} else {
									if (($totalstudent2 - $ts1) >= 0) {
										$section2 = "(" . $sec2[$p1] . "+" . $sec2[$p1 + 1] . ")";
										if($ct1[$p] == $ct1[$p + 1]){
											$crst2 = $ct2[$p1];
										}
										else{
											$crst2 = $ct2[$p1]."+".$ct2[$p1 + 1];
										}
										$nos2[$p1 + 1] = $nos2[$p1 + 1] + $np;
										$capacity3 = 0;
										$p1++;
									} else {
										$section2 = "(" . $sec2[$p1] . ")";
										$crst2 = $ct2[$p1];
									}
								}


								//echo $totalstudent1." / ";
								//echo $course1." ".$batch1." ".$department." ". $date." ".$slot." ".$totalstudent1." ".$room." ".$col." | ";
								$sqlinsertseat = mysql_query("INSERT INTO studentseat(course_id, batch, department, date, slot, room_number, col, capacity, section, courseteacher) VALUES('{$course2}',  
															   '{$batch2}',
															   '{$department}',
															   '{$date}',
															   '{$slot}',
															   '{$room}',
															   '{$col}',
															   '{$capacity2}',
															   '{$section2}',
															   '{$crst2}')");
							} else {
								$p1 = 0;
								$capacity3 = 0;
								$ts1 = 0;
								$i1++;
							}
						}
					}
				} else {
					break;
				}
			}
		}
		
	}
}
?>


<!-- -->
<br>
<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-10">
                    <div class="card">
                        <div class="header">
                            <h4 class="title text-center text-primary">Create Seat Plan</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Department</label>
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
                                                <button name="create_seatplan" type="submit" class="btn btn-info btn-fill pull-right">Create Seat Plan</button>
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