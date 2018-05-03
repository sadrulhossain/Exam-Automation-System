<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>

<?php 
	
	$department = $_GET['ided'];
	$batch = $_GET['ideb'];
	$section = $_GET['ides'];
	if(isset($_GET['ided']) && isset($_GET['ideb']) && isset($_GET['ides']))
	{
		$sql = mysql_query("SELECT * FROM batch 
		WHERE department = '{$department}' AND  batch = '{$batch}' AND section = '{$section}'");
		$row = mysql_fetch_object($sql);
		
	}
	
	if(isset($_POST['submit']))
		{
				$sqledit = "UPDATE batch
									SET department   = '{$_POST['department']}',
										batch   = '{$_POST['batch']}',
										section = '{$_POST['section']}',
										no_of_student = '{$_POST['no_of_student']}'
									WHERE batch = '{$batch}' AND section = '{$section}'";
				    $re = mysql_query($sqledit);
					    if($re)
							{
								$success =  "Successfully Update!!";
								header('location: viewbatch.php');
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
									<h4 class="title">Update Section Info</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-5">
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
											<div class="col-md-5">
												<div class="form-group">
													<label>Batch</label>
													<select name="batch" class="form-control" required/>
														<option value="<?php echo $row->batch; ?>"> <?php echo $row->batch; ?></option>
											<?php 														
													$batch = mysql_query("SELECT * FROM batch ORDER BY department");
													while($row_batch = mysql_fetch_array($Qbatch))
													{
											?>
														<option value="<?php echo $row_batch['batch']; ?>"><?php echo $row_batch['batch'] ;?></option>
															  
											<?php 
													}
											?>
													</select>	
												</div>
											</div>
											
										</div>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Section</label>
													<input type="text" name="section" class="form-control" placeholder="Enter Section" value="<?php echo $row->section; ?>">
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label>No. of Students</label>
													<input type="number" min="0" name="no_of_student" class="form-control" placeholder="Enter No. of Students" value="<?php echo $row->no_of_student; ?>">
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