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

//Handling for deleting
//upon sumbiting the input DeleteForms it checks to see if it still exists
if(isset($_POST['selectedRows'])) {
	// searches through array for any of the studentid numbers
	foreach($_POST['selectedRows'] as $row) {
		// deletes the id's that were in the assoc array and then escapes from deletion.
		$conn->query("DELETE FROM student WHERE studentid = '" . mysqli_real_escape_string($conn, $row) . "'");
	}
}


// Creates the SQL statement to retrieve the data from the db via the conn (connection)
$sql = "SELECT studentid, dob, firstname, lastname, house, town, county, country, postcode FROM student";
$result = $conn->query($sql);
// including the styling templates
include('templates/partials/header.php');
include('templates/partials/nav.php');
?>

<head>
	<title>Data in table</title>
</head>
<body>
	<div class="container">
	<!-- Creation of form for the table functionality I need -->
		<form action="students.php" method="post">
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
							"</td><td><input type=\"checkbox\" name=\"selectedRows[]\" value=\"".$row["studentid"]."\"></td>".
							"</td></tr>";
						}
					} else {
						echo "0 results";
	// print_r($result);
					}
					?>
				</tbody>
			</table>
			<input type="submit" name="DeleteForms" class="btn btn-danger pull-right" value='Delete'/>
		</form>
	</div>
</div>
<?php
// closes the connection if a connection wants to be created elsewhere
$conn->close();
?>
</body>
</html>