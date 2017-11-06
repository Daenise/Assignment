<!--updateRecord.php-->
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
  $sessionID = $_POST['sID'];
  $sessionDate = $_POST['sessionDate'];
  $sessionTime = $_POST['sessionTime'];
  $sessionFee = $_POST['sessionFee'];
  $sessionStatus = $_POST['sessionStatus'];
  $typeOfClass = $_POST['typeOfClass'];

  // personal session
  $resultP = false;
  $resultG = false;

  if ($typeOfClass == "Personal") {
    $notes = $_POST['notes'];
    $updatePRecord= "UPDATE trainingsessions SET sessionDate = '$sessionDate', sessionTime = '$sessionTime',
    sessionFee = '$sessionFee', status='$sessionStatus', notes = '$notes' WHERE sessionTrainer = '$theTrainer' AND sessionID = '$sessionID'" ;
      $resultP = mysqli_query($con, $updatePRecord);
  }
  // group session
  else {
    $sessionType = $_POST['sessionType'];
    $updateGRecord= "UPDATE trainingsessions SET sessionDate = '$sessionDate', sessionTime = '$sessionTime',
    sessionFee = '$sessionFee', status='$sessionStatus', classType = '$sessionType' WHERE sessionTrainer = '$theTrainer' AND sessionID = '$sessionID'" ;
      $resultG = mysqli_query($con, $updateGRecord);
  }


  if ($resultP) {
    echo "Personal training record S" . $sessionID . " is successfully updated.<br>";
    echo "Redirecting back to training history page...";
    header("Refresh: 3; url= trainerTrainingHist.php");
  }
  else if ($resultG) {
    echo "Group training record S" . $sessionID . " is successfully updated.<br>";
    echo "Redirecting back to training history page...";
    header("Refresh: 3; url= trainerTrainingHist.php");
  }
  else {
     echo "Error updating training record : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
 ?>
