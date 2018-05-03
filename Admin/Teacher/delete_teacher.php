<?php include_once('../../database.php'); ?>

<?php
	$teacher_id = $_GET['idd'];
    if(isset($_GET['idd']))
    {
		$teacherresult = mysql_query("delete from teacher where teacher_id='$teacher_id' ");
		if($teacherresult)
			{
				header('location: viewteacher.php');
			}
		
	}		

?>

