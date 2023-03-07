<?php
class DeleteAccount
{
  public $passErr = "";
  public $password = "";

  public function deleteInDb()
  {
    require_once('../db/connection.php');
    $enc_password = base64_encode($this->password);
    $user_id = $_SESSION["user"];
    $query = "delete from user where user_id='" . $_SESSION["user"] . "'and password=MD5('$enc_password');";
    $conn->query($query);
    $res = $conn->query("select ROW_COUNT()");
    if ($res->fetch_assoc()["ROW_COUNT()"] > 0) {
      unset($_SESSION["user"]);
      unset($_SESSION["active"]);
      $_SESSION["msg"] = "Account successfully deleted";
      header('location:../index.php');
    } else {
      $this->passErr = "* Wrong Password.";
    }
  }

  public function __construct($password)
  {
    $this->password = $password;
    $this->deleteInDb();
  }
}

?>