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

  //to update training record
  $theTrainer = $_SESSION['theTrainer'];
  $sessionDate = $_POST['sessionDate'];
  $sessionTime = $_POST['sessionTime'];
  $sessionFee = $_POST['sessionFee'];
  $sessionStatus = $_POST['sessionStatus'];
  $typeOfClass = $_POST['typeOfClass'];

  // personal session
  $notes = $_POST['notes'];

  // group session
  $sessionType = $_POST['sessionType'];


  if ($typeOfClass == "Personal") {
    $updatePRecord= "UPDATE trainingsessions SET sessionDate = '$sessionDate', sessionTime = '$sessionTime',
    sessionFee = '$sessionFee', sessionStatus='$sessionStatus', notes = '$notes' WHERE sessionTrainer = '$theTrainer'" ;
      $result = mysqli_query($con, $updatePRecord);
  } else {
    $updateGRecord= "UPDATE trainingsessions SET sessionDate = '$sessionDate', sessionTime = '$sessionTime',
    sessionFee = '$sessionFee', sessionStatus='$sessionStatus', classType = '$sessionType' WHERE sessionTrainer = '$theTrainer'" ;
      $result = mysqli_query($con, $updateGRecord);
  }



  if ($result) {
    echo "Training record is successfully updated.<br>";
    echo "Redirecting back to training history page...";
    header("Refresh: 3; url= trainerTrainingHist.php");
  }
  else {
     echo "Error updating training record : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
 ?>
