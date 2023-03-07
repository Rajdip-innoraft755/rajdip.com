<?php
class ValidateOtp
{

  public $Err = "";
  public function __construct($otp)
  {
    if ($otp == $_SESSION["otp"]) {
      unset($_SESSION["otp"]);
      header('location:reset.php');
    } else {
      $this->Err = "* Enter Correct OTP";
    }
  }
}
?>