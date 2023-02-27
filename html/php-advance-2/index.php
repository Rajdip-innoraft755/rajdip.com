<?php
  require_once('action.php');
?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/style_navbar.css">
    <style>
    </style>
  </head>

  <body>
    <section class="details">
      <div class="container">
        <h1>welcome! please fill the details to move forward .</h1>        
        <form method="POST"  action="index.php" enctype="multipart/form-data">
          <div class="input-field mail">
            <span>ENTER YOUR EMAIL :</span> <input required type="text" name="mail" value="<?php echo isset($_POST['mail']) ? $obj->fname : '' ?>" placeholder="enter your email">
            <span class="error"><?php echo $obj->mailErr; ?></span>
            <span class="success"><?php echo $obj->mailSuccess; ?></span>            
          </div>
          <input class="submit" type="submit" name="submit" id="submit">
        </form>
      </div>
    </section>
  </body>
</html>