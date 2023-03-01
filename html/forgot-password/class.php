<?php
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
  session_start();
  require_once('../vendor/autoload.php');
  // require('../db/connection.php');
  class ForgotPassword{
    public $user_id="";
    public $email_id="";
    public $Err="";
    public function fetchMailId(){
      require('../db/connection.php');
      $query = "select email_id from user where user_id='$this->user_id';" ;
      $res=$conn->query($query);
      if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
          $this->email_id=$row["email_id"];
          $_SESSION["email_id"]=$this->email_id;
          $this->sendOtp();
          break;
        }
      }
      else{
        $this->Err="* Invalid user Id.";
      }
    }

    public function sendOtp(){
      require_once('./mailer.php');
      $mail->setFrom('royrajdip10@gmail.com', 'info@rajdip');
      $mail->addAddress($this->email_id);
      $mail->addReplyTo('royrajdip10@gmail.com', 'info@rajdip');
      $mail->isHTML(true);                                  
      $mail->Subject = 'OTP TO RESET PASSWORD';
      $_SESSION['otp']= rand(100000, 999999);
      $mail->Body    = "Dear  $this->user_id  <br><br> Here is your OTP. Please , don't share it with Others. <br><br> OTP : " . $_SESSION['otp'] ;
      $mail->send();
      header('location:verification.php');
    }

    public function __construct($user_id){
      $this->user_id=$user_id;
      $_SESSION["user_id"]=$user_id;
      $this->fetchMailId();
    }
  }



  class ValidateOtp{

    public $Err="";
    public function __construct($otp){
      if($otp == $_SESSION["otp"]){
        unset($_SESSION["otp"]);
        header('location:reset.php');
      }
      else{
        $this->Err="* Enter Correct OTP";
      }
    }
  }

  class ResetPassword extends ForgotPassword{
    public $password = "";


    public function updatePassword(){
      require('../db/connection.php');
      echo $_SESSION["user_id"];
      $query = "update user set password='$this->password' where user_id='" .$_SESSION['user_id'] ."';" ;
      $conn->query($query);
      $_SESSION["msg"]="password changed successfully";
      header('location:../index.php');
    }

    public function __construct($password){
      $this->password=$password;
      $this->updatePassword();
    }
  }



  // ^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$
?>