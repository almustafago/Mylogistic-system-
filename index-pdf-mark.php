<?Php
session_start();
$ucode = $_SESSION['u_id'];
$uname = $_SESSION['login'];
 $state = $_SESSION['status'];
 $code =  $_SESSION['u_val'];
 $group = $_SESSION['group_id'];
mysql_connect('localhost','root','');
	mysql_select_db('bolog2');
	$img = '';
 $query = "SELECT * FROM tbl_images where id = '$code'";  
                $result = mysql_query( $query);  
                while($row2 = mysql_fetch_array($result))  
                {  
                    $de ='data:image/jpeg;base64,'.base64_encode($row2['name'] ).'';  
					 $imageContent = file_get_contents($de);
$path = tempnam(sys_get_temp_dir(), 'prefix');

file_put_contents ($path, $imageContent);

$img = '<img src="' . $path . ' " width="160" height="80" >';

                }  
require "config1.php"; // connection to database 
$today = date("Y-m-d, h:i");
$now1 = date_create($today);
//require('fpdf/fpdf.php');
require_once('TCPDF-master/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

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
//$width_cell=array(20,50,40,40,40);
$pdf->SetFont('dejavusans', '', 12);
$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 


$edge=2; // Gap between line and border , change this value

$pdf->Line($edge, $edge,210-$edge,$edge); // Horizontal line at top
$pdf->Line($edge, 295-$edge,210-$edge,295-$edge); // Horizontal line at bottom
$pdf->Line($edge, $edge,$edge,295-$edge); // Vetical line at left 
$pdf->Line(210-$edge, $edge,210-$edge,295-$edge); // Vetical line at Right

//999999999999999999999999999999

$id=$_GET['print'];  // collect student id from URL 
$count=$dbo->prepare("select * from delevery where o_no='$id'");
$count->bindParam(":id",$id,PDO::PARAM_INT,1);

if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
$pdf->writeHTML($img, true, 0, true, 0, '');
//$pdf->Image('utt.png',3,3);
//$pdf->Image($img);
$pdf->SetFont('dejavusans','BU',20);
$pdf->SetXY(80,40);
$pdf->Cell(30,13,'Order Deatils',0,0,'L',false); // First header column 
$pdf->SetY(60);
$pdf->SetX(24);
$pdf->SetFont('dejavusans','',16);
$pdf->Cell(40,10,'Order Number',1,0,'L',false); 
$pdf->SetFont('dejavusans','',14);
$pdf->Cell(36,10,'   #'.$row->o_no,1,0,'L',false); 
$pdf->SetY(70);
$pdf->SetX(24);
$pdf->SetFont('dejavusans','',16);
$pdf->Cell(20,10,'REF',1,0,'L',true); 
$pdf->SetFont('dejavusans','',14);
$pdf->Cell(40,10,$row->ref,1,0,'L',true); 
$pdf->SetFont('dejavusans','',16);
$pdf->Cell(35,10,'Order Price',1,0,'L',true); 
$pdf->SetFont('dejavusans','',14);
$pdf->Cell(63,10,$row->o_price  ,1,1,'L',true); 
$pdf->SetX(24);
$pdf->SetFont('dejavusans','',16);
$pdf->Cell(20,10,'NAME',1,0,'L',false);  
$pdf->SetFont('dejavusans','',14);
$pdf->Cell(75,10,$row->c_name,1,0,'R',false); 

$pdf->SetFont('dejavusans','',16);
$pdf->Cell(23,10,'Phone',1,0,'L',false); 
$pdf->SetFont('dejavusans','',14);
$pdf->Cell(40,10,$row->c_phone,1,0,'L',false); 

$pdf->SetY(105);
$pdf->Line(10,95,200,95);
$pdf->Line(10,96,200,96);
$pdf->SetXY(30,120);
$pdf->SetFont('dejavusans','',16);
$pdf->Cell(60,10,'Code',1,0,'L',true);  
$pdf->Cell(90,10,'Deatils',1,1,'L',true);  
$pdf->SetFont('dejavusans','',14);
$pdf->SetX(30);
$pdf->SetFont('dejavusans','',14);
$pdf->Cell(60,10,'Address',1,0,'L',false);  
$pdf->Cell(90,10,$row->o_location,1,1,'L',false); 

$pdf->SetX(30);
$pdf->Cell(60,10,'City',1,0,'L',true);  
$pdf->Cell(90,10,$row->city,1,1,'L',true); 

$pdf->SetX(30);
$pdf->Cell(60,10,'Wieght',1,0,'L',false); 
$pdf->Cell(90,10,$row->weight.' Kg',1,1,'L',false); 


$pdf->SetX(30);
$pdf->Cell(60,10,'Number Of Pices',1,0,'L',true); 
$pdf->Cell(90,10,$row->o_pic,1,1,'L',true);
$pdf->SetX(30);
$pdf->Cell(60,10,'Order Price',1,0,'L',false); 
$pdf->Cell(90,10,$row->o_price,1,1,'L',false);
$pdf->SetX(30);
$pdf->Cell(60,10,'Installation Fees',1,0,'L',true); 
$pdf->Cell(90,10,$row->install_fees,1,1,'L',true);
$pdf->SetX(30);
$pdf->Cell(60,10,'Fast Delivery',1,0,'L',false); 
$pdf->Cell(90,10,$row->fastdeliver,1,1,'L',false);
//$pdf->Line(30,190,155,190);
$pdf->SetX(60);
$pdf->Cell(30,10,'Total Price',1,0,'L',true); 
$pdf->Cell(90,10,$row->o_price + $row->fastdeliver + $row->install_fees,1,1,'L',true);
//$pdf->Line(30,239,155,239);
$pdf->SetXY(30,240);
$pdf->Cell(14,10,'Date',0,0,'L',false);
$pdf->Cell(80,10,$today,0,0,'L',false);

$pdf->Cell(120,10,'Signature :...................',0,1,'L',false);
//$pdf->Line(10,263,200,265);
//$pdf->Line(10,264,200,266);
$pdf->SetXY(30,261);
$pdf->Cell(144,10,'Web '.'Site: www.uttrack.com   Phone Number: 123456789  ',0,1,'L',true); 
//$pdf->AddPage();
$pdf->Output();
}else{
print_r($dbo->errorInfo()); 	
}	
?>