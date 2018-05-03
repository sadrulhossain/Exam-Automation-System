<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>

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
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Routine</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <thead>
									    <th>#</th>
                                    	<th>Course Code</th>
                                    	<th>Course Name</th>
										<th>Batch</th>
										<th>Department</th>
										<th>Date</th>
                                    	<th>Slot</th>
                                    </thead>
                                    <tbody>
										<?php 
						$serial = 0;
						$sql = mysql_query("SELECT * FROM routine ORDER BY department ASC");
						while($row = mysql_fetch_object($sql))	
							{
								$serial++;	
								
								$course_id = $row->course_id;
								$department = $row->department;
								$date = date("d-M-Y", strtotime($row->date));
								$slot = $row->slot;
								$batch = $row->batch;
								$qcoursename = mysql_query("SELECT * FROM course WHERE course_id = '$course_id' AND department = '$department' AND batch = '$batch'");
								while($rowcn = mysql_fetch_object($qcoursename)){
									$course_name = $rowcn->course_name;
								}
								$qslot = mysql_query("SELECT * FROM slot WHERE slot = '$slot'");
								while($rows = mysql_fetch_object($qslot)){
									$from = date("h:i", strtotime($rows->timefrom));
									$to = date("h:i", strtotime($rows->timeto));
									
								}

					?>	
								
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $course_id; ?> </td>
								<td><?php echo $course_name; ?></td>
								<td><?php echo $batch; ?></td>
								<td><?php echo $department; ?></td>
								<td><?php echo $date; ?></td>
								<td><?php echo $from.'-'.$to; ?></td>
							</tr>	
								
					<?php			   
							}
					?>		
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
	function confirm_delete(){
			return confirm("Are you sure to delete this data.");
		}
</script>

<?php include('footer.php'); ?>