<?php include('../database.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Exam Automation System</title>
	<link rel="icon" type="image" href="../assets/img/exam-icon.ico"/>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Style core CSS     -->
    <link href="../assets/css/style.css" rel="stylesheet" />
	
	<!-- JQuery UI core CSS     -->
    <link href="../assets/css/jquery-ui.css" rel="stylesheet" />
	<link href="../assets/css/jquery-ui.structure.css" rel="stylesheet" />
	<link href="../assets/css/jquery-ui.theme.css" rel="stylesheet" />
	
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
	
	<link href="../assets/css/bootstrap-iso.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.css" />
	
    <script src="../assets/js/jquery-2.2.1.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var date_input=$('input[type="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
		showOn: 'both',
		changeMonth: true,
		changeYear: true
      };
      date_input.datepicker(options);
		});
	</script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-2.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Exam Automation System
                </a>
            </div>

            <ul class="nav">
				<li class="active">
                    <a href="dashboard.php">
                        <i class="fa fa-hand-rock-o" aria-hidden="true"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
				<li>
					<a href="../Admin/dashboard.php">
						<i class="fa fa-eye" aria-hidden="true"></i>
						<p>Admin</p>
					</a>
				</li>
				<li>
					<a href="TeacherSeat.php">
						<i class="fa fa-bar-chart" aria-hidden="true"></i>
						<p>Teacher Duty Plan</p>
					</a>
				</li>		
                
				<li>
                    <a href="preview.php">
                        <i class="fa fa-eye"></i>
                        <p>Preview</p>
                    </a>
                </li>
				<li>
                    <a href="clearPlan.php">
                        <i class="fa fa-refresh"></i>
                        <p>Clear Plan</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel" >
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" class="btn btn-info btn-fill pull-right">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>