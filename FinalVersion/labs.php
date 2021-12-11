<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lab</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "csci330";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully <br>";

	$course = $_POST['courses'];
	$lab = $_POST['labs'];
	echo $course . " " . $lab;
	echo '<button onclick = "newWindow()"> newlab</button>';
	echo "<br>";
	echo '<script>window.location.href = "http://localhost/WPFinal/'.$course.$lab.'.php";</script>';

	
?>



</body>
</html>