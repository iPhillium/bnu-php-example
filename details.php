<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {

      // build an sql statment to update the student details
      $sql = "update student set firstname ='" . $_POST['txtfirstname'] . "',";
      $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
      $sql .= "house ='" . $_POST['txthouse']  . "',";
      $sql .= "town ='" . $_POST['txttown']  . "',";
      $sql .= "county ='" . $_POST['txtcounty']  . "',";
      $sql .= "country ='" . $_POST['txtcountry']  . "',";
      $sql .= "postcode ='" . $_POST['txtpostcode']  . "' ";
      $sql .= "where studentid = '" . $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p class='bg-primary'>Your details have been updated</p>";

   }
   else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

   <h2>My Details</h2>
   <form name="frmdetails" class="form-horizontal" action="" method="post">
   <div class="form-group">
   <label for="inputFirstName" class="col-sm-2 control-label">First Name:</label>
   <input name="txtfirstname" type="text" class="form-control" value="{$row['firstname']}" /><br/>
   <label for="inputLastName" class="col-sm-2 control-label">Last Name:</label>
   <input name="txtlastname" type="text" class="form-control" value="{$row['lastname']}" /><br/>
   <label for="inputNumberStreet" class="col-sm-2 control-label">Number and Street:</label>
   <input name="txthouse" type="text" class="form-control" value="{$row['house']}" /><br/>
   <label for="inputTown" class="col-sm-2 control-label">Town:</label>
   <input name="txttown" type="text" class="form-control" value="{$row['town']}" /><br/>
   <label for="inputCounty" class="col-sm-2 control-label">County:</label>
   <input name="txtcounty" type="text" class="form-control" value="{$row['county']}" /><br/>
   <label for="inputCountry" class="col-sm-2 control-label">Country:</label>
   <input name="txtcountry" type="text" class="form-control" value="{$row['country']}" /><br/>
   <label for="inputPostcode" class="col-sm-2 control-label">Postcode:</label>
   <input name="txtpostcode" type="text" class="form-control" value="{$row['postcode']}" /><br/>
   <input type="submit" value="Save" name="submit" class="btn btn-default"/>
   </form>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
