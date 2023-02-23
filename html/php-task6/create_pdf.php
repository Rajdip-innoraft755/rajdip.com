<?php
session_start();
$img_path=$_SESSION["img_path"];
$marks=$_SESSION["marks"];
$subject=$_SESSION["subject"];

// require('fpdf/fpdf.php');
require('../vendor/autoload.php');
$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->SetFillColor(224,224,224);
$pdf->setTextColor(0, 0, 254);
$pdf->cell(190,20,"BASIC DETAILS",1,1,'C',true);
$pdf->Cell(95,10,"NAME",1,0,'C');
$pdf->Cell(95,10,$_SESSION["fullname"],1,1,'C');
$pdf->Cell(95,10,"PHONE NUMBER",1,0,'C');
$pdf->Cell(95,10,$_SESSION["phn"],1,1,'C');
$pdf->Cell(95,10,"EMAIL-ID",1,0,'C');
$pdf->Cell(95,10,$_SESSION["mail"],1,1,'C');
$pdf->Cell(95,80,"UPLOADED IMAGE",1,0,'C');
$pdf->Cell(95,80,$pdf->Image($img_path, 122,70,60,60),1,1,'C');
$pdf->cell(190,20,"MARKS OBTAINED",1,1,'C',true);
$pdf->Cell(95,10,"SUBJECT",1,0,'C');
$pdf->Cell(95,10,"MARKS",1,1,'C');
for($i=0;$i<count($marks);$i++){
    $pdf->Cell(95,10,$subject[$i],1,0,'C');
    $pdf->Cell(95,10,$marks[$i],1,1,'C');
  }
// $pdf->Image($img_path, 60,10,90,90);
$pdf->Output("D",$_SESSION['fullname'].".pdf");
// $pdf->Output();
?>
