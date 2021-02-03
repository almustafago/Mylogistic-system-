<?Php
 header ('Content-Type: text/html; charset=UTF-8'); 
//echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />'; 
require "config1.php"; // connection to database 
//$database = new Database();
$deleteCb = $_POST['deleteCb'];
$today = date("Y-m-d");

//require('fpdf/fpdf.php');
require_once('TCPDF-master/tcpdf.php');
//$pdf = new FPDF(); 
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 018');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 018', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = '';
$lg['a_meta_language'] = 'en';
$lg['w_page'] = 'page';


// set some language-dependent strings (optional)
$pdf->setLanguageArray($lg);
$pdf->AddPage();

$width_cell=array(25,25,59,27,27,27);
$pdf->SetFont('Arial','BU',20);
$pdf->SetXY(74,10);
$pdf->Cell(61,10,'My Orders' ,0,0,'L',false); // First header column
$pdf->Cell(30,10,'' ,0,1,'L',false); // First header column
$pdf->SetFont('Arial','',9);

$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
//$pdf->Cell('NO');
$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'Ref',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[2],10,'O_Number',1,0,'C',true); // Second header column
//$pdf->Cell($width_cell[2],10,'Name',1,0,'C',true); // Third header column 
//$pdf->Cell($width_cell[3],10,'Email',1,0,'C',true); // Fourth header column
$pdf->Cell($width_cell[3],10,'Phone',1,0,'C',true); // Third header column 
//$pdf->Cell($width_cell[3],10,'Address',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[4],10,'O_Price',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[4],10,'Driver',1,1,'C',true); // Third header column 
//// header ends ///////

$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 
$total=0;
$deb = 0;
for($i=0; $i<count($deleteCb); $i++){
	$news_id = $deleteCb[$i];
$count="select * from delevery where o_no = '$news_id' "; // SQL to get 10 records 
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
/// each record is one row  ///
foreach ($dbo->query($count) as $row) {
	$age = $row['o_no'] + 3;
$pdf->Cell($width_cell[0],10,$i+1,1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['ref'],1,0,'C',$fill);
$pdf->Cell($width_cell[2],10,$row['o_no'],1,0,'C',$fill);
//$pdf->Cell($width_cell[2],10,$row['c_name'],1,0,'R',$fill);
//$pdf->Cell($width_cell[3],10,$row['email'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['c_phone'],1,0,'C',$fill);
//$pdf->Cell($width_cell[4],10,$row['o_location'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['o_price'],1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['driver'],1,1,'C',$fill);
$fill = !$fill; // to give alternate background fill  color to rows
$deb += $row['o_price'];





}


}
/// end of records /// 
$pdf->SetFillColor(193,229,252); // Background color of header 
$pdf->SetX(15);
$pdf->Cell(9,10,'Date:',0,0,'L',false);
$pdf->Cell(80,10,$today,0,0,'L',false);
$pdf->SetX(129);
$pdf->Cell(24,10,'Sign ...............................................',0,0,'L',false); 
$pdf->Output();
?>