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
  
  /*
  $regCB= implode(',', $_POST['regSess']);
  //query
  $getRegSess = "SELECT registeredSessions FROM members WHERE username='$theMember'";
  //result
  $regSession = mysqli_query($con,$getRegSess);

  if(isset($_POST['submit'])){
    if (isset($_POST['regSess'])){
      //check user already registered the session
      foreach($)
      //add session that user registered
      $registerSession= "UPDATE members SET registeredSessions =CONCAT(registeredSessions,',' ,'$regCB') WHERE username='$theMember'";
      //result
      $result = mysqli_query($con, $registerSession);
      if ($result){
        echo "The Session : ".$regCB. " is successfully registered.<br>";

      //add numPax by one when member registered
      while($row = mysqli_fetch_assoc($regSession)){
        $sess = explode(',',$row['registeredSessions']);
        foreach ($sess as $session){
          $countNumPax = "UPDATE trainingsessions SET numPax = numPax+1 WHERE sessionID = '$session'";
          $count= mysqli_query($con,$countNumPax);
        }

        if (isset($_POST['regSess'])){
          //check user already registered the session
          foreach($sess as ){
            $checkSess =
          }
          //add session that user registered
          $registerSession= "UPDATE members SET registeredSessions =CONCAT(registeredSessions,',' ,'$regCB') WHERE username='$theMember'";
          //result
          $result = mysqli_query($con, $registerSession);
          if ($result){
            echo "The Session : ".$regCB. " is successfully registered.<br>";
        }
        else {
          echo "Error register a session : " . mysqli_error($con);
          mysqli_error($con);
        }
      }
    }
  }
  $numPax = 0;
  if($numPax == $maxPax){
    $status="Full";
  }
  */


  mysqli_close($con);
 ?>
