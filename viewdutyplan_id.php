
<?php include('header.php'); ?>
<br>
<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="well">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search_id" placeholder="Enter your ID..." 
                                   aria-describedby="basic-addon2" required/>
                            <span class="input-group-btn" id="basic-addon2">
                                <button type="submit" class="btn btn-info btn-block btn-fill" name="search_duty_by_id"><span class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </form>
                </div>
            		
                <div class="card">
                    <div class="row">
                        <div class="col-md-7">
                            <?php
                            if (isset($_POST['search_duty_by_id'])) {
                                $search_id = $_POST['search_id'];
                                $sqlId = mysql_query("SELECT * FROM teacher  WHERE teacher_id = '{$search_id}'");
                                while ($row = mysql_fetch_object($sqlId)) {
                                    $teacher_name = $row->teacher_name;
                                    $teacher_initial = $row->teacher_initial;
                                    $teacher_designation = $row->teacher_designation;
                                    $department = $row->department;
                                    $enrollment = $row->enrollment;
                                    ?>
                                    <table class="table table-responsive">
                                        <tr> 
                                            <td><strong>Name : </strong></td>
                                            <td><?php echo $teacher_name; ?></td>
                                        </tr>
                                        <tr> 
                                            <td><strong>Initial : </strong></td>
                                            <td><?php echo $teacher_initial; ?></td>
                                        </tr>
                                        <tr> 
                                            <td><strong>Designation : </strong></td>
                                            <td><?php
                                                if ($teacher_designation == 1) {
                                                    echo "Lecturer";
                                                }
                                                if ($teacher_designation == 2) {
                                                    echo "Sr. Lecturer";
                                                }
                                                if ($teacher_designation == 3) {
                                                    echo "Ast. Professor";
                                                }
                                                ?></td>
                                        </tr>
                                        <tr> 
                                            <td><strong>Department : </strong></td>
                                            <td><?php echo $department; ?></td>
                                        </tr>
                                        <tr> 
                                            <td><strong>Enrollment : </strong></td>
                                            <td><?php echo $enrollment; ?></td>
                                        </tr>
                                        <?php
                                        $sqlCountdutydate = mysql_query("SELECT COUNT(id) as totalduty FROM room_allot  WHERE teacher1 = '{$search_id}' OR teacher2 = '{$search_id}' ORDER BY date, slot ASC");
                                        while ($row = mysql_fetch_object($sqlCountdutydate)) {
                                            $totalduty = $row->totalduty;
                                        }
                                        ?>
                                        <tr> 
                                            <td><strong>Total No. of Duty : </strong></td>
                                            <td><?php echo $totalduty; ?></td>
                                        </tr>

                                    </table>
                                </div>	
                            </div>	
                            <div class="header">
                                <h4 class="title">Duty List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <tr class="info">
                                        <th><strong>Date</strong></th>
                                        <th><strong>Slot</strong></th>
                                        <th><strong>Exam Starts</strong></th>
                                        <th><strong>Exam Ends</strong></th>
                                        <th><strong>Room No.</strong></th>
                                    </tr>
                                    <?php
                                }

                                $sqldutydate = mysql_query("SELECT DISTINCT date FROM room_allot  WHERE (teacher1 = '{$search_id}' OR teacher2 = '{$search_id}') ORDER BY date, slot ASC");
                                while ($row = mysql_fetch_object($sqldutydate)) {
                                    $date = $row->date;
                                    $count = 0;
                                    $slot = array();
                                    $room = array();
                                    $sqlroom = mysql_query("SELECT * FROM room_allot  WHERE (teacher1 = '{$search_id}' OR teacher2 = '{$search_id}') AND date = '{$date}' ORDER BY date, slot ASC");
                                    while ($row = mysql_fetch_object($sqlroom)) {
                                        $slot[] = $row->slot;
                                        $room[] = $row->room_number;
                                        $count++;
                                    }
                                    //echo $count;
                                    ?>			
                                    <tr>

                                        <td rowspan="<?php echo $count + 1; ?>"><?php echo date("d-M-Y", strtotime($date)); ?></td>
                                        <?php
                                        for ($i = 0; $i < $count; $i++) {
                                            ?>
                                        <tr>
                                            <td rowspan="1"><?php echo $slot[$i]; ?></td>
                                            <?php
                                            $sqlslot = mysql_query("SELECT * FROM slot  WHERE slot = '{$slot[$i]}'");
                                            while ($row = mysql_fetch_object($sqlslot)) {
                                                $f = strtotime($row->timefrom);
                                                $t = strtotime($row->timeto);
                                                $from = date("h:i", $f);
                                                $to = date("h:i", $t);
                                            }
                                            ?>
                                            <td rowspan="1"><?php echo $from; ?></td>
                                            <td rowspan="1"><?php echo $to; ?></td>
                                            <td rowspan="1"><?php echo $room[$i]; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tr>
                                    <?php
                                }
                            }
                            ?>	


                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('footer.php'); ?>