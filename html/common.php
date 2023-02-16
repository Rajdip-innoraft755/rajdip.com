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
          $this->marks[$i]=trim($temp[1]);
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

  // if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
  //   $obj=new Validate($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"],$_POST["marks_table"],$_POST["phn"],$_POST["mail"]);
  //   $obj->isEmpty();
  //   $obj->isAlpha();
  //   $obj->imgType();
  //   $obj->validMarksFormat();
  //   $obj->isIndPhn();
  //   // $obj->validMailRegEx();
  //   $obj->vaildMail();
  //   if($obj->isEmpty() && $obj->isAlpha() && $obj->imgType() && $obj->validMarksFormat() && $obj->isIndPhn()  && $obj->vaildMail()){
  //     $_SESSION["fullname"]=$obj->fname." ".$obj->lname;
  //     move_uploaded_file($_FILES["image-upload"]["tmp_name"], $obj->target_file);
  //     $_SESSION["img_path"]=$obj->target_file;
  //     $_SESSION["marks"]=$obj->marks;
  //     $_SESSION["subject"]=$obj->subject;
  //     $_SESSION["phn"]=$obj->phn;
  //     $_SESSION["mail"]=$obj->mail;
  //     header("location:welcome.php");
  //   }
  // }
?>