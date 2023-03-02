<?php  
  session_start();
  require('../navbar.php');
  $img_path=$_SESSION["img_path"];
  $marks=$_SESSION["marks"];
  $subject=$_SESSION["subject"];
?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome user</title>
  <link rel="stylesheet" href="../css/style_welcome.css">
  <link rel="stylesheet" href="../css/style_navbar.css">
</head>
<body>
  <section class="details-shown">
    <div class="container">
      <div class="image">
        <?php echo "<img src='$img_path' style='width:200px;height:200px; border-radius:50%'>"; ?>
      </div>
      <div class="name">
        <h1><?php echo $_SESSION["fullname"]; ?></h1>
      </div>
      <div class="phone">
        <h1><?php echo $_SESSION["phn"]; ?></h1>
      </div>
      <div class="marks_table">
        <h2>Marks Obtained</h2>
          <table>
            <tbody>
              <tr>
                <th>SUBJECT</th>
                <th>MARKS</th>
              </tr>
              <?php  
                for($i=0;$i<count($marks);$i++){
                  echo"
                  <tr>
                      <td>$subject[$i]</td>
                      <td>$marks[$i]</td>
                  </tr>";
                }
              ?>
            </tbody> 
          </table>
      </div>
    </div>
  </section>
</body>
</html>