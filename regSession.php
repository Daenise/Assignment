<!--regSession.php-->

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
            header("Refresh: 3; url=  memberTrainingHist.php");
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
  $memberRegistration = $_POST['regSess'];

  $q_regSessions = "SELECT registeredSessions FROM members WHERE username='$theMember'";

  $r_regSessions = mysqli_query($con, $q_regSessions);

  if (mysqli_num_rows($r_regSessions) > 0){
    while ($row = mysqli_fetch_assoc($r_regSessions))
    {
      // fetch individual sessions from database
      $regSessions = explode(',', $row['registeredSessions']);

      /* check if sessions exist in database */
      foreach ($regSessions as $sID) {
        // for each session registered by user
        foreach ($memberRegistration as $aSession){
          // check if user registered session exists in database
          if ($aSession == $sID){
            echo "You already registered for this session (" . $sID . "). <br>";
            break;
          }
          else {
            // implode to store in database
            $storeRegistrations = implode(',', $memberRegistration);
            // add session
            $addSession = "UPDATE members SET registeredSessions = CONCAT(registeredSessions, ',' , '$storeRegistrations') WHERE username='$theMember'";

            // result
            $registerResult = mysqli_query($con, $addSession);


            if ($registerResult) {
              echo "The session " . $storeRegistrations . " is successfully registered. <br>";

              // increment numPax
              $increaseNumPax = "UPDATE trainingsessions SET numPax = numPax+1 WHERE sessionID = '$aSession'";

              $numPaxResult = mysqli_query($con, $increaseNumPax);

              // if numPax == maxPax, set session status to FULL (retrieve from database)
              $q_getSessions = "SELECT * FROM trainingsessions WHERE sessionID = '$aSession'";

              $r_getSessions = mysqli_query($con, $q_getSessions);


              if (mysqli_num_rows($r_getSessions) > 0){
                while ($row = mysqli_fetch_assoc($r_getSessions)){
                  //if ($row['numPax'] == $row['maxPax']) {
                    $q_updateStatus = "UPDATE trainingsessions SET status='Full',
                     numPax= numPax WHERE numPax = '$row[maxPax]'";
                    $r_updateStatus = mysqli_query($con, $q_updateStatus);
                }
              }
            else {
              echo "Error register a session : " . mysqli_error($con);
              mysqli_error($con);
            }
          }
        }
      }
    }
  }
}
  mysqli_close($con);
 ?>
