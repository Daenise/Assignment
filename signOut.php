<!--signOut.php-->
<?php
  session_start();

  if (isset($_SESSION['theMember'])){
    unset($_SESSION["theMember"]);
  } else {
    unset($_SESSION["theTrainer"]);
  }

  echo 'Successfully signed out';
  header("Location: index.html");
  session_destroy();
?>
