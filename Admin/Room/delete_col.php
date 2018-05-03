<?php include_once('../../database.php'); ?>

<?php
	$room_number = $_GET['iddr'];
	$col = $_GET['iddc'];
	
	
    if(isset($_GET['iddr']) && isset($_GET['iddc']))
    {
		$result = mysql_query("delete from col where room_number='$room_number' and col = '$col'");
		if($result)
			{
				header('location: viewcol.php');
			}
			
	}		
	
?>



