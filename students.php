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
//Creates the SQL statement to retrieve the data from the db via the conn (connection)
$sql = "SELECT studentid, dob, firstname, lastname, house, town, county, country, postcode FROM student";
$result = $conn->query($sql);
// closes the connection if a connection wants to be created elsewhere
$conn->close();
//including the styling templates
include('templates/partials/header.php');
include('templates/partials/nav.php');
?>

<head>
	<title>Data in table</title>
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<!-- table header -->
			<thead>
				<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>House</th><th>Town</th><th>County</th><th>Country</th><th>Postcode</th></tr>
			</thead>
			<!-- table body -->
			<tbody>
				<?php
				if ($result->num_rows > 0) {
// output data of each row
					while($row = $result->fetch_assoc()) {
						echo "<tr><td>". $row["studentid"]. 
						"</td><td>". $row["firstname"]. 
						"</td><td>". $row["lastname"]. 
						"</td><td>". $row["house"]. 
						"</td><td>". $row["town"]. 
						"</td><td>". $row["county"].
						"</td><td>". $row["country"]. 
						"</td><td>". $row["postcode"].
						"</td><td><input type=\"checkbox\" value=\"".$row["studentid"]."\"></td>".
						"</td></tr>";
					}
				} else {
					echo "0 results";
// print_r($result);
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>