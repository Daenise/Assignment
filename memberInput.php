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
   $level=$_POST['level'];

   // Add record
   $sql_registerM = "INSERT INTO  members (username,password,fullName,email,level) VALUES ('$username','$password','$fullName','$email','$level')";

   $result_registerM = mysqli_query($con, $sql_registerM);

  if ($result_registerM) {
    echo "Member ".$username. " successfully added.";
  }
  else {
     echo "Error adding member : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
?>
