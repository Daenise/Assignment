<?php
         session_start();
         $name=$_SESSION['name'];
         echo'welcome :'. $name.'<br>';

?>
<html>
<body>
  <a href="SIGNOUT.php">
  click here to log out</a>
</body>
</html>
