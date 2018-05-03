<?php include_once('../../database.php'); ?>

<?php
	$department = $_GET['idddep'];
	$course_id = $_GET['iddcrs'];
	$batch = $_GET['iddb'];
	$course_teacher = $_GET['iddct'];
	$section = $_GET['idds'];
	
	
    if(isset($_GET['idddep']) && isset($_GET['iddcrs']) && isset($_GET['iddb']) && isset($_GET['iddct']) && isset($_GET['idds']))
    {
		$result = mysql_query("delete from courseteacher 
		where department = '$department' and course_id = '$course_id' and batch = '$batch' and course_teacher = '$course_teacher' and section = '$section'");
		if($result)
			{
				header('location: viewcourseteacher.php');
			}
			
	}	
	
?>



