<?php
session_start();
unset($_SESSION["user"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
echo 'Successfully signed out';
header("Location: index.html");
session_destroy();
?>
