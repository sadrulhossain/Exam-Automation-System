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
		$room_number = $_POST['room_number'];
		$col = $_POST['column'];
		$dsql = mysql_query("SELECT * FROM col WHERE room_number = '$room_number' and col = '$col'");		
		if(mysql_num_rows ( $dsql ) > 0 )
			{
				$success1 =  "Column $column already exists!";
			}
		else
			{
				$sql = mysql_query("INSERT INTO col(room_number, col, capacity)
											VALUES('{$_POST['room_number']}',
												   '{$_POST['column']}',
												   '{$_POST['capacity']}') ");
												   
		
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
	function validateForm() 
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
									<h4 class="title">Add Column Profile</h4>
								</div>
								<div class="content">
										<div class="row">
											
											<div class="col-md-5">
												<label>Room Number</label>
												<div class="form-group">
													<select name="room_number" class="form-control" aria-describedby="basic-addon2" required/>
														<option> </option>
											<?php 														
													$Qroom = mysql_query("SELECT * FROM room ORDER BY department, room_number");
													while($row_room = mysql_fetch_array($Qroom))
													{
											?>
														<option value="<?php echo $row_room['room_number']; ?>"><?php echo $row_room['room_number'] ;?></option>
															  
											<?php 
													}
											?>
													</select>
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<label>Column</label>
													<input type="number" min="1" name="column" class="form-control" placeholder="Enter Column Number" required/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-5">
												<div class="form-group">
													<label>Capacity</label>
													<input type="number" min="0" name="capacity" class="form-control" placeholder="Enter Capacity of Columns" required/>
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