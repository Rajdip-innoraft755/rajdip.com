<?php
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
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
  $pdf->Output("F","../php-task6/downloads/".$_SESSION['fullname'].".pdf");



  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  $mail = new PHPMailer(true);


  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
  $mail->isSMTP();                                          
  $mail->Host       = 'smtp.gmail.com';                    
  $mail->SMTPAuth   = true;                                   
  $mail->Username   = 'royrajdip10@gmail.com';                     
  $mail->Password   = 'cdsbxqhkknywtcml';                              
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
  $mail->Port       = 465;  
      
  $mail->setFrom('royrajdip10@gmail.com', 'info@rajdip');
  $mail->addAddress($_SESSION['mail'], $_SESSION['fullname']);
  $mail->addReplyTo('royrajdip10@gmail.com', 'info@rajdip');
  $mail->addAttachment("../php-task6/downloads/".$_SESSION['fullname'].".pdf");
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'your form credential';
  $mail->Body    = 'Thanks! '. $_SESSION['fullname'] .' for fill the form.<br><br> Please find the below attachment Here with. <br><br> Regards';
  $mail->send();
  
  $pdf->Output();
?>
