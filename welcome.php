<?php
         session_start();
         $username=$_SESSION['user'];
         echo'Welcome :'. $username.'<br>';

?>
<html>
<body>
  <a href="SIGNOUT.php">
  click here to log out (add session_destroy();)</a>
</body>
</html>
