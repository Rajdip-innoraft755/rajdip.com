<?php  
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
  class Validate{ 
    public $fname ="";
    public $lname="";
    public $fnameErr="";
    public $lnameErr="";
    public $imgErr="";
    public $fullname="";
    public $target_dir = "images/";
    public $target_file;
    public $imageFileType;
    public $marks=array();
    public $subject=array();
    public $subject_marks_array=array();
    public $marks_table="";
    public $marksErr="";
    public $phn;
    public $phnErr="";
    public $mail="";
    public $mailErr="";
    

    
    public function isAlpha(){
      $flag=true;
      if(!preg_match("/^[a-zA-Z ]*$/",$this->fname)){
        $this->fnameErr = "* Only alphabets and white space are allowed";
        $flag=false;
      }
      if (!preg_match("/^[a-zA-Z ]*$/",$this->lname)) {  
        $this->lnameErr = "* Only alphabets and white space are allowed"; 
        $flag=false;
      }
      return $flag;
    }

    public function imgType(){
      $flag=true;
      if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg" && $this->imageFileType != "gif" ) {
        $this->imgErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $flag=false;
      }
      return $flag;
    }

    public function isIndPhn(){
      $flag=true;
      if(!str_starts_with($this->phn,"+91" )){
        $this->phnErr="* enter a valid indian phone number";
        $flag=false;
      }
      else
        $flag=$this->validPhn();
      return $flag;
    }

    public function marksStoring($details){
      global $subject_marks_array;
      $this->marks_table=$details;
      $subject_marks_array=explode("\n",$details);
    }

    public function validMarksFormat(){
      $flag=true;
      global $subject_marks_array;
      $i=0;
      foreach ($subject_marks_array as $data){
        if(!preg_match("/^[a-zA-Z]+\|[0-9]+$/",trim($data))){
          $this->marksErr="* please write marks in specified format.";
          $flag=false;
          break; 
        }
        else{
          $temp=explode("|",$data);
          $this->subject[$i]=trim($temp[0]);
          if(trim($temp[1])<0 || trim($temp[1]>100)){
            $this->marksErr="* marks should be between 0 to 100.";
            $flag=false;
          }
          else{
            $this->marks[$i]=trim($temp[1]);
          }
          
          $i++;
        }
      }
      return $flag;
    }

    public function validPhn(){
      $flag=true;
      if(!preg_match("/^[0-9]{10}$/",substr($this->phn,3))){
        $this->phnErr="* enter a valid phone number.";
        $flag=false;
      }
      return $flag;
    }

    public function vaildMail(){
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$this->mail,
      CURLOPT_HTTPHEADER => array(
          "Content-Type: text/plain",
          "apikey: Bdj7elVVLqW7Yo54gI5GzWrceeZZDGIw"
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET"
      ));
      $response = curl_exec($curl);
      $validationResult = json_decode($response, true);
      $flag=true;
      if ($validationResult['format_valid']==false || $validationResult['smtp_check']==false) {
        $this->mailErr = "* Enter email in proper format";
        $flag=false;
      } 
      curl_close($curl);
      return $flag;
    }

    public function validMailRegEx(){
      $flag=true;
      if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$this->mail)){
        $flag=false;
        $this->mailErr="* Enter email in proper format";
      }
      return $flag;
    }
  }

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <!-- <link rel="stylesheet" href="css/style_common.css"> -->
  <style>
    * {
    box-sizing: border-box;
    }
    
    body {
      margin: 0px;
      padding: 0px;
    }
    
    .container {
      width: 1180px;
      margin: 0 auto;
      text-align: center;
    }
    
    .navbar{
      background-color: blue;
    }
    .navwrap{
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .menubar{
      display: flex;
      align-items: center;
      width: 60%;
    }
    .navwrap ul{
      margin:0px;
      padding: 0px;
      display: flex;
      list-style: none;
    }
    .navwrap ul li a{
      display: inline-block;
      text-decoration: none;
      font-size: none;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      border-radius: 20px;
      transition: 50ms ease-in;
    }
    .account{
      display: flex;
      width: 40%;
      align-items: center;
      justify-content: end;
      column-gap: 20px;
      
    }
    .account h3{
      color:white;
      margin:0px;
    }
    .logout{
      display: inline-block;
      margin: 20px 0px;
      padding: 10px 20px;
      text-decoration: none;
      background-color: #d44d4d;;
    }
    .navwrap ul li a:hover{
      color: blue;
      background-color: white;
    }

  </style>
</head>
<body>
  <section class="navbar">
    <div class="container">
      <div class="navwrap">
        <div class="menubar">
          <ul>
            <li>
              <a href="../php-task1/index-session.php"> TASK 1</a>
            </li>
            <li>
              <a href="../php-task2/">TASK 2</a>
            </li>
            <li>
              <a href="../php-task3/">TASK 3</a>
            </li>
            <li>
              <a href="../php-task4/">TASK 4</a>
            </li>
            <li>
              <a href="../php-task5/">TASK 5</a>
            </li>
            <li>
              <a href="../php-task6/">TASK 6</a>
            </li>
          </ul>
        </div>
        <div class="account">
          <h3>WELCOME USER</h3>
          <ul>
            <li>
              <a class="logout" href="../logout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
      </div>     
    </div>
    
  </section>
  
</body>
</html>