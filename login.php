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
  background-color: #689;
  margin: auto;
  width:  200px;

  align-content: center;
  text-align: center;

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
        <h1> Question  </h1>
    </center>
    <p> Answer This Question </p>
    <div class="navbar">
        <div class="dropdown">
            <?php
            echo '<form action="submit.php" method="post"><br>
                  <label for="courses"><b> 1)  What does HTML stand for? </b></label>
                  <select name="courses" id="courses">
                <option class="droptext" value="ans1"> Hypertext Machine language</option>
                  <option class="droptext" value="ans11 295"> Hyper Text Markup Language</option>
                  <option class="droptext" value="ans111"> How to Make Lasagna </option>
                  </select> <br> <br>  <br><br><br><br>
                  <br> </div>
                   <br><br><br><br>
                  <div class="navbar">
                  <div class="dropdown">
                  <label for="labs"><b> What is CSS? </b></label><br>
                  <select name="labs" id="labs">
                  <option class="droptext" value="ans2"> Cascading Style Sheets </option>
                  <option class="droptext" value="ans22">  Style Sheets</option>
                  <option class="droptext" value="ans222"> Sheets</option>
                  </select>  <br><br><br><br>
                  <br></div>
                   <br><br><br><br>
                   <label for="labs"><b> What is SQL? </b></label><br>
                  <select name="labs2" id="labs">
                  <option class="droptext" value="lab1"> standard language </option>
                  <option class="droptext" value="lab2"> Databases </option>
                  <option class="droptext" value="lab3"> scripting language</option>
                  </select>
                  <br></div>
                  <br><br><br><br>
                  
                  <input type="submit" class="submit" name="submit" value="Submit">
                  </form></div></div>';
                  
                  
                  
?>

    <br><br>
</body>

</html>
