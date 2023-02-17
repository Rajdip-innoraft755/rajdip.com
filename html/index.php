
<?php
  session_start();
  // session_start();
  class ValidateUser{
    public $Err="";
    public function __construct($user_id,$password){
      if($user_id == "rajdip" && $password == "php-task"){
        $_SESSION["active"]=true;
        header('location:welcome.php');
      }
      else{
        $this->Err="* invalid credentials.";
      }
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $obj=new ValidateUser($_POST["user_id"],$_POST["password"]);
  }
?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <style>
    </style>
  </head>

  <body>
    <section class="details">
      <div class="container">
        <h1>welcome! please fill the details to move forward .</h1>
        <h2><?php echo $obj->fulpassword;?> </h2>
        <form method="POST"  action="index.php" enctype="multipart/form-data">
          <span class="error"><?php echo $obj->Err; ?></span>
          <div class="input-field user_id">
            <span>USER ID :</span> <input type="text" name="user_id" placeholder="enetr user id" required> 
          </div>
          <div class="input-field password">
            <span>PASSWORD :</span> <input type="password" name="password" placeholder="enter password" required> 
          </div>
          <input class="submit" type="submit" value="LOG IN">
        </form>
      </div>
    </section>
  </body>
</html>

