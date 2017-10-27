<?php
         session_start();
         $username=$_SESSION['user'];
         echo'Welcome :'. $username.'<br>';

?>
<html>
<body>
  <a href="SIGNOUT.php">
  click here to log out</a>
</body>
</html>
