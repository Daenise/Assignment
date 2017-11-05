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
   $sessionTime=$_POST['sessionTime'];
   $sessionFee=$_POST['sessionFee'];
   $maxPax=$_POST['maxPax'];
   $classType= $_POST['classTypes'];
   if (!isset($_SESSION['user']))
     $_SESSION['user'] = "Guest";
   $theTrainer = $_SESSION['user'];

   //to convert the time from am/pm to 24hours time format to store in database
   $sessionTime= date("G:i", strtotime($sessionTime));

   // Add record
   if ($_SESSION['user'] != "Guest") {
     $sql_addGroupTraining = "INSERT INTO groupsessions(title,sessionDate,sessionTime,sessionFee,maxPax,classType, sessionTrainer)
     VALUES ('$title','$sessionDate','$sessionTime','$sessionFee','$maxPax','$classType', '$theTrainer')";

     $result_addGroupTraining = mysqli_query($con, $sql_addGroupTraining);

    if ($result_addGroupTraining) {
      echo "Training session : ".$title. " successfully added.<br>";
      echo "Redirecting back to training session page...";
      header("Refresh: 5; url= trainingSession.html");
    }
    else {
       echo "Error adding a group training session : " . mysqli_error($con);
       mysqli_error($con);
     }
   }

  mysqli_close($con);
?>
