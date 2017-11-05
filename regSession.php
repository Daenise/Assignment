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

if(isset($_POST['regSess'])){
  if (is_array($_POST['regSess'])) {
    foreach($_POST['regSess'] as $value){
      echo $value;
    }
  } else {
    $value = $_POST['regSess'];
    echo $value;
  }
  $regS = implode(",",$_POST["regs=Sess"]);
}

//to update member profile
$theMember = $_SESSION['theMember'];
$regSession= "INSERT INTO members (title) VALUES ('$regSess')";
$query = mysqli_query($con, $regSession);


  if ($value) {
      echo "The Session : ".$sessionID. " is successfully registered.<br>";
      echo "Redirecting back to training history page...";
      header("Refresh: 5; url=  memberTrainingHist.php");
    }
    else {
       echo "Error register a session : " . mysqli_error($con);
       mysqli_error($con);
     }

  mysqli_close($con);

 ?>
