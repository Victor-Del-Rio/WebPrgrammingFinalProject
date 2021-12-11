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


#question1, #question2 , #question3{
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
            echo '<form action="submitAnswer.php" method="post"><br>
                  <label for="question"><b> 1)  What does HTML stand for? </b></label>
                  <select name="question1" id="question1">
                  
                <option class="droptext" value="A"> A) Hypertext Machine language</option>
                  <option class="droptext" value="B"> B) Hyper Text Markup Language</option>
                  <option class="droptext" value="C"> C) How to Make Lasagna </option>
                  </select> <br> <br>  <br><br><br><br>s
                  <br> </div>
                   <br><br><br><br>
                  <div class="navbar">
                  <div class="dropdown">
                  <label for="question"><b> What is CSS? </b></label><br>
                  <select name="question2" id="question2">
                  <option class="droptext" value="A"> A)  Cascading Style Sheets </option>
                  <option class="droptext" value="B"> B) Style Sheets</option>
                  <option class="droptext" value="C"> C)  Sheets</option>
                  </select>  <br><br><br><br>
                  <br></div>
                   <br><br><br><br>
                   <label for="question"><b> What is SQL? </b></label><br>
                  <select name="question3" id="question3">
                  <option class="droptext" value="A">  A) standard language </option>
                  <option class="droptext" value="B"> B)  Databases </option>
                  <option class="droptext" value="C">  C) scripting language</option>
                  </select>
                  <br></div>
                  <br><br><br><br>
                  
                  <input type="submit" class="submit" name="submit" value="Submit">
                  </form></div></div>';
                  
                  
                  
                  
?>

    <br><br>
</body>

</html>