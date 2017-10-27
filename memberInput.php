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
 $level=$_POST['level'];


 $sql = "INSERT INTO  member (username,password,fullName,email,level)
         VALUES ('$username','$password','$fullName','$email','$level')";

if (mysqli_query($con, $sql)) {
  echo "Member ".$username. " successfully added.";
}
else {
   echo "Error adding member : " . mysqli_error($con);
 }
mysqli_close($con);
?>
