
<?php include('database.php'); ?>
<?php 
require('assets/fpdf/fpdf.php');

$department = $_GET['iddept'];
if(isset($_GET['iddept'])){
	$pdf = new FPDF('P', 'mm', 'A4');
	$pdf->AddPage();
	$pdf->SetMargins(20, 15, 20);
	$pdf->SetFont('Arial','B', 15);
	$pdf->Cell(190, 10, 'Daffodil Internatinal University', 0, 0, 'C', 0);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B', 12);
	$pdf->Cell(170, 8, 'Final Examination, Fall`'.date("y"), 0, 0, 'C', 0);
	$pdf->Ln(8);
	$pdf->SetFont('Arial','B', 12);
	$pdf->Cell(170, 8, 'Duty Plan for Invigilators', 0, 0, 'C', 0);
	$pdf->Ln(8);
	$pdf->SetFont('Arial','B', 12);
	$pdf->Cell(170, 8, 'Department of '.$department, 0, 0, 'C', 0);
	$pdf->Ln(16);
	$c = 0;
	$datear = array();
	$Qdate = mysql_query("SELECT DISTINCT date FROM routine WHERE department = '{$department}'");
	while($row_date = mysql_fetch_array($Qdate)){
		$datear[] = $row_date['date'];
		$c++;
	}
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(27, 8, ' ', 0, 0, 'C', 0);
	for($i = 0; $i < $c; $i++){
		$colspan = 128/($c);
		$pdf->SetFont('Arial','', 8);
		$pdf->Cell($colspan, 8, date("d-M", strtotime($datear[$i])), 1, 0, 'C', 0);
	}
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(15, 8, ' ', 0, 0, 'C', 0);
	$pdf->Ln(12);
	
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(7, 8, '#', 1, 0, 'C', 0);
	$pdf->Cell(20, 8, 'Teacher Initial', 1, 0, 'C', 0);
	for($i = 0; $i < $c; $i++){
		$slotspan = $colspan/4;
		$pdf->SetFont('Arial','', 8);
		$pdf->Cell($slotspan, 8, 'A', 1, 0, 'C', 0);
		$pdf->Cell($slotspan, 8, 'B', 1, 0, 'C', 0);
		$pdf->Cell($slotspan, 8, 'C', 1, 0, 'C', 0);
		$pdf->Cell($slotspan, 8, 'D', 1, 0, 'C', 0);
	}
	$pdf->SetFont('Arial','', 8);
	$pdf->Cell(15, 8, 'Enrollment', 1, 0, 'C', 0);
	$pdf->Ln(8);
	
	$serial = 0;
	$sqlList = mysql_query("SELECT * FROM teacher WHERE department = '{$department}' ORDER BY teacher_designation  DESC  ");
	while($row_list = mysql_fetch_object($sqlList)){
		$serial++;
		$teacher_id = $row_list->teacher_id;
		$teacher_initial = $row_list->teacher_initial;
		$teacher_designation = $row_list->teacher_designation;
		$enrollment = $row_list->enrollment;
		$pdf->SetFont('Arial','', 8);
		$pdf->Cell(7, 8, $serial, 1, 0, 'C', 0);
		$pdf->Cell(20, 8, $teacher_initial, 1, 0, 'C', 0);	
												
		for($j = 0; $j < $c; $j++){
			$count = 0;
			$slot = array();
			$sqlslot = mysql_query("SELECT * FROM room_allot  WHERE (teacher1 = '{$teacher_id}' OR teacher2 = '{$teacher_id}') AND  date = '{$datear[$j]}'"); 
			while($row_slot = mysql_fetch_object($sqlslot)){
				$slot[] = $row_slot->slot;
				$count++;
			}
			$slotspan = $colspan/4;
			$pdf->SetFont('Arial','', 8);
			$pdf->Cell($slotspan, 8, A($slot, $count), 1, 0, 'C', 0);
			$pdf->Cell($slotspan, 8, B($slot, $count), 1, 0, 'C', 0);
			$pdf->Cell($slotspan, 8, C($slot, $count), 1, 0, 'C', 0);
			$pdf->Cell($slotspan, 8, D($slot, $count), 1, 0, 'C', 0);
			
		} 
		$pdf->SetFont('Arial','', 8);
		$pdf->Cell(15, 8, $enrollment, 1, 0, 'C', 0);
		$pdf->Ln(8);	
	}
	
	$pdf->Output();
}
function A($slot, $count){
	for($i = 0; $i < $count; $i++){
		if($slot[$i] == 'A'){
			$a .= 'A';
		}
		else{
			$a .= ' ';
		}
	}
	return $a;
}
function B($slot, $count){
	for($i = 0; $i < $count; $i++){
		if($slot[$i] == 'B'){
			$b .= 'B';
		}
		else{
			$b .= ' ';
		}
	}
	return $b;
}
function C($slot, $count){
	for($i = 0; $i < $count; $i++){
		if($slot[$i] == 'C'){
			$c .= 'C';
		}
		else{
			$c .= ' ';
		}
	}
	return $c;
}
function D($slot, $count){
	for($i = 0; $i < $count; $i++){
		if($slot[$i] == 'D'){
			$d .= 'D';
		}
		else{
			$d .= ' ';
		}
	}
	return $d;
}
?>