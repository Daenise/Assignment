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
  $theMember = $_SESSION['user'];
  $pwd = $_POST['inputPswd'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $level = $_POST['level'];

$updateM= "UPDATE members SET password = '$pwd', fullName = '$fullName',
email = '$email', level='$level' WHERE username = '$theMember'" ;
  $result = mysqli_query($con, $updateM);

  if ($result) {
    echo "Member Profile : ".$theMember. " is successfully updated.";
    echo "Redirecting back to member profile page";
    header("Refresh: 5; url= displayMemberProfile.html");
  }
  else {
     echo "Error updating member profile : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);


 ?>
