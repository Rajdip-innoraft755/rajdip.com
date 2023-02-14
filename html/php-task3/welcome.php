<?php  
  session_start();
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
  // echo $_SESSION["fullname"];
  $img_path=$_SESSION["img_path"];
  $marks=$_SESSION["marks"];
  $subject=$_SESSION["subject"];
    
  // echo "<img src='$img_path' style='width:200px;height:100px'>";
?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome user</title>
  <link rel="stylesheet" href="css/style_welcome.css">
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