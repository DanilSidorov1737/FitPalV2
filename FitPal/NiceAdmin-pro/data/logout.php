<?php
 session_start();

  echo "Logout Successfully ";
  session_destroy();   // function that Destroys Session 
  header("Location: http://localhost:8888/FitPalV2/FitPal/NiceAdmin-pro/pages-login.php");
?>