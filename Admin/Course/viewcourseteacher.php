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
                                <h4 class="title">Course Teacher List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <thead>
									    <th>#</th>
										<th>Course ID</th>
										<th>Teacher Initial</th>
										<th>Department</th>
										<th>Section</th>
										<th>Batch</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
							<?php 
								$serial = 0;
								$sql = mysql_query("SELECT * FROM courseteacher ORDER BY department, batch, section, course_id ASC");
								while($row = mysql_fetch_object($sql))	
									{
										$serial++;	
										
										$course_id = $row->course_id;
										$ctin = $row->course_teacher;
										$department = $row->department;
										$batch = $row->batch;
										$section = $row->section;

							?>	
										
									<tr>
										<td><?php echo $serial; ?></td>
										<td><?php echo $course_id; ?> </td>
										<td><?php echo $ctin; ?></td>
										<td><?php echo $department; ?></td>
										<td><?php echo $section; ?></td>
										<td><?php echo $batch; ?></td>
										<td>
											<a href='edit_courseteacher.php?idedep=<?php echo $department;?>&&idecrs=<?php echo $course_id;?>&&ideb=<?php echo $batch; ?>&&ides=<?php echo $section; ?>&&idect=<?php echo $ctin; ?>'><button type='button' class='btn btn-info'><span class="fa fa-pencil"></span></button></a>
											<a onclick='return confirm_delete();' href='delete_courseteacher.php?idddep=<?php echo $department;?>&&iddcrs=<?php echo $course_id;?>&&iddb=<?php echo $batch; ?>&&idds=<?php echo $section; ?>&&iddct=<?php echo $ctin; ?>'><button type='button' class='btn btn-danger'><span class="fa fa-trash"></span></button></a>
										</td>
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