<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST['submit']))
{

 if (!$con) {
  die("Could not connect to database.");
  }
 echo "Database connected."."</br>";

 $username = $_POST['username'];
 $password = $_POST['password'];


 if(!empty($username))
 {
   $sql = "SELECT * FROM members WHERE username='$username' and password='$password'";
   $result = mysqli_query($con, $sql);

   if (mysqli_num_rows($result) > 0)
   {
    $_SESSION['user']=$username;
    header('Location:welcome.php');

   }
   else
   {
    echo 'Your username or password is incorrect.';
   }
 }
 else
 {
  echo 'Enter both username and password.';
 }
}

?>
