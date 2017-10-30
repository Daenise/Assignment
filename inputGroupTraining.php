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
   $sessionFee=$_POST['sessionFee'];
   $maxPax=$_POST['maxPax'];
   $classType=$_POST['classType'];

   //to convert the time from am/pm to 24hours time format to store in database
   $sessionTime= date("G:i", strtotime($sessionTime));


   // Add record
   $sql_addGroupTraining = "INSERT INTO  groupsessions (title,sessionDate,sessionTime,sessionFee,maxPax,classType) VALUES ('$title','$sessionDate','$sessionTime','$sessionFee','$maxPax','$classType')";

   $result_addGroupTraining = mysqli_query($con, $sql_addGroupTraining);

  if ($result_addGroupTraining) {
    echo "Training session : ".$title. " successfully added.";
    echo "Redirecting back to training session page";
    header("Refresh: 5; url= trainingSession.html");
  }
  else {
     echo "Error adding a group training session : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
?>
