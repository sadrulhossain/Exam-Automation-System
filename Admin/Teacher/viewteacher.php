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
                                <h4 class="title">Teacher List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <thead>
									    <th>#</th>
                                    	<th>Teacher Name</th>
                                    	<th>Teacher Id</th>
										<th>Teacher Initial</th>
										<th>Teacher designation</th>
										<th>Department</th>
                                    	<th>Enrollment</th>
										<th>Available</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
										<?php 
						$serial = 0;
						$sql = mysql_query("SELECT * FROM teacher ORDER BY  department ASC, teacher_designation DESC, teacher_id  ASC");
						while($row = mysql_fetch_object($sql))	
							{
								$serial++;	
								
								$teacher_name = $row->teacher_name;
								$teacher_id = $row->teacher_id;
								$teacher_initial = $row->teacher_initial;
								$teacher_designation = $row->teacher_designation;
								$department = $row->department;
								$enrollment = $row->enrollment;
								$available = $row->available;

					?>	
								
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $teacher_name; ?> </td>
								<td><?php echo $teacher_id; ?></td>
								<td><?php echo $teacher_initial; ?></td>
								<td><?php
										if($teacher_designation == 1){
											echo "Lecturer";
										}
										if($teacher_designation == 2){
											echo "Sr. Lecturer";
										}
										if($teacher_designation == 3){
											echo "Ast. Professor";
										}
									?></td>
								<td><?php echo $department; ?></td>
								<td><?php echo $enrollment; ?></td>
								<td><?php echo $available; ?></td>
								<td>
									<a href='edit_teacher.php?ide=<?php echo $teacher_id;?>'><button type='button' class='btn btn-info'><span class="fa fa-pencil"></span></button></a>
									<a onclick='return confirm_delete();' href='delete_teacher.php?idd=<?php echo $teacher_id; ?>'><button type='button' class='btn btn-danger'><span class="fa fa-trash"></span></button></a>
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