<?php
session_start();
if (!isset($_SESSION['userid'])) {
header('Location: login.php');
}
?>
<?php include('header.php'); ?>
<?php
if (isset($_POST['search_course'])) {
    //department
    $department = $_POST['department'];
}


if (isset($_POST['add_in'])) {

    $dsql = mysql_query("SELECT * FROM courseteacher 
		WHERE course_id = '{$_POST['course_id']}' AND batch = '{$_POST['batch']}'
		AND department = '{$_POST['department']}' AND section = '{$_POST['section']}' AND course_teacher = '{$_POST['crst_initial']}' ");
    if (mysql_num_rows($dsql) > 0) {
        $success1 .= "'{$_POST['crst_initial']}' Is Already The Course Teacher Of Course '{$_POST['course_id']}' Of Section'{$_POST['section']}' Of '{$_POST['batch']}' Batch Of '{$_POST['department']}' Department !";
    } else {
        $sql = mysql_query("INSERT INTO courseteacher(course_id, batch, department, section, course_teacher)
													VALUES('{$_POST['course_id']}',  
														   '{$_POST['batch']}',
														   '{$_POST['department']}',
														   '{$_POST['section']}',
														   '{$_POST['crst_initial']}') ");


        if ($sql) {
            $success = "Successfully Insert!!";
            ;
        }
    }
}
?>
<style type="text/css">
    .success{
        color: green;
        font-size: 20px;
    }
    .success1{
        color: red;
        font-size: 20px;
    }
    .well{
        margin-bottom: 40px;
    }
</style>
<script>
    /* function validateForm() 
     {
     var x = document.forms["myform"]["teacher_name"].value;
     if (x == null || x == "") {
     alert("Name must be filled out");
     return false;
     }
     
     var Z = document.forms["myform"]["teacher_initial"].value;
     if (Z == null || Z == "") {
     alert("Initial must be filled out");
     return false;
     }
     
     var Y = document.forms["myform"]["teacher_id"].value;
     if (Y == null || Y == "") {
     alert("ID must be filled out");
     return false;
     }
     
     var P = document.forms["myform"]["teacher_designation"].value;
     if (P == null || P == "") {
     alert("Designation must be filled out");
     return false;
     }
     
     var Q = document.forms["myform"]["department"].value;
     if (Q == null || Q == "") {
     alert("Department must be filled out");
     return false;
     }
     var R = document.forms["myform"]["enrollment"].value;
     if (R == null || R == "") {
     alert("Enrollment must be filled out");
     return false;
     }
     } */
</script>


<link href="../../assets/css/jasny-bootstrap.min.css" rel="stylesheet" />

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
				<div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title text-center text-primary">Add Course Teacher</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Select Department:</label>
                                    <div class="input-group">
                                        <select name="department" class="form-control" aria-describedby="basic-addon2" required>
                                            <option>Department </option>
<?php
$Qdepartment = mysql_query("SELECT * FROM department ORDER BY department");
while ($row_department = mysql_fetch_array($Qdepartment)) {
    ?>
                                                <option value="<?php echo $row_department['department']; ?>"><?php echo $row_department['department']; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="input-group-btn" id="basic-addon2">
                                            <button type="submit" class="btn btn-info btn-fill" name="search_course"><span class="fa fa-search"></span></button>
                                        </span>
                                    </div>

                                </div>
                            </div>

                            </form>					
                            <div class="col-md-12"></div>
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="bootstrap-iso">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Department:</label>
                                                <input type="text" name="department" class="form-control" value="<?php echo $department; ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Course ID:</label>
                                                <select name="course_id" class="form-control" aria-describedby="basic-addon2" required/>
                                                <option>Course ID </option>
<?php
$Qcourse = mysql_query("SELECT DISTINCT course_id FROM course WHERE department = '$department' ORDER BY course_id");
while ($row_course = mysql_fetch_array($Qcourse)) {
    ?>
                                                    <option value="<?php echo $row_course['course_id']; ?>"><?php echo $row_course['course_id']; ?></option>

                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Batch:</label>
                                                <select name="batch" class="form-control" aria-describedby="basic-addon2" required>
                                                    <option>Batch </option>
<?php
$Qcourse = mysql_query("SELECT DISTINCT batch FROM course WHERE department = '$department' ORDER BY batch");
while ($row_course = mysql_fetch_array($Qcourse)) {
    ?>
                                                        <option value="<?php echo $row_course['batch']; ?>"><?php echo $row_course['batch']; ?></option>

    <?php
}
?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function () {

                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Section:</label>
                                                <input type="text" name="section"  class="form-control" placeholder="Enter Section" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Course Teacher Initial:</label>
                                                <input type="text" name="crst_initial"  class="form-control" placeholder="Enter Teacher Initial" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <button name="add_in" type="submit" class="btn btn-info btn-fill pull-right">Add Course Teacher</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                        </div>
                    </div>
            </form>
            <div class="row"><div class="col-md-3"><?php echo $success; ?></div></div>
            <div class="row"><div class="col-md-6"><?php echo $success1; ?></div></div>
        </div>
		<div class="col-md-3"></div>
    </div>
</div>



</div>					
</div>
</div>
<!--jQuery -->
    <script src="../../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../../assets/js/jasny-bootstrap.min.js" type="text/javascript"></script>

<?php include('footer.php'); ?>
