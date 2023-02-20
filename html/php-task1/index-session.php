<?php 
  //session starts here
  session_start();
  //check whether the user is logged in or not
  if($_SESSION["active"]!=true)
  {
    //if user is not logged in then redirect to login page
    header("location:../index.php");
  }
  //add the '../common.php' file to use the class already written there
  require('../common.php');
  /**
   * Task1 - interherited from Validate 
   * 
   * 
   */
  class Task1 extends Validate{
    public function setter($fname,$lname){
      $this->fname=$fname;
      $this->lname=$lname;
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Task1();
    $obj->setter($_POST["fname"],$_POST["lname"]);
    $obj->isAlpha();
    if($obj->isAlpha()){
      echo "i am here ";
      $_SESSION['fullname']="Hello ! " .$obj->fname." ".$obj->lname;
      header('location:welcome.php');
    }
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
        <form method="POST"  action="index-session.php" >
          <div class="input-field fname">
            <span>FIRST NAME :</span> <input required id="target" type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $obj->fname : '' ?>" placeholder="enter your first name">
            <span class="error"><?php echo $obj->fnameErr; ?></span>
            
          </div>
          <div class="input-field lname">
            <span>LAST NAME :</span> <input required type="text" name="lname" value="<?php echo isset($_POST['lname']) ? $obj->lname : '' ?>" placeholder="enter your last name">
            <span class="error"><?php echo $obj->lnameErr; ?></span>
          </div>
          <div class="input-field fullname">
            <span>FULL NAME :</span> <input type="text" name="fullname" placeholder="your full name" value="<?php echo isset($_POST['fullname']) ? ($lname." ".$lname) : '' ?>" disabled>
          </div>
          <input class="submit" name="submit" type="submit">
        </form>
      </div>
    </section>
  </body>
</html>

