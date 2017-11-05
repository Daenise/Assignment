<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

$_SESSION['fullName'] = "Guest";

if(isset($_POST['submit']))
{

 if (!$con) {
  die("Could not connect to database.");
  }

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
    $_SESSION['theMember'] = $username;

    while ($row = mysqli_fetch_assoc($r_member))
    {
      $_SESSION['fullName'] = $row["fullName"];
    }

    header('Location: welcomeMember.php');
   }
   else if (mysqli_num_rows($r_trainer) > 0)
   {
     $_SESSION['theTrainer'] = $username;
     while ($row = mysqli_fetch_assoc($r_trainer))
     {
       $_SESSION['fullName'] = $row["fullName"];
     }

     header('Location: welcomeTrainer.php');
   }
   else {
     echo 'Your username or password is incorrect.';
   }
 }
 else
 {
  echo 'Please enter both username and password.';
 }
 echo '<br>Redirecting back to home page...';
 header("refresh: 3; url=index.html");
}

mysqli_close($con);
?>
