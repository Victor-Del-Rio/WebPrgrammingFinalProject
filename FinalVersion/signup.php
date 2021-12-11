<!DOCTYPE HTML>  
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>CSCI Lab Signup</title>
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
$emailErr = $passwordErr = $cardErr = $nameErr = "";
$email = $password = $card = $name = "";
$checkEmail = $checkPW = $checkCard = $checkName = False;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
   $emailErr = "Email is required";
  } else {
   $email = test_input($_POST["email"]);
   $checkEmail = True;
   // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $checkEmail = False;
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    $checkPW = True;
  }

  if (empty($_POST["card"])) {
    $cardErr = "Bee Card is required";
  } else {
    $card = test_input($_POST["card"]);
    $checkCard = True;
    // Check card to make sure it is only numbers
    if (!is_numeric($card)) {
      $cardErr = "Only numbers are allowed";
      $checkCard = False;
    }
  }
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    $checkName = True;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $checkName = False;
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<center> <h1> Student Sign Up Form </h1> </center>
<!--<p class="error">* required fields</p>-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<div class="container">  
 <label>Email : </label> 
<input type="text" name="email" placeholder="Enter Email" required>
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
<label>Password : </label>
<input type="password" value="" id="pass" name="password" placeholder="Enter Password" required>
<span class="error">* <?php echo $passwordErr;?></span><br>
<input type="checkbox" onclick="passFunc()">Show Password
<br><br>
<label>Bee Card : </label> 
<input type="text" name="card" placeholder="Enter Bee Card Number" required>
<span class="error">* <?php echo $cardErr;?></span>
<br><br>
<label>First and Last Name : </label> 
<input type="text" name="name" placeholder="Enter First and Last Name" required>
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
<button type="submit" class="signupbtn" formaction="Signup.php"> Sign up</button>
</div>
</form>


<?php
if ($checkEmail === True AND $checkCard === True AND $checkName === True AND $checkPW === True) {
  $emailRv = strval($email);
  $passRv = strval($password);
  $cardRv = $card;
  $nameRv = strval($name);
  //use these variables to save to DB
  $error = [];
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
  }
  // Insert Username and Password
  try {
    $stmt = $conn->prepare("INSERT INTO users (beeCard, name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $cardRv, $nameRv, $emailRv, $passRv);
    $stmt->execute();
    header("Location: login.php");
  } catch (\mysqli_sql_exception $e) {
      if ($e->getCode() === 1062) {
          $error[] = "This Beecard number is already taken! <br> Please check your number and try again. <br> Please contact the admin if the your card number is not available for user creation.";
          echo $error[0];
      } else {
          echo "User creation successful";
      }
  }
}
?>
</Bbody>
</html>