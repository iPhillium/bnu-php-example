<?php


// including the styling templates
include('templates/partials/header.php');
include('templates/partials/nav.php');
?>

<head>
	<title>Add Student Form</title>
</head>
<body>
	<div class="container">
	<!-- Creation of form for the table functionality I need -->
		<form action="addstudent.php" method="post">
			<input type="submit" name="SumbitStudent" class="btn btn-danger pull-right" value='Sumbit'/>
		</form>
	</div>
</div>
<?php
// closes the connection to the database (good practice)
$conn->close();
?>
</body>
</html>
