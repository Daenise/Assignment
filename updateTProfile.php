<?php
session_start();
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

 if (!$con) {
  die("Could not connect to database.");
  }

//to update member profile
  $theTrainer = $_SESSION['user'];
  $pwd = $_POST['inputPswd'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $specialty = $_POST['specialty'];

$updateT= "UPDATE trainers SET password = '$pwd', fullName = '$fullName',
email = '$email', specialty='$specialty' WHERE username = '$theTrainer'" ;
  $result = mysqli_query($con, $updateT);

  if ($result) {
    echo "Member Profile : ".$theTrainer. " is successfully updated.<br>";
    echo "Redirecting back to trainer profile page...";
    header("Refresh: 5; url= displayTrainerProfile.php");
  }
  else {
     echo "Error updating trainer profile : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
 ?>
