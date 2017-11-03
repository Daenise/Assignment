<?php
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

   //to convert the time from am/pm to 24hours time format to store in database
   $sessionTime= date("G:i", strtotime($sessionTime));

   // Add record
   $sql_addPersonalTraining = "INSERT INTO  personalsessions (title,sessionDate,sessionTime,sessionFee) VALUES ('$title','$sessionDate','$sessionTime','$sessionFee')";

   $result_addPersonalTraining = mysqli_query($con, $sql_addPersonalTraining);

  if ($result_addPersonalTraining) {
    echo "Training session : ".$title. " successfully added.<br>";
    echo "Redirecting back to training session page...";
    header("Refresh: 5; url= trainingSession.html");
  }
  else {
     echo "Error adding a personal training session : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
?>
