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

if(isset($_POST['regSess'])){
  if (is_array($_POST['regSess'])) {
    foreach($_POST['regSess'] as $value){
      echo $value;
    }
  } else {
    $value = $_POST['regSess'];
    echo $value;
  }
}

//to update member profile
  $theMember = $_SESSION['user'];


  if ($value) {
    echo "The Session : ".$sessionID. " is successfully registered.<br>";
    echo "Redirecting back to training history page...";
    header("Refresh: 5; url=  memberTrainingHist.php");
  }
  else {
     echo "Error updating member profile : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);


 ?>
