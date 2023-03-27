<?php
require_once('connect.php');

define('FPDF_FONTPATH','font/');
require("fpdf/fpdf.php");
class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    // $this->Image('picha/MANYARA SACCOS.png',5,5,35,35);
	 //Logo
    // $this->Image('picha/MANYARA SACCOS.png',170,5,35,35);
    //Arial bold 15
    $this->SetFont('Arial','B',6);
    // Move to the right
    $this->Cell(80);

    //Line break
    $this->Ln(20);
}
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);

	$this->SetFont('Arial','I',7);
    $this->Cell(25,10,'Parliamentary Bill Voting System',0,0,'C');


    //Arial italic 8
  $this->SetFont('Arial','I',7);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().' / {nb}',0,0,'C');

	$this->SetFont('Arial','I',7);
	$this->Cell(-30,10, 'Parliamentary Bill Voting System @roja',0,0,'C');
}
}
//HEADING, PAGE AND PAGE SIZE
$y=5;
$x=5;
$max=250;
$newy=8;

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4');

//HEADIING
$pdf->SetFont('Arial','',12);
$pdf->SetY($y);
$pdf->SetX($x);
// $pdf->MultiCell(200,5,"Parliamentary Bill Voting",1,'L');

//COLUMS
$y=$y+5;
$x = 5;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(270, 5, 'LIST OF BILL VOTE RESULT', 0, 0, 'C');
$y = $y + 7;

$x = 5;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(10, 5, 'S/NO ', 1, 0, 'C');

$x =$x+10;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(41, 5, 'DATE ', 1, 0, 'C');

$x = $x + 41;
$pdf->SetX($x);
$pdf->Cell(84, 5, 'BILL ', 1, 0, 'C');

$x = $x + 84;
$pdf->SetX($x);
$pdf->Cell(40, 5, 'TOTAL OF YES', 1, 0, 'C');

$x = $x + 40;
$pdf->SetX($x);
$pdf->Cell(35, 5, 'TOTAL OF NO ', 1, 0, 'C');


$x = $x + 35;
$pdf->SetX($x);
$pdf->Cell(35, 5, 'TOTAL VOTE', 1, 0, 'C');


$x = $x + 35;
$pdf->SetX($x);
$pdf->Cell(35, 5, 'WIN PARCENT', 1, 0, 'C');



// $x = $x + 35;
// $pdf->SetX($x);
// $pdf->Cell(35, 5, '', 1, 0, 'C');

// $x = $x + 35;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(35, 5, 'MARITAL STATUS ', 1, 0, 'C');
// $x = $x + 35;


// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(35, 5, '', 1, 0, 'C');
$x = 5;
$y = $y + 5;

//ROWS
require_once("connect.php");
$selec = "SELECT bill.bdate,result.bid,bill.bname,COUNT(IF(result='YES',1,NULL))AS YESS,COUNT(IF(result='NO',1,NULL))AS NOO,COUNT(result.bid) AS TOTAL,ROUND((COUNT(IF(result='YES',1,NULL))/COUNT(result.bid))*100) AS AVR FROM result,bill WHERE result.bid=bill.bid GROUP by result.bid" ;
$quer = mysqli_query($con,$selec);
$sn = 1;
while($row=mysqli_fetch_array($quer)){
    $prod = $row['bdate'];
    $unity = $row['bname'];
    $quart = $row['YESS'];
    $price = $row['NOO'];
    $detail = $row['TOTAL'];
    $image = $row['AVR'];


    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(10, 5, $sn, 1, 0, 'L');

    $x = $x + 10;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(41, 5, $prod,1, 0, 'L');
    


    // $x = $x + 35;
    // $pdf->SetY($y);
    // $pdf->SetX($x);
    // $pdf->Cell(35, 5,  1, 0, 'L');

    $x = $x + 41;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(84, 5, $unity, 1, 0, 'L');

    $x = $x + 84;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(40, 5, $quart, 1, 0, 'L');


    $x = $x + 40;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(35, 5, $price, 1, 0, 'L');

    $x = $x + 35;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(35, 5, $detail,1, 0, 'L');

    $x = $x + 35;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(35, 5, $image."%",1, 0, 'L');
    $x=5;

    $y = $y + 5;
$sn++;
}
$pdf->Output();




// $y=$y+8;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(200,5,''.$prog,0,0,'C');
// $y=$y+8;

// $acyr=$_SESSION['acyr'];
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(200,5,"SEMESTER ".$sem." -".$acyr,0,0,'C');
// $y=$y+10;

// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(200,5,"CONTINUOUS ASSESSMENT RESULTS FOR ".$sub,0,0,'C');
// $y=$y+10;
// $y=$y+15;
// $dateb=date('D d M Y h:i:s A');
// $xv=15;
// $pdf->SetFont('Arial','',7);
// $pdf->SetY($y);
// $pdf->SetX($xv);
// $pdf->Cell(200,5,'Print Time :'.$dateb,0,0,'L');
// $y=$y+15;
// $x=5;
// $pdf->SetFillColor(204,205,127);
// $pdf->SetFont('Arial','B',10);
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(10,7,'Sno',1,0,'L','1');
// $x=$x+10;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(60,7,'Fullname',1,0,'L','1');
// $x=$x+60;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(40,7,'Email',1,0,'L','0');
// $x=$x+40;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(60,7,'Phone',1,0,'L','1');
// $k=1;
// $pdf->SetFont('Arial','',10);
