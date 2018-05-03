<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>
<?php include('../database.php'); ?>

<?php 
	
	
	
	if(isset($_POST['clear_seatplan']))
		{
			$sqlclear_plan = mysql_query("DELETE FROM studentseat 
											WHERE department = '{$_POST['department']}'");
					
		}
	
?>




    <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
    

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <form action="" method="post">
                <div class="col-md-8">
                    <div class="well">
                        <div class="header">
                            <h4 class="title text-center text-primary">Clear Seat Plan</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Select Department:</label>
                                    <div class="input-group">
                                        <select name="department" class="form-control" aria-describedby="basic-addon2" required>
                                            <option> </option>
<?php
$Qdepartment = mysql_query("SELECT * FROM department ORDER BY department");
while ($row_department = mysql_fetch_array($Qdepartment)) {
    ?>
                                                <option value="<?php echo $row_department['department']; ?>"><?php echo $row_department['department']; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="input-group-btn" id="basic-addon2">
                                            <button type="submit" class="btn btn-info btn-fill" name="clear_seatplan">Clear Seat Plan</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </form>	
        </div>	
    </div>
</div>    <!--jQuery -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    


<?php include('footer.php'); ?>