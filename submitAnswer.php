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

$question1 =$_POST['question1'];
$question2 =$_POST['question2'];
$question3 =$_POST['question3'];






echo $question4;

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

$sql = "INSERT INTO `studentanswers` (`answer1`, `answer2`, `answer3`) VALUES ( '$question1', '$question2', '$question3'   )"; 
if ($conn->query($sql) === TRUE) {
	

} else {
    echo "Error creating database: " .$sql  . "<br>" . $conn->error;
}

// write the query
$result=mysqli_query($conn,"select answer1 from studentanswers Where answer4 = 'A' ");

if($row=mysqli_fetch_array($result))
{
echo "The Correct Answer is  : ";
         echo $row['answer1'].' <br> You Choose :  '.$question1.'<br/>';
         

 } else {
 echo "  Answer Wrong
  : <br>";
 }

$result=mysqli_query($conn,"select answer2 from studentanswers Where answer5 = 'A' ");

if($row=mysqli_fetch_array($result))
{
echo "The Correct Answer is  : ";
         echo $row['answer2'].' <br> You Choose :  '.$question2.'<br/>';
         

 } else {
 echo "  Answer Wrong 
  : <br>";
 }

$result=mysqli_query($conn,"select answer3 from studentanswers Where answer6 = 'C' ");

if($row=mysqli_fetch_array($result))
{
echo "The Correct Answer is  : ";
         echo $row['answer3'].' <br> You Choose :  '.$question3.'<br/>';
         

 } else {
 echo "  Answer Wrong
  : <br>";
 }

$conn->close();
?>

</body>
</html>
