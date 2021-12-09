<!DOCTYPE HTML>  
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>CSCI Lab Login</title>
  <link rel="stylesheet" href="css.css">
</head>
<style type="text/css">.error{color: red;}</style>

<script>
function passFunc() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<body>  


<?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<center> <h1> Student Login Form </h1> </center>
<!--<p class="error">* required fields</p>-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<div class="container">  
 <label>Bee Card : </label> 
<input type="text" name="username" placeholder="Enter Bee Card" >
<span class="error">* <?php echo $usernameErr;?></span>
<br><br>
<label>Password : </label>
<input type="password" value="" id="pass" name="password" placeholder="Enter Password" >
<span class="error">* <?php echo $passwordErr;?></span><br>
<input type="checkbox" onclick="passFunc()">Show Password
<br>
<!-- <button type="submit" name="action" value="Login" onclick="location.href='htt://http://localhost/CSCILab.php' ">Login</button> -->

 <button type="submit" name="action1" valus="Login" formaction="login.php" >Login</button>  

<!--<button type="button" class="forgot"> Forgot Password</button>-->

<!-- <button type="submit" name="action" value="sign up" onclick="location.href='http://localhost/signup.php'">Sign up</button> -->

 <button type="submit" name="action2" value="Sign up" formaction="signup.php" >Sign up</button>  


    <!--<input type="Button" onclick="window.location=http://localhost/project/signup.php' " class="Redirect" value="Sign up"/>
<input id= "rememberMe" type="checkbox" checked="checked"> Remember me-->
</div>
</form>

<?php
//use these variables to save to DB
// -- echo "<h2>User Inputs:</h2>";
$userRv = $username;
$passRv = $password;
// -- echo $userRv . " " . $passRv;

# Variables for database connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername = "localhost";
$username = "root";
$password = "";
$database = "finaldb";




// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
 // -- echo "conneted to the DB";
}

// you need to write a query to check if the username and password are in the database
// e.g. $sql ="SELECT * FROM login WHERE username='$username' AND password='$password'";
// if we can get one record/row, it means this user and password pair is stored in DB
// so we can jump to CISLab.php


// $sql = "SELECT * From login WHERE Username='$userRv' AND Password='$passRv' ";
// $result = mysqli_query($conn, $sql);
// $info = mysqli_fetch_all($result, MYSQLI_ASSOC);
// print_r($info);



$sql = "SELECT * FROM users WHERE beeCard='$userRv' AND password='$passRv' ";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
// -- print_r($info);



if(count($info)==1)
{
  header("Location: CSCILab.php");
}
else
{
// --  echo 'The username or password are incorrect!!!';
}







?>
</body>
</html>
