
<?php include('database.php'); ?>
<?php

require('assets/fpdf/fpdf.php');

$department = $_GET['iddept'];
$date = $_GET['iddt'];
$slot = $_GET['ids'];
if (isset($_GET['iddept']) && isset($_GET['iddt']) && isset($_GET['ids'])) {
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetMargins(20, 15, 20);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(190, 10, 'Daffodil Internatinal University', 0, 0, 'C', 0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(170, 8, 'Final Examination, Fall`' . date("y", strtotime($date)), 0, 0, 'C', 0);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(170, 8, 'Seat Plan for Students', 0, 0, 'C', 0);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(170, 8, 'Department of ' . $department, 0, 0, 'C', 0);
    $pdf->Ln(8);
    $Qtime = mysql_query("SELECT * FROM slot WHERE slot = '{$slot}'");
    while ($row_time = mysql_fetch_object($Qtime)) {
        $f = strtotime($row_time->timefrom);
        $t = strtotime($row_time->timeto);
        $from = date("h:i", $f);
        $to = date("h:i", $t);
    }
    $roomc = 0;
    $room_avail = array();
    $sqlroom = mysql_query("SELECT DISTINCT room_number FROM studentseat 
					WHERE department = '{$department}' AND date = '{$date}' AND slot = '{$slot}'
					ORDER BY department, date, slot, room_number ASC ");
    while ($row_room = mysql_fetch_object($sqlroom)) {
        $room_avail[] = $row_room->room_number;
        $roomc++;
    }
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(170, 8, 'Date: ' . date("d-M-Y", strtotime($date)), 0, 0, 'C', 0);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(90, 8, 'Slot: ' . $slot, 0, 0, 'R', 0);
    $pdf->Cell(80, 8, '(Time: ' . $from . '-' . $to . ')', 0, 0, 'C', 0);
    $pdf->Ln(30);
    for ($i = 0; $i < $roomc; $i++) {
        $room = $room_avail[$i];
        $sqlinv = mysql_query("SELECT * FROM room_allot 
				WHERE room_number = '{$room}' AND department = '{$department}'
				AND date = '{$date}' AND slot = '{$slot}'");
        while ($row_inv = mysql_fetch_object($sqlinv)) {
            $teacher1id = $row_inv->teacher1;
            $teacher2id = $row_inv->teacher2;
        }
        $sqlinv1 = mysql_query("SELECT * FROM teacher 
					WHERE department = '{$department}' AND teacher_id = '{$teacher1id}'");
        while ($row_inv1 = mysql_fetch_object($sqlinv1)) {
            $teacher1 = $row_inv1->teacher_initial;
        }
        $sqlinv2 = mysql_query("SELECT * FROM teacher 
			WHERE department = '{$department}' AND teacher_id = '{$teacher2id}'");
        while ($row_inv2 = mysql_fetch_object($sqlinv2)) {
            $teacher2 = $row_inv2->teacher_initial;
        }
        $clc = 0;
        $rcol = array();
        $rcap = array();
        $rcrs = array();
        $rbatch = array();
        $rsection = array();
        $rcrst = array();
        $sqlcol = mysql_query("SELECT * FROM studentseat 
					WHERE department = '{$department}' AND room_number= '{$room}' 
						AND date = '{$date}' AND slot = '{$slot}'
						ORDER BY department, room_number, col ASC");
        while ($row_col = mysql_fetch_object($sqlcol)) {
            $rcol[] = $row_col->col;
            $rcap[] = $row_col->capacity;
            $rcrs[] = $row_col->course_id;
            $rbatch[] = $row_col->batch;
            $rsection[] = $row_col->section;
            $rcrst[] = $row_col->courseteacher;
            $clc++;
        }
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(170, 8, 'Room ' . $room . '(' . $teacher1 . ', ' . $teacher2 . ')', 0, 0, 'C', 0);
        $pdf->Ln(8);
        for ($j = 0; $j < $clc; $j++) {
            $colspan = ceil(170 / ($clc));
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell($colspan, 8, 'Col ' . $rcol[$j], 1, 0, 'C', 0);
        }

        $pdf->Ln(8);
        for ($j = 0; $j < $clc; $j++) {

            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell($colspan, 16, $rcrs[$j], 1, 0, 'C', 0);
        }
        $pdf->Ln(8); /*
          for($j = 0; $j < $clc; $j++){
          $sqlcrs = 	mysql_query("SELECT * FROM course
          WHERE department = '{$department}' AND
          course_id = '{$rcrs[$j]}' AND batch = '{$rbatch[$j]}'");
          while($row_crs = mysql_fetch_object($sqlcrs)){
          $course = $row_crs->course_name;
          }
          //$course = token($token);
          $pdf->SetFont('Arial','', 8);
          $pdf->Cell($colspan, 16, $course, 1, 0, 'C', 0);
          }
          $pdf->Ln(16); */
        for ($j = 0; $j < $clc; $j++) {
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell($colspan, 8, $rsection[$j], 0, 0, 'C', 0);
        }
        $pdf->Ln(8);
        for ($j = 0; $j < $clc; $j++) {
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell($colspan, 8, $rcrst[$j], 1, 0, 'C', 0);
        }
        $pdf->Ln(8);
        for ($j = 0; $j < $clc; $j++) {
            $pdf->SetFont('Arial', '', 8);
            $pdf->Cell($colspan, 8, $rcap[$j], 1, 0, 'C', 0);
        }
        $pdf->Ln(24);
    }
    $pdf->Output();
}
?>