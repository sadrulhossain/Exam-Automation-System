<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>


</style>
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card" id="dutytable">
				<form action="pdfduty1.php" method="POST" name="pdfduty1">
                            <div class="header">
                                <h4 class="title"><center>Duty List</center></h4>
                            </div>
                            <div class="content">
                                <table class="table  table-responsive table-bordered" >
                                    <tr class="info">
                                    	<th colspan ="1" style="text-align: center">Department</th>
                                    	<th colspan ="1"style="text-align: center">Date</th>
										<th colspan ="1"style="text-align: center">Room</th>
										<th colspan ="1"style="text-align: center">Slot</th>
										<th colspan ="2"style="text-align: center">Invigilators</th>
                                    </tr>
                                    <tr>
										<?php 
						
							$sqldept = 	mysql_query("SELECT DISTINCT department FROM room_allot ORDER BY department ASC");
							while($row_dept = mysql_fetch_object($sqldept)){
								$department = $row_dept->department;
								//echo $department;
								$c = 0;
								$date = array();
								$sqldate = mysql_query("SELECT DISTINCT date FROM room_allot WHERE
									department = '{$department}' ORDER BY date, department, slot ASC");
								while($row_date = mysql_fetch_object($sqldate)){
									$date[] = $row_date->date;
									$c++;
									
								}
								for($i = 0; $i < $c; $i++){
									$sqlcount = mysql_query("SELECT COUNT(id) as totaldate FROM room_allot WHERE
										department = '{$department}' AND date = '{$date[$i]}' ORDER BY date, department, slot ASC");
									while($row_total = mysql_fetch_object($sqlcount)){
										$totaldate = $row_total->totaldate;
										$totaldate++;
									}
								}
								$sqlcount = mysql_query("SELECT COUNT(id) as totaldept FROM room_allot WHERE
									department = '{$department}' ORDER BY date, department, slot ASC");
								while($row_total = mysql_fetch_object($sqlcount)){
									$totaldept = $row_total->totaldept;
									$totaldept++;
								}
								
									//echo $total;
						?>			
									<tr>
									
										<td colspan ="1" rowspan="<?php echo ($totaldept+$totaldate);?>"><?php echo $department;?></td>
						<?php 
								for($i = 0; $i < $c; $i++){
									$count = 0;
									$slot = array();
									$room = array();
									$teacher1 = array();
									$teacher2 = array();
									$sqlroom = mysql_query("SELECT * FROM room_allot  WHERE department = '{$department}' AND
											date = '{$date[$i]}' ORDER BY date, slot, room_number ASC");
									while($row_room = mysql_fetch_object($sqlroom)){
										$slot[] = $row_room->slot;
										$room[] = $row_room->room_number;
										$teacher1[] = $row_room->teacher1;
										$teacher2[] = $row_room->teacher2;
										$count++;
									}
						?>
										<tr>
											<td colspan ="1" rowspan="<?php echo ($count+1);?>" ><?php echo date("d-M-Y", strtotime($date[$i]));?></td>
						<?php	
									

									for($j = 0; $j < $count; $j++){
										$sqlteacher1 = mysql_query("SELECT * FROM teacher  WHERE 
																teacher_id = '{$teacher1[$j]}' ");
										while($row = mysql_fetch_object($sqlteacher1)){
											$invigilator1 = $row->teacher_name;
											$initial1 = $row->teacher_initial;
										}
										$sqlteacher2 = mysql_query("SELECT * FROM teacher  WHERE 
																teacher_id = '{$teacher2[$j]}' ");
										while($row = mysql_fetch_object($sqlteacher2)){
											$invigilator2 = $row->teacher_name;
											$initial2 = $row->teacher_initial;
										}

						?>
											<tr>
												<td colspan ="1" rowspan="1"><?php echo $room[$j];?></td>
												<td colspan ="1" rowspan="1"><?php echo $slot[$j];?></td>
												<td colspan ="1" rowspan="1"><?php echo $invigilator1.' ('.$initial1.')';?></td>
												<td colspan ="1" rowspan="1"><?php echo $invigilator2.' ('.$initial2.')';?></td>
											</tr>
						<?php		}?>
										</tr>
						<?php
								}
							}
						?>	
                      
                                    </tr>
                                </table>
                            </div>
							</form>
                        </div>
								
                    </div>
                </div>
            </div>
        </div>

<script>
	function confirm_delete(){
			return confirm("Are you sure to delete this data.");
		}
		
	function print(el){
		var restorePage = document.body.innerHTML;
		var print = document.getElementById(el).innerHTML;
		document.body.innerHTML = print;
		window.print();
		document.body.innerHTML = restorePage;
	}
</script>

<?php include('footer.php'); ?>