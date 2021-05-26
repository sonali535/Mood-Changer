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
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="Mood.css">-->
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
      <li class="active"><a href="Mood.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="profile.php">
    <?php
    SESSION_START();
    $name = $_SESSION['username'];
    $mail =$_SESSION['id'];
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


     <?php 
   if (isset($_GET["mybutton"]))
   {
     $moodEnter = $_GET["mybutton"] ;
     echo <<<HTML
     <h1 style="color:white;  font-family: Sofia, sans-serif;">$moodEnter</h1>
     HTML;
    
              
   }

   $sql = "select distinct Sno
   from mood
    where Mood = '$moodEnter';";
         $result = mysqli_query($conn, $sql);
         $result = mysqli_fetch_array($result);
         $result= implode($result);
         $result= substr($result,2);
    $sql = "insert into enter(MoodNo,user) values('$result','$mail');";
     $result = mysqli_query($conn, $sql); 
     


$sql = "select  distinct Playlist_name,Language
         from consist join playlist USING(Playlist_id)
         where Mood = '$moodEnter';";
  

         $result = mysqli_query($conn, $sql);
         
         // Find the number of records returned
         $num = mysqli_num_rows($result);
         //echo $num;
         echo " <br>";
         // Display the rows returned by the sql query
         if($num> 0){
             
         
             // We can fetch in a better way using the while loop
             while($row = mysqli_fetch_assoc($result)){
              echo <<<HTML
              <form action="music.php" >
              <input class="btn btn-lg active" type="submit" value="{$row['Playlist_name']}" name="playbutton">
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