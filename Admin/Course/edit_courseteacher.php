<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>

<?php 
	
	$department = $_GET['idedep'];
	$course_id = $_GET['idecrs'];
	$batch = $_GET['ideb'];
	$course_teacher = $_GET['idect'];
	$section = $_GET['ides'];
	if(isset($_GET['idedep']) && isset($_GET['idecrs']) && isset($_GET['ideb']) && isset($_GET['idect']) && isset($_GET['ides']))
	{
		$sql = mysql_query("SELECT * FROM courseteacher WHERE department = '{$department}' AND course_id = '{$course_id}' AND batch = '{$batch}' AND course_teacher = '$course_teacher' AND section = '$section'");
		$row = mysql_fetch_object($sql);
		
	}
	
	if(isset($_POST['submit']))
		{
				$sqledit = "UPDATE courseteacher
									SET department   = '{$_POST['department']}',
										course_id   = '{$_POST['course_id']}',
										course_teacher = '{$_POST['course_teacher']}',
										batch = '{$_POST['batch']}',
										section = '{$_POST['section']}'
									WHERE department = '{$department}' AND course_id = '{$course_id}' AND batch = '{$batch}' AND course_teacher = '$course_teacher' AND section = '$section'";
				    $re = mysql_query($sqledit);
					    if($re)
							{
								
								header('location: viewcourseteacher.php');
								exit;
							}
					
		}
	
?>


<script>
	/* function validateForm() 
		{
			var x = document.forms["myform1"]["room_number"].value;
			if (x == null || x == "") {
				alert("Name must be filled out");
				return false;
			}
			var Y = document.forms["myform1"]["building_name"].value;
			if (Y == null || Y == "") {
				alert("ID must be filled out");
				return false;
			}
			var Z = document.forms["myform1"]["room_capacity"].value;
			if (Z == null || Z == "") {
				alert("Initial must be filled out");
				return false;
			}
		} */
</script>  
 <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
	
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
					<form action="" method="post">
						<div class="col-md-8">
							<div class="card">
								<div class="header">
									<h4 class="title">Update Course Teacher Info</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Course ID</label>
													<input type="text" name="course_id" class="form-control" value="<?php echo $row->course_id; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Course Teacher</label>
													<input type="text" name="course_teacher" class="form-control" value="<?php echo $row->course_teacher; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											
											<div class="col-md-4">
												<div class="form-group">
													<label>Department: </label>
													<select name="department" class="form-control" required/>
														<option value="<?php echo $row->department; ?>"><?php echo $row->department; ?> </option>
											<?php 														
													$Qdepartment = mysql_query("SELECT * FROM department ORDER BY department");
													while($row_department = mysql_fetch_array($Qdepartment))
													{
											?>
														<option value="<?php echo $row_department['department']; ?>"><?php echo $row_department['department'] ;?></option>
															  
											<?php 
													}
											?>
													</select>	
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Section</label>
													<input type="text" name="section" class="form-control" value="<?php echo $row->section; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Batch</label>
													<input type="text" name="batch" class="form-control" value="<?php echo $row->batch; ?>">
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
				</div>
						<div class="col-md-8">
							<button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Update</button>
							<div class="clearfix"></div>
							<div class="success"><?php echo $success; ?></div>							
						</div>
					</form>						
            </div>
        </div>
    <!--jQuery -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>

<?php include('footer.php'); ?>