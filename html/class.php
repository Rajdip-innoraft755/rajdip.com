<?php  
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
  
  
  /**
   * Validate - use to validate the input takes from user
   * 
   * @author Rajdip Roy
   * 
   * @method isAlpha()
   *  checks whether firstname , lastname are contains only alphabet
   * @method imgType()
   *  checks whether the type of image is other than png,gif,jpg and jpeg
   * @method marksStoring(@param string $details)
   *  takes the string of marks as input and split into marks and subject pair
   * @method validMarksFormat()
   *  checks whether the marks are given in proper format or not , 
   *  if the marks are in proper format then store the marks and subject in respective array 
   * @method isIndPhn()
   *  checks whether the phone number is indian or not basically checking the country code i.e +91
   * @method validPhn()
   *  checks whether the phone number is consist of exact 10 digits (excluding the country code) or not
   * @method validMail()
   *  checks whether the given mail id is valid or not 
   *  
   *  
   */
  
  class Validate{ 

  /**
   * 
   * @var string 
   *  $fname used to store firstname of user
   * @var string 
   *  $lname used to store lastname of user
   * @var string 
   *  $fullname used to store the fullame i.e $fname+" "+$lname
   * @var string 
   *  $target_dir used to mention the folder where the images will be stored
   * @var string 
   *  $target_file used to store the image file name
   * @var string 
   *  $imageFileType used to store the extension of image file
   * @var string 
   *  $marksTable used to store the marks input as string
   * @var array 
   *  $subjectMarksArray used to the subject marks pair after split $marksTable w.r.t '\n'
   * @var array 
   *  $marks used to store the marks
   * @var array 
   *  $subject used to store subjects
   * @var string 
   *  $phn used to store the phone number
   * @var string 
   *  $mail used to store the email-id
   * @var string 
   *  $fnameErr used to store the error needs to show if the first name is not in proper format
   * @var string 
   *  $lnameErr used to store the error needs to show if the last name is not in proper format 
   * @var string 
   *  $imgErr used to store the error needs to show if the image file is not in proper format 
   * @var string 
   *  $marksErr used to store the error needs to show if the subject and marks are not in proper format 
   * @var string 
   *  $phnErr used to store the error needs to show if the phone number is not in proper format
   * @var string 
   *  $mailErr used to store the error needs to show if the email-id is not in proper format
   * 
   */



    public $fname ="";
    public $lname="";
    public $fullname="";
    public $target_dir = "images/";
    public $target_file;
    public $imageFileType;
    public $marksTable="";
    public $subjectMarksArray=array();
    public $marks=array();
    public $subject=array();
    public $phn;
    public $mail="";
    public $fnameErr="";
    public $lnameErr="";
    public $imgErr="";
    public $marksErr="";
    public $phnErr="";
    public $mailErr="";
    

    /**
     * isAlpha()
     * 
     * checks whether firstname , lastname are contains only alphabet
     * 
     * 
     * @return boolean $flag
     * 
     */
    public function isAlpha(){
      
      // $flag is used to return either true if the format is valid or false if the format is invalid
      $flag=true; 
      //compare the first name with the regEx to check whether its contains only alphabet or not
      if(!preg_match("/^[a-zA-Z ]*$/",$this->fname)){
        //if the first name is in invalid format then store the error message in $fnameErr
        $this->fnameErr = "* Only alphabets and white space are allowed";
        $flag=false;
      }
      //compare the last name with the regEx to check whether its contains only alphabet or not
      if (!preg_match("/^[a-zA-Z ]*$/",$this->lname)) {  
        //if the last name is in invalid format then store the error message in $lnameErr
        $this->lnameErr = "* Only alphabets and white space are allowed"; 
        $flag=false;
      }
      return $flag;
    }
     /**
     * imgType()
     * 
     * checks whether the type of image is other than png,gif,jpg and jpeg
     * 
     * 
     * @return boolean $flag
     * 
     */
    public function imgType(){
      // $flag is used to return either true if the format is valid or false if the format is invalid
      $flag=true;
      if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg" && $this->imageFileType != "gif" ) {
        //if the image type is other than png,gif,jpg and jpeg then store error message in $imgErr
        $this->imgErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $flag=false;
      }
      return $flag;
    }
    /**
     * marksStoring()
     * 
     * takes the string of marks as input and split into marks and subject pair
     * 
     * 
     * @param string $details 
     *   uses to store the input string of marks and subjects
     * 
     * 
     * @return void
     *
     */
    public function marksStoring($details){
      global $subjectMarksArray;
      $this->marksTable=$details;
      //spilt the $details w.r.t '\n' and stores the parts in $subjectMarksArray
      $subjectMarksArray=explode("\n",$details);
    }
    /**
     * validMarksFormat()
     * 
     * checks whether the marks are given in proper format or not , 
     * if the marks are in proper format then store the marks and subject in respective array 
     * 
     * @return boolean $flag
     *
     */
    public function validMarksFormat(){
      // $flag is used to return either true if the format is valid or false if the format is invalid
      $flag=true;
      global $subjectMarksArray;
      //counter variable to maintain the array index of $subject and $marks
      $i=0;
      //takes each elements of $subjectMarksArray one by one as $data
      foreach ($subjectMarksArray as $data){
        //check whether the $data is in proper format or not
        if(!preg_match("/^[a-zA-Z]+\|[0-9]+$/",trim($data))){
          //if the $data is not in proper format then store the error message in $marksErr
          $this->marksErr="* please write marks in specified format.";
          $flag=false;
          break; 
        }
        else{
          //if the $data is in proper format then spilt $data w.r.t '|' to separate marks and subject
          $temp=explode("|",$data);
          if(in_array(trim($temp[0]),$this->subject)){
            $this->marksErr="* duplicate subject not allowed.";
            $flag=false;
          }
          //check whether the marks is in between 0 and 100
          if(trim($temp[1])<0 || trim($temp[1]>100)){
            //if the marks does not satisfy the condition then store the error message in $marksErr
            $this->marksErr="* marks should be between 0 to 100.";
            $flag=false;
          }
          else{
            //if marks satisfies the condition then store the subject and marks in respective arrays
            $this->subject[$i]=trim($temp[0]);
            $this->marks[$i++]=trim($temp[1]);
          }
        }
      }
      return $flag;
    }

     /**
     * isIndPhn()
     * 
     * checks whether the phone number is indian or not basically checking the country code i.e +91
     * 
     * 
     * @return boolean $flag
     * 
     */
    public function isIndPhn(){
      // $flag is used to return either true if the format is valid or false if the format is invalid
      $flag=true;
      //check whether the first three character is '+91' or not 
      if(!str_starts_with($this->phn,"+91" )){
        //if the first three character is not '+91' then store the error message in $phnErr
        $this->phnErr="* enter a valid indian phone number";
        $flag=false;
      }
      //if the first three is '+91'then call the validPhn() method 
      else
        $flag=$this->validPhn();
      return $flag;
    }
    /**
     * validPhn()
     * 
     * checks whether the phone number is consist of exact 10 digits (excluding the country code) or not
     * 
     * 
     * @return boolean $flag
     * 
     */
    public function validPhn(){
      // $flag is used to return either true if the format is valid or false if the format is invalid
      $flag=true;
      //compare the phone number (except the first three character) with the regEx 
      //to check whether it contains exactly 10 digit or not
      if(!preg_match("/^[0-9]{10}$/",substr($this->phn,3))){
        //if the phone number is not in proper format store the error message in $phnErr
        $this->phnErr="* enter a valid phone number.";
        $flag=false;
      }
      return $flag;
    }
    /**
     * validmail()
     * 
     * checks whether the given mail id is valid or not 
     * here we using the email verification api
     * see the website https://apilayer.com/marketplace/email_verification-api
     * 
     * 
     * @return boolean $flag
     * 
     */
    public function vaildMail(){

      //----------------------- USING CURL -------------------------
      // $curl = curl_init();
      // curl_setopt_array($curl, array(
      // CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$this->mail,
      // CURLOPT_HTTPHEADER => array(
      //     "Content-Type: text/plain",
      //     "apikey: Bdj7elVVLqW7Yo54gI5GzWrceeZZDGIw"
      // ),
      // CURLOPT_RETURNTRANSFER => true,
      // CURLOPT_ENCODING => "",
      // CURLOPT_MAXREDIRS => 10,
      // CURLOPT_TIMEOUT => 0,
      // CURLOPT_FOLLOWLOCATION => true,
      // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      // CURLOPT_CUSTOMREQUEST => "GET"
      // ));
      // $response = curl_exec($curl);
      // curl_close($curl);


      //--------------- USING GUZZLE -------------------

      require_once('../vendor/autoload.php');
      $client = new GuzzleHttp\Client(['base_uri' => 'https://api.apilayer.com']);
      $response = $client->request('GET', '/email_verification/check?email='.$this->mail,[
        'headers' => [
          'Content-Type' => 'text/plain',
          'apikey' => 'Bdj7elVVLqW7Yo54gI5GzWrceeZZDGIw'
        ]
      ]);
      $result=$response->getBody();

      //--------------- COMMON PART OF CURL AND GUZZLE ---------------------------------
      $validationResult = json_decode($result, TRUE);
      // $flag is used to return either true if the format is valid or false if the format is invalid
      $flag=true;
      //check whether the format_valid and smtp_check returned the true or false
      //on the basis of returned value we decide whether the Email-id is valid or not
      if ($validationResult['format_valid']==false || $validationResult['smtp_check']==false) {
        $this->mailErr = "* Enter email in proper format";
        $flag=false;
      }    
      return $flag;
    }
  }

  
  class RegisterUser extends Validate{
    public $userErr="";
    public $passErr="";
    public $mailErr="";
    public $mail="";

    public function validPassword($password){
      if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",$password)){
        $this->passErr="* Weak Password";
        return false;
      }
      return true;
    }

    public function checkDb($user_id,$email,$password){
      require_once('../db/connection.php');
      $res=$conn->query('select * from user');
      $flag=true;
      if ($res->num_rows > 0){
        while($row = $res->fetch_assoc()) {
          if($user_id == $row["user_id"]){
            $this->userErr="user_id already exists.";
            $flag=false;
            break;
          }
        }
      }
      if($flag === true){
        $this->insertDb($conn,$user_id,$email,$password);
      }
      return $flag;
    }

    public function insertDb($conn,$user_id,$email,$password){
      $enc_password=base64_encode($password);
      $query="insert into user values ('$user_id','$email',MD5('$enc_password'));" ;
      $conn->query($query);
    }
    
    public function __construct($user_id,$email,$password){
      $this->mail=$email;
      if( $this->vaildMail()  && $this->validPassword($password) && $this->checkDB($user_id,$email,$password)){
        $_SESSION["active"]=true;
        $_SESSION["msg"]="account created successfully . login with your credentials .";
        header('location:../index.php');
      }
    }
  }


  class ValidateUser{
    public $user_id="";
    public $password="";
    public $Err="";
    public function searchInDb(){
      require_once('./db/connection.php');
      $enc_password=base64_encode($this->password);
      $query="select user_id,password from user where user_id='$this->user_id' and password=MD5('$enc_password');";
      $res=$conn->query($query);
      if($res->num_rows == 0){
        $this->Err="* Invalid credentials.";
      }
      else{
        header('location:welcome.php');
      }
    }

    public function __construct($user_id,$password){
      $this->user_id=$user_id;
      $this->password=$password;
      $this->searchInDb();
    }
  }

  class ForgotPassword{
    public $user_id="";
    public $email_id="";
    public $Err="";
    public function fetchMailId(){
      require('../db/connection.php');
      $query = "select email_id from user where user_id='$this->user_id';" ;
      $res=$conn->query($query);
      if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
          $this->email_id=$row["email_id"];
          $_SESSION["email_id"]=$this->email_id;
          $this->sendOtp();
          break;
        }
      }
      else{
        $this->Err="* Invalid user Id.";
      }
    }

    public function sendOtp(){
      require_once('./mailer.php');
      $mail->setFrom('royrajdip10@gmail.com', 'info@rajdip');
      $mail->addAddress($_SESSION["email_id"]);
      $mail->addReplyTo('royrajdip10@gmail.com', 'info@rajdip');
      $mail->isHTML(true);                                  
      $mail->Subject = 'OTP TO RESET PASSWORD';
      $_SESSION['otp']= rand(100000, 999999);
      $mail->Body    = "Dear  $this->user_id  <br><br> Here is your OTP. Please , don't share it with Others. <br><br> OTP : " . $_SESSION['otp'] ;
      $mail->send();
      header('location:verification.php');
    }

    public function __construct($user_id){
      $this->user_id=$user_id;
      $_SESSION["user_id"]=$user_id;
      $this->fetchMailId();
    }
  }



  class ValidateOtp{

    public $Err="";
    public function __construct($otp){
      if($otp == $_SESSION["otp"]){
        unset($_SESSION["otp"]);
        header('location:reset.php');
      }
      else{
        $this->Err="* Enter Correct OTP";
      }
    }
  }

  class ResetPassword extends RegisterUser{
    public $password = "";


    public function updatePassword(){
      require('../db/connection.php');
      if($this->validPassword($this->password)){
        $enc_password=base64_encode($this->password);
        $query = "update user set password=MD5('$enc_password') where user_id='" .$_SESSION['user_id'] ."';" ;
        $conn->query($query);
        $_SESSION["msg"]="password changed successfully";
        header('location:../index.php');
      }    
    }

    public function __construct($password){
      $this->password=$password;
      $this->updatePassword();
    }
  }



?>

