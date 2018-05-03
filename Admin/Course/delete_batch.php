<?php include_once('../../database.php'); ?>

<?php
	$department = $_GET['iddd'];
	$batch = $_GET['iddb'];
	$section = $_GET['idds'];
	
	
    if(isset($_GET['iddd']) && isset($_GET['iddb']) && isset($_GET['idds']))
    {
		$result = mysql_query("delete from batch 
		where department = '$department' and batch = '$batch' and section = '$section'");
		if($result)
			{
				header('location: viewbatch.php');
			}
			
	}			
	
?>



