<?php
  require_once('../vendor/autoload.php');
  require_once('../navbar.html');
  
  class AdvanceTask2 extends Validate{
    public $mailSuccess='';
    public function setter($mail){
      $this->mail=$mail;
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new AdvanceTask2();
    $obj->setter($_POST["mail"]);
    $flagMail=$obj->vaildMail();
    if($flagMail){
      require_once('./mailer.php');
      $mail->setFrom('royrajdip10@gmail.com', 'info@rajdip');
      $mail->addAddress($_POST['mail']);
      $mail->addReplyTo('royrajdip10@gmail.com', 'info@rajdip');
      $mail->isHTML(true);                                  
      $mail->Subject = 'Thanks user';
      $mail->Body    = 'Thank you for your submission.';
      $mail->send();
      $obj->mailSuccess="Mail sent successfully to your mail id.";
    }
  } 
?>