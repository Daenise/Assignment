<?php
  session_start();
   // Connect to database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "helpfit";
   $con = new mysqli($servername, $username, $password, $dbname);

   if (!$con) {
    die("Could not connect to database.");
    }

   // Query
   $title=$_POST['title'];
   $sessionDate=$_POST['sessionDate'];
   $sessionTimes=$_POST['sessionTime'];
   $sessionFee=$_POST['sessionFee'];
   $type=$_POST['type'];
   $theTrainer = $_SESSION['theTrainer'];
   $status = "Available";
   $notes = "";

   //to convert the time from am/pm to 24hours time format to store in database
   $sessionTime= date("G:i", strtotime($sessionTimes));

   // Add record
   $numPax = 0;
   if ($type == "Personal") {
     $maxPax = 1;
     $classType = "-";
   } else {
     $maxPax=$_POST['maxPax'];
     $classType= $_POST['classTypes'];

     if($numPax == $maxPax){
       $status="Full";
     }
   }
   $sql_addTrainingSession = "INSERT INTO trainingsessions(title,sessionDate,sessionTime,sessionFee,maxPax,numPax,type,classType,status,notes,sessionTrainer)
   VALUES ('$title','$sessionDate','$sessionTime','$sessionFee','$maxPax','$numPax','$type','$classType','$status','$notes','$theTrainer')";

   $result_addTrainingSession = mysqli_query($con, $sql_addTrainingSession);

  if ($result_addTrainingSession) {
    echo "Training session : ".$title. " successfully added.<br>";
    echo "Redirecting back to training session page...";
    header("Refresh: 5; url= trainingSession.php");
  }
  else {
     echo "Error adding a training session : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
?>
