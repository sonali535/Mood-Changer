<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="Mood.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
 </head>
<body style=" background-image: url('background/a.jfif');
   background-size: 100%;
  " >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Mood Changer</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="profile.php">
    <?php
    SESSION_START();
    $name = $_SESSION['username'];
    echo <<<HTML
     <p style="color:white;  font-family: Sofia, sans-serif;">$name</p>
     HTML;
				?>	
    </a></li>
      <li><a href="logout.php"> Log Out</a></li>
    </ul>
  </div>
</nav>
<div class="text-center">
<h1 style="   color:white; 
    font-family: Sofia, sans-serif;
    color: wheat;
">Enter Your Mood</h1>
<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "musicsystem";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
//  echo "Connection was successful<br>";
}

$sql = "select distinct Mood from mood
";

$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);
//echo $num;
echo " <br>";
// Display the rows returned by the sql query
if($num> 0){
    

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        echo <<<HTML
        
        <form action="Playlist.php" style="text-allign:centre;">
        <input class="btn btn-lg active" type="submit" value="{$row['Mood']}" name="mybutton" style="">
        <br>
        <br>
        
        </form>
        HTML;
        echo "<br>";
    }


}
?>
    
</div>



   
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>