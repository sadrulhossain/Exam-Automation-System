<?php include('header.php'); ?>
<?php include('database.php'); ?>

<?php 
if(isset($_POST['submit']))
	{   
		$teacher_id = $_POST['teacher_id'];
		$dsql = mysql_query("SELECT * FROM teacher WHERE teacher_id = '$teacher_id' ");	
		if(mysql_num_rows ( $dsql ) > 0)
			{
				$success1 =  "$teacher_id Id already exists!";
			}
		else
			{
				$sql = mysql_query("INSERT INTO teacher(teacher_name, teacher_id, teacher_initial, teacher_designation,
									department, enrollment)
													VALUES('{$_POST['teacher_name']}',
														   '{$_POST['teacher_id']}',
														   '{$_POST['teacher_initial']}',
														   '{$_POST['teacher_designation']}',
														   '{$_POST['department']}',
														   '{$_POST['enrollment']}') ");
														   
				
				if($sql)
					{
						$success =  "Successfully Insert!!";;
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
	.well{
		margin-bottom: 40px;
	}
</style>
<script>
	function validateForm() 
		{
			var x = document.forms["myform"]["teacher_name"].value;
			if (x == null || x == "") {
				alert("Name must be filled out");
				return false;
			}
			var Y = document.forms["myform"]["teacher_id"].value;
			if (Y == null || Y == "") {
				alert("ID must be filled out");
				return false;
			}
			var Z = document.forms["myform"]["teacher_initial"].value;
			if (Z == null || Z == "") {
				alert("Initial must be filled out");
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
<section id="add-form">
	<div class="container">
		<div class="well">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 class="page-title text-center text-warning"><b>Add Teacher Info</b></h2>
					<form action="" method="post" name="myform" onsubmit="return validateForm()">
						<div class="form-group">
							<label>Teacher Name :</label>
							<input name="teacher_name" type="text" class="form-control" placeholder="Enter Teacher Name" />
						</div>
						 <div class="form-group">
							<label>Teacher Id :</label>
							<input name="teacher_id" type="text" class="form-control" placeholder="Enter Teacher ID" />
						</div>
						<div class="form-group">
							<label>Teacher initial :</label>
							<input name="teacher_initial" type="text" class="form-control" placeholder="Enter Teacher Initial" />
						</div>
						<div class="form-group">
							<label>Teacher designation :</label>
							<input name="teacher_designation" type="text" class="form-control" placeholder="Enter Teacher designation" />
						</div>
						<div class="form-group">
							<label>Department :</label>
							<input name="department" type="text" class="form-control" placeholder="Enter Department" />
						</div>
						<div class="form-group">
							<label>Enrollment :</label>
							<input name="enrollment" type="text" class="form-control" placeholder="Enter Enrollment" />
						</div>
							<button name="submit" type="submit" class="btn btn-info btn-block">Save</button>
							<div class="success"><?php echo $success; ?></div>
							<div class="success1"><?php echo $success1; ?></div>
					</form>
				</div>
			</div>	  
		</div>
	</div>
</section>
	
<?php include('footer.php'); ?>