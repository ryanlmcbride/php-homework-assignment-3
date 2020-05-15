<?php
require('db.php');
//defines error variables
$error="";
$passLen="";
$passChar="";
$passMatch="";
//if the submit button is pressed, the code below will execute
if(isset($_POST["submit"]))
{
//defines the variables for each input and trims the values
    $fname=trim($_POST['fname']);
    $lname=trim($_POST['lname']);
    $email=trim($_POST['email']);
    $text=trim($_POST['text']);
    $user=trim($_POST['uname']);
    $pass=trim($_POST['pword']);
    $Cpass=trim($_POST['confirm']);
    $survey=($_POST["options"]);

//This creates a new row into the citizens table with the info the user inputed
    if($pass=$Cpass){
    $query="INSERT INTO citizens (first_name, last_name, email, company, survey_info) VALUES('$fname', '$lname', '$email', '$text', '$survey')";
    $result = mysqli_query($conn, $query);
    }
    else{
      $passMatch="• Your passwords MUST match!";
    }
    //Form Validation starts
    //checks to see if fields are empty
    if(empty($fname)||empty($lname)||empty($email)||empty($text)||empty($user)||empty($pass)){
      $error="• All fields are required.";
    }
    //checks password length
    if(strlen($pass) <= 8){
      $passLen="• Your passowrd must be at least 8 characters long.";
    }
    //checks if the password has uppercase and lowercase letters, numbers, and special characters
    if(!preg_match('/[A-Za-z]/', $pass) && !preg_match('/[0-9]/', $pass)){
      $passChar="• Your password must contain letter characters, numbers, and special character.";
      echo "poo";
    }
    //When the checkbox is checked, the user's info will be saved in a user table
    if(isset($_POST["save"]))
        {
      $query2= "INSERT INTO users (first_name, last_name, username, password) VALUES ('$fname', '$lname', '$user', '$pass')";
      $result= mysqli_query($conn, $query2);
        }
      else
      {
        echo "Information could not be saved";
      }
  }
 ?>
