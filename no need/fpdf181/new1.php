<?php define('path','fpdf/font/');
require('fpdf/fpdf.php');
if(isset($_REQUEST['submit']))
{
//Connect to your database
//include("conectmysql.php");
$today=date('Y-m-d');
$hostname = "localhost";
$database = "todo";
$username = "";
$password = "";
$conn = mysql_connect($hostname, $username, $password) or die(mysql_error());
mysql_select_db($database, $conn);
//Create new pdf file
$pdf=new FPDF();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles for the actual page
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30, 6, 'Complaint', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Date', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Text', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Polar words', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Source', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$fromdate=$_REQUEST['fromdate'];
$todate=$_REQUEST['todate'];
$result=mysql_query("SELECT * FROM sd WHERE date BETWEEN '$fromdate' AND '$todate'") or die(mysql_error());

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($result))
{
//If the current row is the last one, create new page and print column title
if ($i == $max)
{
$pdf->AddPage();

//print column titles for the current page
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);

$pdf->Cell(30, 6, 'Complaint', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Date', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Text', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Polar words', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Source', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);

//Go to next row
$y_axis = $y_axis + $row_height;

//Set $i variable to 0 (first row)
$i = 0;
}

$complainant = $row['complainant'];
$date = $row['date'];
$complainttext = $row['complainttext'];

$complainttitle = $row['complainttitle'];
$polarwords = $row['polarwords'];
$source = $row['source'];
$companyid = $row['companyid'];

$pdf->SetY($y_axis);
$pdf->SetX(25);
$pdf->Cell(30, 6, $complainant, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $date, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $complainttext, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $polarwords, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $source, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $companyid, 1, 0, 'R', 1);
//	$pdf->Cell(30, 6, $companyid, 1, 0, 'R', 1);

//Go to next row
$y_axis = $y_axis + $row_height;
$i = $i + 1;
}

//Create file
$pdf->Output('report.pdf','F');
/*
if($pdf->Output('report.pdf','F'))
{
echo "Report Created Successfyully CLick to view";
}
else
{
echo "failed to create Report";
}*/
}
?>






<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM toy");
$header = $db_handle->runQuery("SELECT `COLUMN_NAME` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='blog_samples' 
    AND `TABLE_NAME`='toy'");

require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);		
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(90,12,$column_heading,1);
}
foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(90,12,$column,1);
}
$pdf->Output();
?>


--
-- Table structure for table `toy`
--

CREATE TABLE IF NOT EXISTS `toy` (
  `Name` varchar(55) NOT NULL,
  `Type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toy`
--

INSERT INTO `toy` (`Name`, `Type`) VALUES
('Ben 10 Watch', 'Battery Toys'),
('Angry Birds Gun', 'Mechanical Toys'),
('Remote Car', 'Remote Toys'),
('Uno Cards', 'Card Game'),
('Keyboard', 'Musical Toys'),
('Jigsaws', 'Board Game');




