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
   echo "Database connected."."</br>";

   // Query
   $title=$_POST['title'];
   $sessionDate=$_POST['sessionDate'];
   $sessionTime=$_POST['sessionTime'];
   $new_time = DateTime::createFromFormat('h:i A', $sessionTime);
   $sessionTime = $new_time->format('H:i:s');
   $sessionFee=$_POST['sessionFee'];

   // Add record
   $sql_addPersonalTraining = "INSERT INTO  personalsessions (title,sessionDate,sessionTime,sessionFee) VALUES ('$title','$sessionDate','$sessionTime','$sessionFee')";

   $result_addPersonalTraining = mysqli_query($con, $sql_addPersonalTraining);

  if ($result_addPersonalTraining) {
    echo "Training session : ".$title. " successfully added.";
    echo "Redirecting back to training session page";
    header("Refresh: 5; url= trainingSession.html");
  }
  else {
     echo "Error adding a personal training session : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
?>
