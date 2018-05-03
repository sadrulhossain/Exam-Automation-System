<?php include('header.php'); ?>
<?php include('database.php'); ?>

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
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Teacher Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Teacher Id" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Teacher initial" disabled></th>
						<th><input type="text" class="form-control" placeholder="Teacher designation" disabled></th>
						<th><input type="text" class="form-control" placeholder="Department" disabled></th>
						<th><input type="text" class="form-control" placeholder="Enrollment" disabled></th>
						<th><input type="text" class="form-control" placeholder="Enrollment" disabled></th>
                    </tr>
                </thead>
                <tbody>
					<?php 
						$serial = 0;
						$sql = mysql_query("SELECT * FROM teacher ORDER BY  department,teacher_designation  ASC");
						while($row = mysql_fetch_object($sql))	
							{
								$serial++;	
								
								$teacher_name = $row->teacher_name;
								$teacher_id = $row->teacher_id;
								$teacher_initial = $row->teacher_initial;
								$teacher_designation = $row->teacher_designation;
								$department = $row->department;
								$enrollment = $row->enrollment;

					?>	
								
							<tr>
								<td><?php echo $serial; ?></td>
								<td><?php echo $teacher_name; ?> </td>
								<td><?php echo $teacher_id; ?></td>
								<td><?php echo $teacher_initial; ?></td>
								<td><?php echo $teacher_designation; ?></td>
								<td><?php echo $department; ?></td>
								<td><?php echo $enrollment; ?></td>
								<td>
									<a href='edit_teacher.php?ide=<?php echo $teacher_id;?>'><button type='button' class='btn btn-info'>Edit</button></a>
									<a onclick='return confirm_delete();' href='delete_teacher.php?idd=<?php echo $teacher_id; ?>'><button type='button' class='btn btn-danger'>Delete</button></a>
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