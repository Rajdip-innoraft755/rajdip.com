<?php
session_start();
session_unset();
session_destroy();
// session_write_close();
// setcookie(session_name(),'',0,'/');
// session_regenerate_id(true);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <section class="details">
      <div class="container">
        <h1 class="error" >SUCCESSFULLY LOGGED OUT</h1>
        <a class="logout" href="index.php">SIGN IN</a>
        </form>
      </div>
    </section>
</body>
</html>