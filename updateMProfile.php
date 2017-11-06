<!--updateMProfile.php-->
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
  $theMember = $_SESSION['theMember'];
  $pwd = $_POST['inputPswd'];
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $level = $_POST['level'];

  //query
  $updateM= "UPDATE members SET password = '$pwd', fullName = '$fullName',
  email = '$email', level='$level' WHERE username = '$theMember'" ;
  //result
  $result = mysqli_query($con, $updateM);
  //print output
  if ($result) {
    echo "Member Profile : ".$theMember. " is successfully updated.<br>";
    echo "Redirecting back to member profile page...";
    header("Refresh: 5; url= displayMemberProfile.php");
  }
  else {
     echo "Error updating member profile : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);


 ?>
