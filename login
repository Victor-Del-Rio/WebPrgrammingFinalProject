<!DOCTYPE HTML>  
<html>
<head>
	<title>CSCI Lab Login</title>
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

<h2>Login</h2>
<!--<p class="error">* required fields</p>-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">  
Username: 
<input type="text" name="username">
<span class="error">* <?php echo $usernameErr;?></span>
<br><br>
Password:
<input type="password" value="" id="pass" name="password">
<span class="error">* <?php echo $passwordErr;?></span><br><br>
<input type="checkbox" onclick="passFunc()">Show Password
<br><br>
<input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>User Inputs:</h2>";
$userRv = $username;
$passRv = $password;
echo $userRv . " " . $passRv;
?>
</body>
</html>
