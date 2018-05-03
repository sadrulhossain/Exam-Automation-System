<?php include_once('../../database.php'); ?>

<?php
	$department = $_GET['idddep'];
	$course_id = $_GET['iddcrs'];
	$batch = $_GET['iddb'];
	
	
    if(isset($_GET['idddep']) && isset($_GET['iddcrs']) && isset($_GET['iddb']))
    {
		$result = mysql_query("delete from course 
		where department = '$department' and course_id = '$course_id' and batch = '$batch'");
		if($result)
			{
				header('location: viewcourse.php');
			}
			
	}	
	
?>



