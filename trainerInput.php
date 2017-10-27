<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "helpfit";
 $con = new mysqli($servername, $username, $password, $dbname);

 $username=$_POST['username'];
 $password=$_POST['password'];
 $fullName=$_POST['fullName'];
 $email=$_POST['email'];
 $specialty=$_POST['specialty'];


 $sql = "INSERT INTO  trainer (username,password,fullName,email,specialty)
         VALUES ('$username','$password','$fullName','$email','$specialty')";

if (mysqli_query($con, $sql)) {
  echo "Trainer ".$username. " successfully added.";
}
else {
   echo "Error adding member : " . mysqli_error($con);
 }
mysqli_close($con);
?>
