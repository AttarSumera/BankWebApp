<?php
   session_start();
   unset($_SESSION["email"]);
   unset($_SESSION["password"]);
   
   echo 'Logging You Out...';
   header('Refresh: 2; URL = index.php');
?>