<?php  
// define variables to empty values  
  $fnameErr = $lnameErr = "";  
  $fname = $lname = "";  

  
  function isAlpha(){
    global $fnameErr,$lnameErr;
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])) {  
      $fnameErr = "* Only alphabets and white space are allowed";
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["lname"])) {  
      $lnameErr = "* Only alphabets and white space are allowed";
    }
  }
  function isEmpty(){
    global $fnameErr,$lnameErr;
    if (empty($_POST["fname"])){ 
      $fnameErr="* first name is required.";
    }
    if (empty($_POST["lname"])){
      $lnameErr="* last name is required.";
    }
    
  }
  isEmpty();
  isAlpha();
  
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
        <h1>welcome ! please fill the details to move forward .</h1>
        
        <form method="POST" action="index.php">
          <div class="input-field fname">
            <span>FIRST NAME :</span> <input id="target" type="text" name="fname" placeholder="enter your first name">
            <span class="error"><?php echo $fnameErr; ?></span>
            
          </div>
          <div class="input-field lname">
            <span>LAST NAME :</span> <input type="text" name="lname" placeholder="enter your last name">
            <span class="error"><?php echo $lnameErr; ?></span>
          </div>
          <div class="input-field fullname">
            <span>FULL NAME :</span> <input type="text" name="lname" placeholder="your full name" disabled>
          </div>
          <input class="submit" type="submit">
        </form>
      </div>
    </section>
  </body>
</html>



