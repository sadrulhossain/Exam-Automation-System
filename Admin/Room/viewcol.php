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
                                <h4 class="title">Column List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <thead>
									    <th>#</th>
										<th>Room Number</th>
										<th>Column</th>
										<th>Capacity</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
							<?php 
								$serial = 0;
								$sql = mysql_query("SELECT * FROM col ORDER BY room_number, col ASC");
								while($row = mysql_fetch_object($sql))	
									{
										$serial++;	
										
										$room_number = $row->room_number;
										$col = $row->col;
										$capacity = $row->capacity;

							?>	
										
									<tr>
										<td><?php echo $serial; ?></td>
										<td><?php echo $room_number; ?> </td>
										<td><?php echo $col; ?></td>
										<td><?php echo $capacity; ?></td>
										<td>
											<a href='edit_col.php?ider=<?php echo $room_number;?>&&idec=<?php echo $col;?>'><button type='button' class='btn btn-info'><span class="fa fa-pencil"></span></button></a>
											<a onclick='return confirm_delete();' href='delete_col.php?iddr=<?php echo $room_number; ?>&&iddc=<?php echo $col;?>'><button type='button' class='btn btn-danger'><span class="fa fa-trash"></span></button></a>
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