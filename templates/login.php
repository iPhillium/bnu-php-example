<!-- displays information message -->
<?php 
echo $message;
?>

<!-- ID input -->
<br>
<div class="container">
	<form name='frmLogin' action='authenticate.php' class='form-horizontal' method='post'>
		<div class='form-group'>
			<label for='inputStudentID' class='col-sm-2 control-label'>Student ID:</label>
			<div class='col-sm-10'>
				<input type='text' name='txtid' class='form-control' placeholder="ID">
			</div>
		</div>
		<!-- Password Input -->
		<div class='form-group'>
			<label for='inputPassword' class='col-sm-2 control-label' >Password:</label>
			<div class='col-sm-10'>
				<input type='password' name='txtpwd' class='form-control' placeholder="Password">
			</div>
		</div>
		<!-- Form submit button -->
		<input type= 'submit' value='Login' name='btnlogin' class='btn btn-primary col-sm-1' />
	</form>
</div>