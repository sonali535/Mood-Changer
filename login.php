
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mood Changer</title>
<link rel="stylesheet" href="login.css">
</head>

<body style=" background-image: url('background/a.jfif');
   background-size: 100%;
   color:white;
  " >


<div class="container">
<center><h1>Login</h1>

<form name="login" action="#" method="post"  >

<label for="email"><b>Email:-</b></label><br>
<input type="email" name="email" id="email" placeholder="Email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="required" />
<br>
<label for="pwd"><b>Password:-</b></label><br>
<input type="password" name="pwd" id="pass" placeholder="Password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="required" />
<br>
<input type="reset"  class="registerbtn" name="reset" value="Reset" />
<input type="submit" class="registerbtn" name="submit" value="submit">
</form>

<?php
include("db_connection.php");
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "musicsystem";

$conn = mysqli_connect($servername, $username, $password, $database);
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
//$check_user = "select * from registration where email=$email and pwd =$pwd";
// $sql = mysqli_query($conn, "SELECT count(*) as total,* from registration where email = '".$email."' and pwd = '".$pwd."'") or die(mysqli_error($conn));
//  $rw = mysqli_fetch_array($sql);
//  SESSION_start();
// 			 $_SESSION['username']=$rw['name'];
// 			 $_SESSION['id']=$rw['email'];
//    	  if($rw['total'] > 0){
// 			 echo "<script> alert('Login Successfully')</script>";
			 
//    	  	 header("Location: mood.php");
//    	  }
//    	  else{
//    	  	echo "<script> alert('Wrong Password')</script>";   	  	
//    	  }
// 	   }
	   $query = mysqli_query($conn,"SELECT * from registration where email = '".$email."' and pwd = '".$pwd."'") or die(mysqli_error($conn));
		if($query)
		{
				  if(mysqli_num_rows($query)==1)
				  {
					$rw = mysqli_fetch_array($query);
					SESSION_start();
					$_SESSION['username']=$rw['name'];
					$_SESSION['id']=$rw['email'];
					//echo "<script> alert('Login Successfully')</script>";
					header("Location: mood.php");
					//echo '<script type="text/javaScript">alert("login")</script>';
				  }
		         else
		         {echo '<script type="text/javaScript">alert("Email id and password not match")</script>';}
		}
		  else
		         {echo '<script type="text/javaScript">alert("mismatch")</script>';}
		}
?>
</div>
 </center>
</body>
</html>

