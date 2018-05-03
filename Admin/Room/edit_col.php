<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>

<?php 
	
	$room_number = $_GET['ider'];
	$col = $_GET['idec'];
	if(isset($_GET['ider']) && isset($_GET['idec']))
	{
		$sql = mysql_query("SELECT * FROM col WHERE room_number = '{$room_number}' and col = '{$col}'");
		$row = mysql_fetch_object($sql);
		
	}
	
	if(isset($_POST['submit']))
		{
				
				    $re = mysql_query("UPDATE col
									SET room_number   = '{$_POST['room_number']}',
										col = '{$_POST['col']}',
										capacity = '{$_POST['capacity']}'
									WHERE room_number = '{$room_number}' AND col = '{$col}'");
					    if($re)
							{
								$success =  "Successfully Update!!";
								header('location: viewcol.php');
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
									<h4 class="title">Update Column Info</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>Room Number</label>
													
													<select name="room_number" class="form-control" aria-describedby="basic-addon2" required/>
														<option value="<?php echo $room_number;?>"> <?php echo $room_number;?></option>
											<?php 														
													$Qroom = mysql_query("SELECT * FROM room ORDER BY department");
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
													<label>Column</label>
													<input type="number" min="1" name="col" class="form-control" placeholder="Enter Column Number" value="<?php echo $row->col; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											
											<div class="col-md-4">
												<div class="form-group">
													<label>Capacity</label>
													<input type="number" min="0" name="capacity" class="form-control" placeholder="Enter Capacity" value="<?php echo $row->capacity; ?>">
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