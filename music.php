<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Music.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

</head>
<body style=" background-image: url('background/a.jfif');
   background-size: 100%;
">
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
//echo "Connection was successful<br>";
}

if (isset($_GET["playbutton"]))
   {
     $playlistEnter = $_GET["playbutton"] ;
     echo <<<HTML
     <h1 style="color:white;  font-family: Sofia, sans-serif;">$playlistEnter</h1>
     HTML;
   }
  
   $sql = "select  Playlist_id
   from playlist
    where Playlist_name = '$playlistEnter';";
         $result = mysqli_query($conn, $sql);
         $result = mysqli_fetch_array($result);
         //echo count($result);

         $result =$result[0];

        // $result= substr($result,1);
        // echo $result;
    $sql = "insert into selects(Playlist_id,user) values('$result','$mail');";
     $result = mysqli_query($conn, $sql); 
     if ($result){
      // echo "inserttttttttt";
     }

$sql = "select * 
FROM contain JOIN song USING (Song_id) JOIN playlist USING (Playlist_id)
where Playlist_name ='$playlistEnter'";

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
        $songname = $row['Song_name'];
        echo <<<HTML
        <h5 style="color:white;">$songname </h5>
        <audio controls>
        <source src=" {$row['Song_url'] }" type="audio/mpeg">
      Your browser does not support the audio element.
      </audio>
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