<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>

<style type="text/css">

.table > thead > tr > th, 
.table > tbody > tr > th, 
.table > tfoot > tr > th, 
.table > thead > tr > td, 
.table > tbody > tr > td, 
.table > tfoot > tr > td {
        padding: 0px 0px;
        padding-top: 8px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        vertical-align: middle;
}
</style>
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Room List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <thead>
									    <th>#</th>
										<th>Room Number</th>
										<th>Building Name</th>
										<th>Department</th>
										<th>Room Capacity</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
							<?php 
								$serial = 0;
								$sql = mysql_query("SELECT * FROM room ORDER BY building_name ,room_number ASC");
								while($row = mysql_fetch_object($sql))	
									{
										$serial++;	
										
										$room_number   = $row->room_number;
										$building_name = $row->building_name;
										$department = $row->department;
										$room_capacity = $row->room_capacity;

							?>	
										
									<tr>
										<td><?php echo $serial; ?></td>
										<td><?php echo $room_number; ?> </td>
										<td><?php echo $building_name; ?></td>
										<td><?php echo $department; ?></td>
										<td><?php echo $room_capacity; ?></td>
										<td>
											<a href='edit_room.php?ider=<?php echo $room_number;?>&&ideb=<?php echo $building_name;?>&&ided=<?php echo $department;?>&&iderc=<?php echo $room_capacity;?>'><button type='button' class='btn btn-info'><span class="fa fa-pencil"></span></button></a>
											<a onclick='return confirm_delete();' href='delete_room.php?idd=<?php echo $room_number; ?>'><button type='button' class='btn btn-danger'><span class="fa fa-trash"></span></button></a>
										</td>
									</tr>	
										
							<?php			   
									}
							?>		
						
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

<script>
	function confirm_delete(){
			return confirm("Are you sure to delete this data.");
		}
</script>

<?php include('footer.php'); ?>