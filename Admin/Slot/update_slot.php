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
				$sqledit = "UPDATE slot
									SET timefrom   = '{$_POST['start']}',
										timeto = '{$_POST['end']}'
									WHERE slot = '{$_POST['slot']}'";
				    $re = mysql_query($sqledit);
					    if($re)
							{
								$success =  "Successfully Update!!";	
							}
					
		}
	
?>



 <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
	
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
					<form action="" method="post">
						<div class="col-md-8">
							<div class="card">
								<div class="header">
									<h4 class="title">Update Slot Info</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Slot</label>
													<select name="slot" class="form-control" required>
														<option> </option>
											<?php 														
													$Qslot = mysql_query("SELECT * FROM slot ORDER BY slot");
													while($row_slot = mysql_fetch_array($Qslot))
													{
											?>
														<option value="<?php echo $row_slot['slot']; ?>"><?php echo $row_slot['slot'] ;?></option>
															  
											<?php 
													}
											?>
													</select>
												</div>
											</div>
											<div class="col-md-8">
												<label>Duration</label>
												<div class="row"> 
													<div class="col-md-6">
														<div class="form-group">
															<input type="time" name="start" class="form-control" placeholder="start" required/>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="time" name="end" class="form-control" placeholder="end" required/>
														</div>
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