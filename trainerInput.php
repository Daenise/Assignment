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
   $username=$_POST['username'];
   $password=$_POST['password'];
   $fullName=$_POST['fullName'];
   $email=$_POST['email'];
   $specialty=$_POST['specialty'];

   // Add record
   $sql_registerT = "INSERT INTO  trainers (username,password,fullName,email,specialty) VALUES ('$username','$password','$fullName','$email','$specialty')";

   $result_registerT = mysqli_query($con, $sql_registerT);

  if ($result_registerT) {
    echo "Trainer ".$username. " successfully added.";
  }
  else {
     echo "Error adding trainer : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
?>
