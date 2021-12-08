<!DOCTYPE html>
<html>
<body>

<style>
.topnav {
  background-color: #333;
  overflow: hidden;
 
}

.topnav a.homePage{
  background-color: #04AA6D;
  color: white;
}

h1 {
  color: blue;
  text-align: center;
}
</style>

<!-- The overlay -->
<div class="topnav">
  <a class="homePage" href="loginQuestion.php">Home</a> 
  <br>
 
</div>

<h1> Thank You For the Answer.  </h1>

<?php

$x =$_POST['question1'];
$y =$_POST['question2'];
$b =$_POST['question3'];




print_r($x);
echo $y;
echo $b;

$servername = "localhost";
$username = "root";
$password = "";
$database = "finaldb";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database

$sql = "INSERT INTO `studentanswers` (`answer1`, `answer2`, `answer3`) VALUES ( '$x', '$y', '$b'  )"; 
if ($conn->query($sql) === TRUE) {
	

} else {
    echo "Error creating database: " .$sql  . "<br>" . $conn->error;
}



$conn->close();
?>

</body>
</html>

