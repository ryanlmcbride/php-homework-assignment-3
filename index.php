<?php
require("db.php");
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
    $query="INSERT INTO citizens(first_name, last_name, email, company, survey) VALUES('$fname', '$lname', '$email', '$text', '$survey')";
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
    if(!preg_match('/[A-Za-z]/', $pass) && !preg_match('/[0-9]/', $pass){
      $passChar="• Your password must contain letter characters, numbers, and special character.";
      echo "poo";
    }
    //checks if password and confirm pass. match
    if($pass!=$Cpass){
      $passMatch="• Your passwords MUST match!";
    }
    //When the checkbox is checked, the user's info will be saved in a user table
    if(isset($_POST["save"])){
      $results= "INSERT INTO users (first_name, last_name, username, password) VALUES ('$fname', '$lname', '$user', '$pass')";
      echo "That was cool";
    }
}
?>
<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
<!-- form user info -->
<?php
//echos errors if fields don't match requirements
echo "<font color='red'>" . $error . "</font><br>";
echo "<font color='red'>" . $passLen . "</font><br>";
echo "<font color='red'>" . $passChar . "</font><br>";
echo "<font color='red'>" . $passMatch . "</font>";
?>
          <div class="card card-outline-secondary mt-3">
            <div class="card-header">
              <h3 class="mb-0">COVID-19 Survey</h3>
            </div>
            <div class="card-body">
              <form autocomplete="off" class="form" role="form" method="post">
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">First name</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" placeholder="Jane" name="fname">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" placeholder="Bishop" name="lname">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Email</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="email" placeholder="Email Address" name="email">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Company</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" name="text" placeholder="Company">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">How do you feel about COVID-19?</label>
                  <div class="col-lg-9">
                    <div class="btn-group" data-toggle="buttons">
                       <label class="btn btn-secondary">
 												<input autocomplete="off" checked value="1" name="options" type="radio">
 												I dont' care!
 											</label>
 											<label class="btn btn-secondary">
 												<input autocomplete="off" name="options" value="2" type="radio">
 												I'm scared!
 											</label>
 											<label class="btn btn-secondary">
 												<input autocomplete="off"  name="options" value="3" type="radio">
 													I'm just fine!
 											</label>
 											<label class="btn btn-secondary">
 												<input autocomplete="off" name="options" value="4" type="radio">
 													I'm so over this!
 											</label>

                     </div>
                  </div>
                </div>


                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Username</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="text" name="uname" placeholder="Username">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Password</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="password" name="pword" placeholder="Password">
                      <small class="form-text text-muted" id="passwordHelpBlock">Your password must be 8-20 characters long and contain letters and numbers.</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">Confirm</label>
                  <div class="col-lg-9">
                    <input class="form-control" type="password" name="confirm" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label"></label>
                  <div class="col-lg-9">
                    <input class="btn btn-secondary" type="reset" value="Cancel">
                    <input class="btn btn-primary" type="submit" name="submit" value="Save Changes">
                    <div class="checkbox">
                    <label><input type="checkbox" value="1" name="save">Save My Info</label>
                  </div>
                </div>


              </form>
            </div>
          </div><!-- /form user info -->
        </div>
        </body>
  </html>
