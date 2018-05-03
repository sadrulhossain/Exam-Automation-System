<?php include('../database.php'); ?>
<?php 
if(isset($_POST['back'])){
	header('location: dashboard.php');
	exit;
}
if(isset($_POST['submit']))
	{   
		$userid = $_POST['userid'];
		$dsql = mysql_query("SELECT * FROM registation WHERE userid = '$userid' ");	
		if(mysql_num_rows ( $dsql ) > 0)
			{
				$success1 =  "$userid Id already exists!";
			}
		else
			{
				$sql = mysql_query("INSERT INTO registation(username, userid, password)
													VALUES('{$_POST['username']}',  
														   '{$_POST['userid']}',
														   '{$_POST['password']}') ");
														   
				
				if($sql)
					{
						$success =  "Successfully Registration!!";
						header('location: dashboard.php');
						exit;
					}
		}	
	}
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image" href="../assets/img/exam-icon.ico"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Exam Automation System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

	<!--  CSS for ont Awesome, don't include it in your project     -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
	
	<!--  CSS for Google font, don't include it in your project     -->
    <link href="../assets/css/font-google.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="../assets/css/jasny-bootstrap.min.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    
    <div class="main-panel bootstrap-iso">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
						<li>
                            <a href="../index.php">
                                Home
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="login.php">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		
 <link href="../assets/css/jasny-bootstrap.min.css" rel="stylesheet" />
       <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="col-md-8">
							<div class="card">
								<div class="header">
									<h4 class="title">Signup Here</h4>
								</div>
								<div class="content">
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>User Name</label>
													<input type="text" name="username" class="form-control" placeholder="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-7">
												<div class="form-group">
													<label>User Id</label>
													<input type="text" name="userid" class="form-control" placeholder="">
												</div>
											</div>
										</div>											
										<div class="row">	
											<div class="col-md-7">
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" class="form-control" placeholder="">
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						
				</div>
						<div class="col-md-8">
							<button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Signup</button>
							<button name="back" type="submit" class="btn btn-primary btn-fill pull-right">Back</button>
							<div class="clearfix"></div>
							<div class="success"><?php echo $success; ?></div>
							<div class="success1"><?php echo $success1; ?></div>							
						</div>
					</form>						
            </div>
        </div>
    <!--jQuery -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>
    
	
 </div>
 




