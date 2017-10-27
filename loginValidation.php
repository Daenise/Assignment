<?php
session_start();
if(isset($_POST['submit']))
{
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "helpfit";
 $con = new mysqli($servername, $username, $password, $dbname);
 if (!$con) {
  die("Could not connect to database.");
  }
 echo "Database connected."."</br>";

 $username = $_POST['username'];
 $password = $_POST['password'];


 if(!empty($username))
 {
   $sql = "select * from members WHERE username='$username' and password='$password'";
   $result = mysqli_query($con, $sql);

   if (mysqli_num_rows($result) > 0)
   {
    $_SESSION['user']=$username;
    header('location:welcome.php');

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
