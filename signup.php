<!DOCTYPE HTML>  
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <title>CSCI Lab Login</title>
</head>
<style type="text/css">.error{color: red;}</style>
<style>
  Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: floralwhite;  
}  
button {   
       background-color: lightgreen;   
       width: 100%;  
        color: black;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   

 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid blueviolet;   
        box-sizing: border-box;   
    }  
button:hover {   
        opacity: 0.7;   
    }   
.signupbtn {   
              width: auto;   
              padding: 10px 18px;  
              margin: 10px 5px;  
              }   
       .forgot {
              width: auto;   
              padding: 10px 18px;  
              margin: 10px 5px;  

              }

       .container {   
              padding: 25px;   
              background-color: lightblue;
              margin: 50px;  
              }
</style>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  if (empty($_POST["card"])) {
    $cardErr = "Bee Card is required";
  } else {
    $card = test_input($_POST["card"]);
  }
  if (empty($_POST["name"])) {
    $nameErr = "First and Last Name is required";
  } else {
    $name = test_input($_POST["name"]);
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
<button type="submit" class="signupbtn"> Sign up</button>
</div>
</form>


<?php
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
} catch (\mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        $error[] = "This Beecard number is already taken! <br> Please check your number and try again. <br> Please contact the admin if the your card number is not available for user creation.";
        echo $error[0];
    } else {
        echo "User creation successful";
    }
}
?>
</Bbody>
</html>