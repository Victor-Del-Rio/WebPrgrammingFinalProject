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
<Button type="button" class="signupbtn"> Sign up</button>
<input id= "rememberMe" type="checkbox" checked="checked"> Remember me
</div>
</form>

<?php
//use these variables to save to DB
echo "<h2>User Inputs:</h2>";
$userRv = $username;
$passRv = $password;
echo $userRv . " " . $passRv;
?>
</body>
</html>
