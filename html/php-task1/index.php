
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    </style>
  </head>

  <body>
    <section class="details">
      <div class="container">
        <h1>welcome ! please fill the details to move forward .</h1>
        
        <form method="POST" action="index.php">
          <div class="input-field">
            <span>FIRST NAME :</span> <input type="text" name="fname" placeholder="enter your first name">
            <span class="error"><?php echo $fnameErr; ?></span>
            
          </div>
          <div class="input-field">
            <span>LAST NAME :</span> <input type="text" name="lname" placeholder="enter your last name">
            <span class="error"><?php echo $lnameErr; ?></span>
          </div>
          <input class="submit" type="submit">
        </form>
      </div>
    </section>
  </body>
</html>

<?php  
// define variables to empty values  
  $fnameErr = $lnameErr = "";  
  $fname = $lname = "";  


  
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
  
?>

