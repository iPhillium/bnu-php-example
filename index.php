<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

   echo template("templates/partials/header.php");

   if (isset($_GET['return'])) {
      $msg = "";
      if ($_GET['return'] == "fail") {$msg = "<p class='bg-danger'>" . "Login Failed. Please try again." . "</p>";}
      $data['message'] = "<p>$msg</p>";
   }

   if (isset($_SESSION['id'])) {
      $data['content'] = "<p class='bg-primary'>" . "Welcome to your dashboard." . "</p>";
      echo template("templates/partials/nav.php");
      echo template("templates/default.php", $data);
   } else {
      echo template("templates/login.php", $data);
   }

   echo template("templates/partials/footer.php");

?>
