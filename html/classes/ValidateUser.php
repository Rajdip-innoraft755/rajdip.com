<?php
class ValidateUser
{
  public $user_id = "";
  public $password = "";
  public $Err = "";
  public function searchInDb()
  {
    require_once('./db/connection.php');
    $enc_password = base64_encode($this->password);
    $query = "select user_id,password from user where user_id='$this->user_id' and password=MD5('$enc_password');";
    $res = $conn->query($query);
    if ($res->num_rows == 0) {
      $_SESSION["msg"] = "* Invalid credentials.";
    } else {
      header('location:welcome.php');
    }
  }

  public function __construct($user_id, $password)
  {
    $this->user_id = $user_id;
    $this->password = $password;
    $this->searchInDb();
  }
}
?>