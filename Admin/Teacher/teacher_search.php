 <?php include_once('../database.php'); ?>
 <?php  
    $output = '';
	if(isset($_POST['searchVal'])){
		$searchq = $_POST['searchVal'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
		
		$query = mysql_query("SELECT * FROM teacher WHERE teacher_id LIKE '%$searchq%'");
		$count = mysql_num_rows($query);
		if($count == 0){
			$output = 'There are no search result';
		}
		else{
			while($row = mysql_fetch_array($query)){
				$teacher_name  = $row['teacher_name'];
				$teacher_id  = $row['teacher_id'];
				$department = $row['department'];
				
				
				$output .='<div>'.$teacher_name.' '.$department.'</div>';
			}
		}
	}
	echo ($output); 
 ?>