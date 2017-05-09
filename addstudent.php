<?php
//inc files placed before anything else
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// including the styling templates
include('templates/partials/header.php');
include('templates/partials/nav.php');

if (isset($_POST['SumbitStudent'])) {
	//initialising the variable
	$fulldob ="";
		//coverting int to string variable then concatenating to use for the fulldob
		$year = (string)$_POST['txtyear'];
		$month = (string)$_POST['txtmonth'];
		$day = (string)$_POST['txtday'];
		$fulldob = $year . "/" . $month . "/" . $day;
	//Construction of the DB query INSERT into student(attributes) then taking what was posted on HTML and inserting into the table while creating a new row using the studentid.
	if(!$conn->query("INSERT INTO student (studentid,password,dob,firstname,lastname,house,town,county,country,postcode) VALUES (" . $_POST['txtstudentid'] . ",'" . password_hash($_POST['txtpassword'], PASSWORD_DEFAULT) . "','" . $fulldob . "','" . $_POST['txtfirstname'] . "','" . $_POST['txtlastname'] . "','" . $_POST['txthouse'] . "','" . $_POST['txttown'] . "','" . $_POST['txtcounty'] . "','" . $_POST['txtcountry'] . "','" . $_POST['txtpostcode'] . "')"));
	{
	//error handling
	//if error occurs in the connection
		if($conn->error)
		{	
			// display what the error is
			printf("<p class='bg-danger'> Error: " . $conn->error . "</p>");
		} else
		{
			// display message for user success
			echo "<p class='bg-success'> User Created </p>";
		}
	}
}	
?>
<head>
	<title>Add Student Form</title>
</head>
<body>
	<div class="container">
		<!-- Creation of the form -->
		<h2>Add Student</h2>
		<form name="frmcreate" class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label for="Create a ID here" class="col-sm-2 control-label" >* ID </label>
				<div class="col-sm-10">
					<input name="txtstudentid" type="text" class="form-control" placeholder="ID" required="" /><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="Create a password here" class="col-sm-2 control-label" >* Password </label>
				<div class="col-sm-10"> 
					<input name="txtpassword" type="password" class="form-control" placeholder="Password" required=""/><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="Insert your date of birth here" class="control-label" >* Date of Birth: DD/MM/YYYY </label>
				<input name="txtday" type="text" class="form-control" placeholder="Day " required="" /><br/>
				<input name="txtmonth" type="text" class="form-control" placeholder="Month " required="" /><br/>
				<input name="txtyear" type="text" class="form-control" placeholder="Year " required="" /><br/>
			</div>
			<div class="form-group">
				<label for="Input your firstname" class="col-sm-2 control-label" >First Name </label>
				<div class="col-sm-10">
					<input name="txtfirstname" type="text" class="form-control" placeholder="First Name" /><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="Input your surname" class="col-sm-2 control-label" >Surname </label>
				<div class="col-sm-10">
					<input name="txtlastname" type="text" class="form-control" placeholder="Last Name" /><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="input your address" class="col-sm-2 control-label" >Number and Street </label>
				<div class="col-sm-10">
					<input name="txthouse" type="text" class="form-control" placeholder="Number and Street" /><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="input your town" class="col-sm-2 control-label" >Town </label>
				<div class="col-sm-10">
					<input name="txttown" type="text" class="form-control" placeholder="Town" /><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="input your county" class="col-sm-2 control-label" >County </label>
				<div class="col-sm-10">
					<input name="txtcounty" type="text" class="form-control" placeholder="County" /><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="input your country" class="col-sm-2 control-label" >Country </label>
				<div class="col-sm-10">
					<input name="txtcountry" type="text" class="form-control" placeholder="Country" /><br/>
				</div>
			</div>
			<div class="form-group">
				<label for="input your postcode" class="col-sm-2 control-label" >Postcode </label>
				<div class="col-sm-10">
					<input name="txtpostcode" type="text" class="form-control" placeholder="Postcode" /><br/>
				</div>
			</div>

			<label for="* means it is required">* = required. </label>
			<input type="submit" name="SumbitStudent" class="btn btn-primary pull-right" value='Sumbit'/>
		</form>
	</div>
</div>
<?php
// closes the connection to the database (good practice)
$conn->close();
?>
</body>
</html>