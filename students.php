<?php
$servername = "localhost";
$username = "bnubseen_db31";
$password = "21424234$!";
$dbname = "bnubseen_db31";
// Create connection to the database
$conn = mysqli_connect($servername,$username,$password,$dbname);
// Check handling for the connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
//Creates the SQL statement to retreive the data from the db
$sql = "SELECT studentid, dob, firstname, lastname, house, town, county, country, postcode FROM student";
$result = $conn->query($sql);

function maketable()
{
	if ($result->num_rows > 0) {
	     // output data of each row
	     while($row = $result->fetch_assoc()) {
	         echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
	     }
	} else {
	     echo "0 results";
	}
}


// $conn->close();
?>  

<head>
<title>Data in table</title>
</head>
<body>
<table border=1 align="center">
<?php
	maketable();
?>
</table>
</body>
</html>