 <?php include_once('../database.php'); ?>
 
 <style type="text/css">
	.filterable {
		margin-top: 15px;
	}

</style>

	

 <?php  
    $output = '';
	if(isset($_POST['searchVal'])){
		$searchq = $_POST['searchVal'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query = mysql_query("SELECT * FROM room WHERE room_number LIKE '%$searchq%'");
		$count = mysql_num_rows($query);
		if($count == 0){
			$output = 'There are no search result';
		}
		else{
			while($row = mysql_fetch_array($query))
				{
					$room_number    = $row['room_number'];
					$building_name  = $row['building_name'];
					$room_capacity  = $row['room_capacity'];
					
					
					$output .='<div>'.$room_number.' '.$building_name.'</div>';
		

				}
		}
	}
	echo ($output); 
 ?>


		