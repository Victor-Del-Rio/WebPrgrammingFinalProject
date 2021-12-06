<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
}

.submit {   
       background-color: lightgreen;
       width: 200px;
       height: 40px;  
        color: black;   
        border: none;   
        cursor: pointer; 
        }

.navbar {
  overflow: hidden;
  background-color: #333;
  margin: auto;
  width:  200px;
  /*height:  100px;*/
  align-content: center;
  text-align: center;
  /*padding-left: 200px;*/
}

.dropdown {
  float: left;
  overflow: hidden;
  text-align: center;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn, .submit:hover {
  background-color: lightblue;
}


.show {display: block;}


#courses, #labs{
  background-color: #333;
  margin: auto;
  width:  200px;
  height:  40px;
  align-content: center;
  text-align: center;
  text-decoration-color: white;
}

.droptext{
  color: white;
  text-align: center;
}

label, select{
  color: white;
}

</style>

</head>

<body>
    <center>
        <h1> Computer Science Labs </h1>
    </center>
    <p>Select a class and lab from the dropdowns below</p>
    <div class="navbar">
        <div class="dropdown">
            <?php
            echo '<form action="labs.php" method="post"><br>
                  <label for="courses"><b>Choose a course:</b></label>
                  <select name="courses" id="courses">
                  <option class="droptext" value="CSCI 195">CSCI 195</option>
                  <option class="droptext" value="CSCI 295">CSCI 295</option>
                  <option class="droptext" value="CSCI 330">CSCI 330</option>
                  </select><br>
                  <br> </div>
                  <div class="navbar">
                  <div class="dropdown">
                  <label for="labs"><b>Choose a lab:</b></label><br>
                  <select name="labs" id="labs">
                  <option class="droptext" value="lab1">Lab 1</option>
                  <option class="droptext" value="lab2">Lab 2</option>
                  <option class="droptext" value="lab3">Lab 3</option>
                  </select>
                  <br></div>
                  <input type="submit" class="submit" name="submit" value="Submit">
                  </form></div></div>';
?>

    <br><br>
</body>

</html>