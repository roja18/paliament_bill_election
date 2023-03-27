<?php
error_reporting(E_ALL); ini_set('display_errors', 'Off');
require_once("connect.php");

//connect to db
require_once("connect.php");

//set filename
$title.$filename="report.xls";
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("roja the master mind")
							 ->setLastModifiedBy("roja the master mind")
							 ->setTitle("roja the master mind")
							 ->setSubject("roja the master mind")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");
//set font size for the whole document
//$objPHPExcel->getActiveSheet()->getStyle("F1:G1")->getFont()->setSize(16);//for some cells
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Bill vote system')
->setCellValue('A2', 'list of Bill')
->setCellValue('A3','Sno')
->setCellValue('B3','Date')
->setCellValue('C3','BIll')
->setCellValue('D3','Yes')
->setCellValue('E3','No')
->setCellValue('F3','Total')
->setCellValue('G3','parcent');

//align right
 $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->applyFromArray($style);
//align center
$stylecenter = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$objPHPExcel->getActiveSheet()->getStyle("A2:G2")->applyFromArray($style);
//bold
$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->getFont()->setBold(true);
//look for results and display them
$sql="SELECT bill.bdate,result.bid,bill.bname,COUNT(IF(result='YES',1,NULL))AS YESS,COUNT(IF(result='NO',1,NULL))AS NOO,COUNT(result.bid) AS TOTAL,ROUND((COUNT(IF(result='YES',1,NULL))/COUNT(result.bid))*100) AS AVR FROM result,bill WHERE result.bid=bill.bid GROUP by result.bid";
    $result=mysqli_query($con,$sql);
 
	$k=1;
	$dz=1;
	$row=4;
	while($rows=mysqli_fetch_array($result))
	{
			//Data
            $prod = $rows['bdate'];
            $unity = $rows['bname'];
            $quart = $rows['YESS'];
            $price = $rows['NOO'];
            $detail = $rows['TOTAL'];
            $image = $rows['AVR'];
			 //$dis=$ca.'-'.$final.'-'.$total.'-'.$level1;
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $k);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $prod);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $unity);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $quart);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $price);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $detail);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $image);
            $k++;
			$row++;
			}
	//set auto width in cells
	foreach(range('A','G') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}
foreach(range('A3','G3') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}
//applyborders
$applyborders = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($applyborders);
//$objPHPExcel->getActiveSheet()->getStyle('A7:J7')->applyFromArray($applyborders);
//$objPHPExcel->getActiveSheet()->getStyle('A8:J8')->applyFromArray($applyborders);//
//unset($styleArray);
$objPHPExcel->getActiveSheet()->getStyle(
    'A4:' . 
    $objPHPExcel->getActiveSheet()->getHighestColumn() . 
    $objPHPExcel->getActiveSheet()->getHighestRow()
)->applyFromArray($applyborders);

//merge cells
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:G1');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:G2');




// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Certificates');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

ob_end_clean();
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='.$filename);
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
