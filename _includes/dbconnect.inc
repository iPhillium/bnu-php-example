<?php
$servername = "localhost";
$username = "bnubseen_db31";
$password = "21424234$!";
$dbname = "bnubseen_db31";

// Create connection to the database using credentials
$conn = mysqli_connect($servername,$username,$password,$dbname);
	
//use for non OOPHP program
// if (mysqli_connect_errno()) {
// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
// 	die();
// }

// Check handling for the connection for OOPHP orientated
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>