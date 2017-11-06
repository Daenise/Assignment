<?php
     session_start();
     if (!isset($_SESSION['theMember'])){
       $fullName = "Guest";
     } else {
       $fullName = $_SESSION['fullName'];
     }

     if ($fullName == "Guest"){
?>
     <script type="text/javascript">
       alert("You are not logged in as a member.");
     </script>
<?php
      header("Refresh:0; url=index.html");
     }

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

 if (!$con) {
  die("Could not connect to database.");
  }

  //to check the value that user selected and store into database
  $theMember = $_SESSION['theMember'];
  $regCB= implode(',', $_POST['regSess']);

  if(isset($_POST['submit'])){
    if (isset($_POST['regSess'])){
      // $regSession= "INSERT INTO members (regID) VALUES ('".$regCB."')";
      $regSession= "UPDATE members SET registeredSessions = '$regCB' WHERE username='$theMember'";
      $result = mysqli_query($con, $regSession);

      if ($result){
        echo "Session(s) : ".$regCB. " successfully registered.<br>";
        header("Refresh: 3; url=  memberTrainingHist.php");
      }
    }
    else {
      echo "Error register a session : " . mysqli_error($con);
       mysqli_error($con);
     }
   }

  mysqli_close($con);

 ?>
