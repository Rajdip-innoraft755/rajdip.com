<?php
class ResetPassword extends RegisterUser
{
  public $password = "";

  public function updatePassword()
  {
    require('../db/connection.php');
    if ($this->validPassword($this->password)) {
      $enc_password = base64_encode($this->password);
      $query = "update user set password=MD5('$enc_password') where user_id='" . $_SESSION['user_id'] . "';";
      $conn->query($query);
      $_SESSION["msg"] = "password changed successfully";
      header('location:../index.php');
    }
  }

  public function __construct($password)
  {
    $this->password = $password;
    $this->updatePassword();
  }
}



?>