<?php
require('../vendor/autoload.php');

class RegisterUser extends ValidateData
{
  public $userErr = "";
  public $passErr = "";
  public $mailErr = "";
  public $mail = "";

  public function validPassword($password)
  {
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
      $this->passErr = "* Weak Password";
      return false;
    }
    return true;
  }

  public function checkDb($user_id, $email, $password)
  {
    require_once('../db/connection.php');
    $res = $conn->query('select * from user');
    $flag = true;
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        if ($user_id == $row["user_id"]) {
          $this->userErr = "user_id already exists.";
          $flag = false;
          break;
        }
      }
    }
    if ($flag === true) {
      $this->insertDb($conn, $user_id, $email, $password);
    }
    return $flag;
  }

  public function insertDb($conn, $user_id, $email, $password)
  {
    $enc_password = base64_encode($password);
    $query = "insert into user values ('$user_id','$email',MD5('$enc_password'));";
    $conn->query($query);
  }

  public function __construct($user_id, $email, $password)
  {
    $this->mail = $email;
    // if ($this->vaildMail() && $this->validPassword($password) && $this->checkDB($user_id, $email, $password)) {
    if ($this->validPassword($password) && $this->checkDB($user_id, $email, $password)) {
      $_SESSION["active"] = true;
      $_SESSION["msg"] = "account created successfully . login with your credentials .";
      header('location:../index.php');
    }
  }
}
?>