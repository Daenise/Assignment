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

 if(!(empty($username) || empty($password)))
 {
   // Queries
   $q_member = "SELECT * FROM members WHERE username='$username' and password='$password'";
   $q_trainer = "SELECT * FROM trainers WHERE username='$username' and password='$password'";

   // Results
   $r_member = mysqli_query($con, $q_member);
   $r_trainer = mysqli_query($con, $q_trainer);

   if (mysqli_num_rows($r_member) > 0)
   {
    $_SESSION['user'] = $username;
    
    while ($row = mysqli_fetch_assoc($r_member))
    {
      $_SESSION['fullName'] = $row["fullName"];
    }

    header('Location: welcomeMember.php');
   }
   else if (mysqli_num_rows($r_trainer) > 0)
   {
     $_SESSION['user'] = $username;
     header('Location: welcomeTrainer.html');
   }
   else {
     echo 'Your username or password is incorrect.';
   }
 }
 else
 {
  echo 'Please enter both username and password.';
 }
}

mysqli_close($con);
?>
