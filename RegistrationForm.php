<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mood Changer</title>
</head>


<body style=" background-image: url('background/a.jfif');
   background-size: 100%;
   color: white;
  " >

<link rel="stylesheet" href="registration.css">
<div class="container">
<center><h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
<form name="registration" action="#" method="post"  >
<label for="name"><b>Name:-</b></label><br>
<input type="text" name="name" id="name"   placeholder="First Name" autocomplete="off" size="30" maxlength="30" required="required">
<br>
<label for="phno"><b>Phone Number:-</b></label><br>
<input type="tel" id="phno" name="phno" placeholder="Phone Number" autocomplete="off" pattern="[0-9]{10}" maxlength="10" required="required" autofocus="autofocus" />
<br>
<label for="email"><b>Email:-</b></label><br>
<input type="email" name="email" id="email" placeholder="Email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="required" />
<br>
<label for="pwd"><b>Password:-</b></label><br>
<input type="password" name="pwd" id="pwd" placeholder="Password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="required" />
<br>
<label for="address"><b>Address:-</b></label><br>
<input type="text" name="address" id="address" placeholder="Address" autocomplete="off" autofocus="autofocus">
<br>
<input type="submit" class="registerbtn" value="submit" name="submit">
<input type="reset"  class="registerbtn" name="reset" value="Reset" />

</form>
</div>
 <div class="container signin">
    <p>Already have an account? <a href="login.php" class="">Sign in</a>.</p>
  </div>
 </center>
</body>
<?php
include("db_connection.php");
if(isset($_POST['submit'])){
$id = $_POST['submit'];
$name = $_POST['name'];
$phno = $_POST['phno'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$address = $_POST['address'];
$check_email_query = "select * from registration where email=$email";
$run_query = mysqli_query($conn,$check_email_query);
error_reporting(0);
if(mysqli_num_rows($run_query)){

	echo "<script>alert('Your Email already exists!')</script>";
	exit();
	}
$insert_user = "insert into registration(name,phno,email,pwd,address) values('$name','$phno','$email','$pwd','$address')";
$result = mysqli_query($conn,$insert_user);
 if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
           // echo "<div class='form'>
               //   <h3>Required fields are missing.</h3><br/>
//<p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
//</div>";
        }
}
?>
</html>
