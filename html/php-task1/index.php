<?php
class ValidateWithoutSession
{
  public $fname = "";
  public $lname = "";
  public $fnameErr = "";
  public $lnameErr = "";
  public $fullname = "";

  public function __construct($fname, $lname)
  {
    // echo "hi i am in cons";
    $this->fname = $fname;
    $this->lname = $lname;
  }

  // public function input_data($data){
  //   $data = trim($data);
  //   $data = stripslashes($data);
  //   $data = htmlspecialchars($data);
  //   return $data;
  // }

  public function isEmpty()
  {
    $flag = true;
    if (empty($this->fname)) {
      $this->fnameErr = "* first name is required.";
      $flag = false;
    }
    if (empty($this->lname)) {
      $this->lnameErr = "* last name is required.";
      $flag = false;
    }
    return $flag;
  }  

  public function isAlpha()
  {
    $flag = true;
    if (!preg_match("/^[a-zA-Z ]*$/", $this->fname)) {
      $this->fnameErr = "* Only alphabets and white space are allowed";
      $flag = false;
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $this->lname)) {
      $this->lnameErr = "* Only alphabets and white space are allowed";
      $flag = false;
    }
    return $flag;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // echo "i am here";
  $obj = new ValidateWithoutSession($_POST["fname"], $_POST["lname"]);
  $obj->isEmpty();
  $obj->isAlpha();
  if ($obj->isEmpty() && $obj->isAlpha()) {
    $obj->fullname = "Hello ! " . $obj->fname . " " . $obj->lname;
  }
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>fill details</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/custom.js"></script>
  <style>
  </style>
</head>

<body>
  <section class="navbar">

  </section>
  <section class="details">
    <div class="container">
      <h1>welcome! please fill the details to move forward .</h1>
      <h2>
        <?php echo $obj->fullname; ?>
      </h2>

      <form method="POST" action="<?php echo $_SERVER["PHP-SELF"] ?>" enctype="multipart/form-data">
        <div class="input-field fname">
          <span>FIRST NAME :</span> <input id="target" type="text" name="fname"
            value="<?php echo isset($_POST['fname']) ? $obj->fname : '' ?>" placeholder="enter your first name">
          <span class="error">
            <?php echo $obj->fnameErr; ?>
          </span>

        </div>
        <div class="input-field lname">
          <span>LAST NAME :</span> <input type="text" name="lname"
            value="<?php echo isset($_POST['lname']) ? $obj->lname : '' ?>" placeholder="enter your last name">
          <span class="error">
            <?php echo $obj->lnameErr; ?>
          </span>
        </div>
        <div class="input-field fullname">
          <span>FULL NAME :</span> <input type="text" name="fullname" placeholder="your full name"
            value="<?php echo isset($_POST['fullname']) ? ($lname . " " . $lname) : '' ?>" disabled>
        </div>
        <input class="submit" type="submit">
      </form>
    </div>
  </section>
</body>

</html>