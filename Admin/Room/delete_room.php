<?php include_once('../../database.php'); ?>

<?php
	$room_number = $_GET['idd'];
	
    if(isset($_GET['idd']))
    {
		$result = mysql_query("delete from room where room_number='$room_number' ");
		if($result)
			{
				header('location: viewroom.php');
			}
			
	}		
	
?>



