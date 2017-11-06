<!--trainerInput.php-->
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
   $username=$_POST['username'];
   $password=$_POST['password'];
   $fullName=$_POST['fullName'];
   $email=$_POST['email'];
   $specialty=$_POST['specialty'];
   $avgRating = 0;

   // Check if username already exists in members and trainers table
   $sql_existsInM = "SELECT * FROM members WHERE username='$username'";
   $sql_existsInT = "SELECT * FROM trainers WHERE username='$username'";
   $result = mysqli_query($con, $sql_existsInM);
   $result2 = mysqli_query($con, $sql_existsInT);

   if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0)
   {
     echo "This username has been taken. Please choose another username.";
   }
   else {
     // Add record
     $sql_registerT = "INSERT INTO  trainers (username,password,fullName,email,specialty, averageRating) VALUES ('$username','$password','$fullName','$email','$specialty, $avgRating')";

     //result
     $result_registerT = mysqli_query($con, $sql_registerT);
     //print output
    if ($result_registerT) {
      echo "Trainer ".$username. " successfully registered.<br>";
      echo "Redirecting back to login page...";
      header("Refresh: 5; url= index.html");
    }
    else {
       echo "Error adding trainer : " . mysqli_error($con);
       mysqli_error($con);
     }
   }

  mysqli_close($con);
?>
