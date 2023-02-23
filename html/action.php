
<?php
  // session starts 
  session_start();
  // session_start();
  /**
   * validateUser - uses to validate the user id and password at login time
   * 
   * @author Rajdip Roy
   * 
   * @method __construct(@param string $user_id , @param string $password) 
   *  used to create object using $user_id and $password
   * 
   */
  class ValidateUser{
    /**
     * 
     * @var string $Err to store the error message if the user put invalid user_id and password
     * 
     */
    public $Err="";
    /**
     * 
     * @method __construct() 
     * 
     * used to create object using $user_id and $password
     * 
     * @param string $user_id
     *    used to take user_id input
     * @param string $password
     *    used to take password  input
     * 
     * 
     * @return void
     * 
     */
    public function __construct($user_id,$password){
      //check whether the input credentials are valid or not
      if($user_id == "rajdip" && $password == "php-task"){
        //set a session variable $_SESSION['active'] as true , its used for checking whether the user is logged in or not
        $_SESSION["active"]=true;
        //redirect to 'welcome.php' 
        header('location:welcome.php');
      }
      else{
        //if invalid credentials is given then the error message is stored in $Err 
        $this->Err="* invalid credentials.";
      }
    }
  }
  //check whether the request method is post or not
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    //create object of ValidateUser class with the user_id and password given by user
    $obj=new ValidateUser($_POST["user_id"],$_POST["password"]);
  }
?>