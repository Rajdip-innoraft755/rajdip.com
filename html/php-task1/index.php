<?php  
// define variables to empty values  
  $fnameErr = $lnameErr = "";  
  $fname = $lname = "";  
  
  function isAlpha(){
    $flag1;
    global $fnameErr,$lnameErr,$fname,$lname;
    // if (!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"]) && !preg_match("/^[a-zA-Z ]*$/",$_POST["lname"])) {  
    //   $fnameErr = "* Only alphabets and white space are allowed";
    //   $lnameErr = "* Only alphabets and white space are allowed";
    // }
    if(!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])){
      $fnameErr = "* Only alphabets and white space are allowed";
      
    }
    else{
      $fname=$_POST["fname"];
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["lname"])) {  
      $lnameErr = "* Only alphabets and white space are allowed";
      
    }
    else{
     
      $lname=$_POST["lname"];
    }
  }
  function isEmpty(){
    global $fnameErr,$lnameErr;
    $flag=true;
    if (empty($_POST["fname"])){ 
      $fnameErr="* first name is required.";
      $flag=false;
    }
    if (empty($_POST["lname"])){
      $lnameErr="* last name is required.";
      $flag=false;
    }
    if($flag==true){
      
      isAlpha();
    }
    
  }
  isEmpty();
  header("url=index.php");
  


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
        <h1>welcome <?php echo $fname ." ".$lname ?> ! please fill the details to move forward .</h1>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="input-field fname">
            <span>FIRST NAME :</span> <input id="target" type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $fname : '' ?>" placeholder="enter your first name">
            <span class="error"><?php echo $fnameErr; ?></span>
            
          </div>
          <div class="input-field lname">
            <span>LAST NAME :</span> <input type="text" name="lname" value="<?php echo isset($_POST['lname']) ? $lname : '' ?>" placeholder="enter your last name">
            <span class="error"><?php echo $lnameErr; ?></span>
          </div>
          <div class="input-field fullname">
            <span>FULL NAME :</span> <input type="text" name="fullname" placeholder="your full name" value="<?php echo isset($_POST['fullname']) ? ($lname." ".$lname) : '' ?>" disabled>
          </div>
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input class="submit" type="submit">
        </form>
      </div>
    </section>
  </body>
</html>

<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo "<img src='$target_file' style='width:200px;height:100px'>";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
