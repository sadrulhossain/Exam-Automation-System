<?php include('header.php'); ?>


<style type="text/css">
	.filterable {
		margin-top: 15px;
	}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
	}
.filterable .filters input[disabled] {
		background-color: transparent;
		border: none;
		cursor: auto;
		box-shadow: none;
		padding: 0;
		height: auto;
	}
.filterable .filters input[disabled]::-webkit-input-placeholder {
		color: #333;
	}
.filterable .filters input[disabled]::-moz-placeholder {
		color: #333;
	}
.filterable .filters input[disabled]:-ms-input-placeholder {
		color: #333;
	}

</style>



<div class="container">
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">List</h3>

            </div>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Room Number</th>
                    <th>Building Name</th>
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
								$room_capacity = $row->room_capacity;


					?>	
								
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $room_number; ?> </td>
								<td><?php echo $building_name; ?></td>
								<td><?php echo $room_capacity; ?></td>
								<td>
									<a href='edit_room.php?ide=<?php echo $room_number;?>'><button type='button' class='btn btn-info'>Edit</button></a>
									<a onclick='return confirm_delete();' href='delete_room.php?idd=<?php echo $room_number; ?>'><button type='button' class='btn btn-danger'>Delete</button></a>
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
<script>
	function confirm_delete(){
			return confirm("Are you sure to delete thid data.");
		}
</script>

<?php include('footer.php'); ?>