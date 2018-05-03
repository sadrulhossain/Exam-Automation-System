<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>
<?php 
if(isset($_POST['submit']))
	{  
		$department = $_POST['department'];
		$course_id = $_POST['course_id'];
		$batch = $_POST['batch'];
		
		$dsql = mysql_query("SELECT * FROM course WHERE department = '$department' AND course_id = '$course_id' AND batch = '$batch'");		
		if(mysql_num_rows ( $dsql ) > 0 )
			{
				$success1 =  "$course_id already exists!";
			}
		else
			{
				$sql = mysql_query("INSERT INTO course(department, course_id, course_name, batch, shift)
											VALUES('{$_POST['department']}',
												   '{$_POST['course_id']}',
												   '{$_POST['course_name']}',
												   '{$_POST['batch']}',
												   '{$shift}') ");
												   
		
				if($sql)
					{
						$success =  "Successfully Insert!!";
					}
	   
			}
		$sqls = mysql_query("Update course 
			SET shift = 1
			WHERE batch NOT LIKE 'L_T_'");
		
	}
	
?>
<style type="text/css">
	.success{
		color: green;
		font-size: 20px;
	}
	.success1{
		color: red;
		font-size: 20px;
	}
</style>
</style>
<script>
	/* function validateForm() 
		{
			var x = document.forms["myform1"]["room_number"].value;
			if (x == null || x == "") {
				alert("Room Number must be filled out");
				return false;
			}
			var Y = document.forms["myform1"]["building_name"].value;
			if (Y == null || Y == "") {
				alert("Building Name must be filled out");
				return false;
			}
			var Z = document.forms["myform1"]["room_capacity"].value;
			if (Z == null || Z == "") {
				alert("Room Capacity must be filled out");
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
									<h4 class="title">Add Course Profile</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Course Name</label>
													<input type="text" name="course_name" class="form-control" placeholder="Enter Course Name">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label>Course ID</label>
													<input type="text" name="course_id" class="form-control" placeholder="Enter Course ID">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Department: </label>
													<select name="department" class="form-control" required/>
														<option> </option>
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
											
											<div class="col-md-5">
												<div class="form-group">
													<label>Batch</label>
													<input type="text"  name="batch" class="form-control" placeholder="Enter Batch">
												</div>
											</div>											
										</div>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
				</div>
						<div class="col-md-8">
							<button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Save</button>
							<div class="clearfix"></div>
							<div class="success"><?php echo $success; ?></div>
							<div class="success1"><?php echo $success1; ?></div>
						</div>
					</form>						
            </div>
        </div>
    <!--jQuery -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>

<?php include('footer.php'); ?>