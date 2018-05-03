<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>
<?php include('../database.php'); ?>

<?php 
	
	$teacher_id = $_GET['ide'];
	if(isset($_GET['ide']))
	{
		$sql = mysql_query("SELECT * FROM teacher WHERE teacher_id = '{$teacher_id}'");
		$row = mysql_fetch_object($sql);
		
	}
	
	if(isset($_POST['submit']))
		{
			
			$sqledit = "UPDATE teacher
								SET teacher_name        = '{$_POST['teacher_name']}',
									teacher_initial     = '{$_POST['teacher_initial']}',
								    teacher_id          = '{$_POST['teacher_id']}',									
									teacher_designation = '{$_POST['teacher_designation']}',
									department          = '{$_POST['department']}',
								    enrollment          = '{$_POST['enrollment']}',
									available 			= '{$_POST['enrollment']}'
								WHERE teacher_id = '{$teacher_id}'";
					$re = mysql_query($sqledit);
					if($re)
					{
						$success =  "Successfully Update!!";
						header('Location: viewteacher.php');
						exit;
					}
		}
	
?>



<script>
	function validateForm() 
		{
			var x = document.forms["myform"]["teacher_name"].value;
			if (x == null || x == "") {
				alert("Name must be filled out");
				return false;
			}
			var Z = document.forms["myform"]["teacher_initial"].value;
			if (Z == null || Z == "") {
				alert("Initial must be filled out");
				return false;
			}
			var Y = document.forms["myform"]["teacher_id"].value;
			if (Y == null || Y == "") {
				alert("ID must be filled out");
				return false;
			}
			var P = document.forms["myform"]["teacher_designation"].value;
			if (P == null || P == "") {
				alert("Designation must be filled out");
				return false;
			}
			var Q = document.forms["myform"]["department"].value;
			if (Q == null || Q == "") {
				alert("Department must be filled out");
				return false;
			}
			var R = document.forms["myform"]["enrollment"].value;
			if (R == null || R == "") {
				alert("Enrollment must be filled out");
				return false;
			}
		}
</script>
    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
    
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
					<form action="" method="post">
						<div class="col-md-8">
							<div class="card">
								<div class="header">
									<h4 class="title">Update Teacher Profile</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>Teacher Name</label>
													<input type="text" name="teacher_name" class="form-control" placeholder="Enter Teacher Name" value="<?php echo $row->teacher_name; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Teacher initial</label>
													<input type="text" name="teacher_initial" class="form-control" placeholder="Enter Teacher Initial" value="<?php echo $row->teacher_initial; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>Teacher Id</label>
													<input type="text" name="teacher_id" class="form-control" placeholder="Enter Teacher ID" value="<?php echo $row->teacher_id; ?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Teacher Designation</label>
													<select name="teacher_designation" class="form-control"  required/>
														<option value="<?php echo $row->teacher_designation; ?>"> <?php
										if($teacher_designation == 1){
											echo "Lecturer";
										}
										if($teacher_designation == 2){
											echo "Sr. Lecturer";
										}
										if($teacher_designation == 3){
											echo "Ast. Professor";
										}
									?></option>
														<option value="1">Lecturer</option>
														<option value="2">Sr. Lecturer</option>
														<option value="3">Ast.Professor</option>
														
													</select>
												</div>
											</div>											
										</div>
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>Department</label>
													<select name="department" class="form-control" required>
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
													<label>Enrollment</label>
													<input type="number" min="0" name="enrollment" class="form-control" placeholder="Enter Enrollment" value="<?php echo $row->enrollment; ?>">
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
				
						<div class="col-md-8">
							<button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Update</button>
							<div class="clearfix"></div>						
						</div>
					</form>	
				</div>	
            </div>
        </div>
    <!--jQuery -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    


<?php include('footer.php'); ?>