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
 <label>Username : </label> 
<input type="text" name="username" placeholder="Enter Username" required>
<span class="error">* <?php echo $usernameErr;?></span>
<br><br>
<label>Password : </label>
<input type="password" value="" id="pass" name="password" placeholder="Enter Password" required>
<span class="error">* <?php echo $passwordErr;?></span><br>
<input type="checkbox" onclick="passFunc()">Show Password
<br>
<button type="submit">Login</button> 
<button type="button" class="forgot"> Forgot Password</button>
<!--<Button type="button" class="signupbtn"> Sign up</button>
<input id= "rememberMe" type="checkbox" checked="checked"> Remember me -->
</div>
</form>

<?php
//use these variables to save to DB
echo "<h2>User Inputs:</h2>";
$userRv = $username;
$passRv = $password;
echo $userRv . " " . $passRv;


# Variables for database connection
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

// Insert Username and Password using Prepared statement
$stmt = $conn->prepare("INSERT INTO test (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $userRv, $passRv);
$stmt->execute()

?>
</body>
</html>
