<?php
//session starts here
session_start();
//check whether the user is logged in or not
if ($_SESSION["active"] != true) {
  // if user is not logged in then redirect to login page
  $_SESSION["msg"] = "PLEASE LOGIN TO VIEW THE TASKS.";
  header("location:../index.php");
}
require_once('../navbar.php');
require_once('../vendor/autoload.php');
/**
 * Task1 - interherited from Validate 
 * 
 * @method setter(@param string $fname,@param string $lname)
 *  used to assign the variable to the parent class
 * 
 *  @return void
 */
class Task1 extends Validate
{
  /**
   * @method setter()
   * 
   * used to assign the variable to the parent class
   * 
   * @param string $fname
   *   used to pass the input taken as firstname 
   * @param string $lname
   *   used to pass the input taken as lastname
   * 
   * @return void
   */
  public function setter($fname, $lname)
  {
    $this->fname = $fname;
    $this->lname = $lname;
  }
}
//check whether the request method is POST and submit button is clicked or not
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  //create a object of Task1 class
  $obj = new Task1();
  //setter method is called and pass the input of firstname and lastname field
  $obj->setter($_POST["fname"], $_POST["lname"]);
  //call the isAlpha() method
  $obj->isAlpha();
  //check whether the isAlpha() method returns true or false
  if ($obj->isAlpha()) {
    $_SESSION['fullname'] = "Hello ! " . $obj->fname . " " . $obj->lname;
    //redirect to 'welcome.php' 
    header('location:welcome.php');
  }
}
?>