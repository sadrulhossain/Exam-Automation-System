<?php 
	error_reporting(0);
	$conn = mysql_connect("localhost", "root", "");
	
	if($conn)
		{
			mysql_select_db("finalproject", $conn);
		}
?>