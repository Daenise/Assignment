<!--loginValidation.php-->

<?php
session_start();
//connect to databse
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

//declaration
$_SESSION['fullName'] = "Guest";

//to check user have enter the correct username and password
if(isset($_POST['submit']))
{

 if (!$con)
  {
  die("Could not connect to database.");
  }

 $username = $_POST['username'];
 $password = $_POST['password'];

 if(!(empty($username) || empty($password)))
 {
   // Queries
   $q_member = "SELECT * FROM members WHERE username='$username' and password='$password'";
   $q_trainer = "SELECT * FROM trainers WHERE username='$username' and password='$password'";

   // Results
   $r_member = mysqli_query($con, $q_member);
   $r_trainer = mysqli_query($con, $q_trainer);

   if (mysqli_num_rows($r_member) > 0)
   {
     //get member full name
     $_SESSION['theMember'] = $username;

      while ($row = mysqli_fetch_assoc($r_member))
      {
        $_SESSION['fullName'] = $row["fullName"];
      }

    header('Location: welcomeMember.php');
   }
   else if (mysqli_num_rows($r_trainer) > 0)
   {
     //get trainer full name
      $_SESSION['theTrainer'] = $username;
       while ($row = mysqli_fetch_assoc($r_trainer))
       {
         $_SESSION['fullName'] = $row["fullName"];
       }

     header('Location: welcomeTrainer.php');
   }
   else {
     echo
<<<_END
     Username or password is incorrect. <br>
     No account yet? Register now as a member or a trainer! <br>
_END;
     echo '<br>Redirecting back to home page...';
     header("refresh: 5; url=index.html");
   }
 }
  else
  {
   echo 'Please enter both username and password.';

   echo '<br> Redirecting back to home page...';
   header("refresh: 3; url=index.html");
  }
}
mysqli_close($con);
?>
