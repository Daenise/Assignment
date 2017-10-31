<?php
session_start();
unset($_SESSION["user"]); 
echo 'Successfully signed out';
header("Location: index.html");
session_destroy();
?>
