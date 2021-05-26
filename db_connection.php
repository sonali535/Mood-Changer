<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "musicsystem";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
// Die if connection was not successful
if (!$conn){
  die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
 // echo "Connection was successful<br>";
}

// $conn = mysqli_connect("localhost","root","");
// mysqli_select_db($conn,"moodchanger");
// if(!mysqli_select_db($conn,'moodchanger'))
//   {
//     echo "Database not selected";
//   }
 ?>
