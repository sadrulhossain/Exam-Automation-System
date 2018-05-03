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
		$batch = $_POST['batch'];
		$section = $_POST['section'];
	$dsql = mysql_query("SELECT * FROM batch WHERE department = '{$department}' AND batch = '{$batch}' AND section = '{$section}'");		
		if(mysql_num_rows ( $dsql ) > 0 )
			{
				$success1 =  "Section $section of $batch in $department department already exists!";
			}
		else
			{
				$sql = mysql_query("INSERT INTO batch(department, batch, section, no_of_student)
											VALUES('{$_POST['department']}',
													'{$_POST['batch']}',
												   '{$_POST['section']}',
												   '{$_POST['no_of_student']}') ");
												   
		
				if($sql)
					{
						$success =  "Successfully Insert!!";
					}
	   
			}	
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

    <link href="../assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
	
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
					<form action="" method="post">
						<div class="col-md-8">
							<div class="card">
								<div class="header">
									<h4 class="title">Add Section Profile</h4>
								</div>
								<div class="content">
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
													<input type="text" name="batch" class="form-control" placeholder="Enter Batch">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Section</label>
													<input type="text" name="section" class="form-control" placeholder="Enter Section">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label>No. of Students</label>
													<input type="number" min="0" name="no_of_student" class="form-control" placeholder="Enter No. of Students">
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
    <script src="../../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>

<?php include('footer.php'); ?>