<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>

<?php 
	
	$room_number = $_GET['ider'];
	$building_name = $_GET['ideb'];
	$department = $_GET['ided'];
	$room_capacity = $_GET['iderc'];
	if(isset($_GET['ider']) && isset($_GET['ideb']) && isset($_GET['ided']) && isset($_GET['iderc']))
	{
		$sql = mysql_query("SELECT * FROM room WHERE room_number = '{$room_number}'");
		$row = mysql_fetch_object($sql);
		
	}
	
	if(isset($_POST['submit']))
		{
				$sqledit = "UPDATE room
									SET room_number   = '{$_POST['room_number']}',
										building_name = '{$_POST['building_name']}',
										department = '{$_POST['department']}',
										room_capacity = '{$_POST['room_capacity']}'
									WHERE room_number = '{$room_number}'";
				    $re = mysql_query($sqledit);
					    if($re)
							{
								$success =  "Successfully Update!!";
								header('location: viewroom.php');
								exit;	
							}
					
		}
	
?>


<script>
	function validateForm() 
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
									<h4 class="title">Update Room Info</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>Room Number</label>
													<select name="room_number" class="form-control" aria-describedby="basic-addon2" required/>
														<option value="<?php echo $room_number;?>"> <?php echo $room_number;?></option>
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
											<div class="col-md-4">
												<div class="form-group">
													<label>Building Name</label>
													
													<select name="building_name" class="form-control" aria-describedby="basic-addon2" required/>
														<option value="<?php echo $building_name;?>"> <?php echo $building_name;?></option>
											<?php 														
													$Qbuilding = mysql_query("SELECT DISTINCT building_name FROM room ORDER BY department");
													while($row_building = mysql_fetch_array($Qbuilding))
													{
											?>
														<option value="<?php echo $row_building['building_name']; ?>"><?php echo $row_building['building_name'] ;?></option>
															  
											<?php 
													}
											?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>Department</label>
													<select name="department" class="form-control" aria-describedby="basic-addon2" required>
														<option value="<?php echo $department;?>"> <?php echo $department;?></option>
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
													<label>Room Capacity</label>
													<input type="number" min="0" name="room_capacity" class="form-control" placeholder="Enter Room Capacity" value="<?php echo $row->room_capacity; ?>">
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