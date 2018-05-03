<?php include('header.php');   ?>

 <script type="text/javascript">
	function searchq(){
		var searchTxt = $("input[name='search']").val();
		
		$.post("teacher_search.php",{searchVal: searchTxt}, function(output){
			$("#output").html(output);
		}); 
	}
 </script>
  <div class="row">
	<div class="col-md-5 col-md-offset-3">
	    <h2 class="page-title text-center text-warning"><b>Search Teacher</b></h2>
	    <form action="teacher_search2.php" method="post">
			<div class="form-group">
			  <label></label>
			  <input name="search" type="text" class="form-control" placeholder="Search By Teacher ID" onkeydown="searchq(); " />
			</div>
		</form>	
	</div>	
</div>	
 
<div id="output">
	
</div>
 
 
  <?php include('footer.php'); ?>
  
  
  
  