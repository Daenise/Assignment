<?php
session_start();
if(isset($_POST['submit']))
{
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "helpfit";
 $con = new mysqli($servername, $username, $password, $dbname);

 $name=$_POST['username'];


 if($name!='')
 {
   $sql = "select * from user WHERE name='$name'";
   $result = mysqli_query($con, $sql);

   if (mysqli_num_rows($result) > 0)
   {
    $_SESSION['name']=$name;
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
