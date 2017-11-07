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

  $memberRegistration = $_POST['regSess'];

  $q_regSessions = "SELECT registeredSessions FROM members WHERE username='$theMember'";

  $r_regSessions = mysqli_query($con, $q_regSessions);

  if (mysqli_num_rows($r_regSessions) > 0){
    while ($row = mysqli_fetch_assoc($r_regSessions))
    {
      // fetch individual sessions from database
      $regSessions = explode(',', $row['registeredSessions']);

      //foreach($regSessions as $index => $sID){
      /* check if sessions exist in database */
      foreach ($regSessions as $sID) {
        // for each session registered by user
        foreach ($memberRegistration as $aSession){
          // check if user registered session exists in database
          if ($aSession == $sID){
            echo "You already registered for this session (" . $sID . "). <br>";
            break;
            echo"Directing back to register session page";
            header("Refresh:5; url=registerSession.php");
          }
          else {
            echo "hello2";
            // implode to store in database
            $storeRegistrations = implode(',', $memberRegistration);
            // add session
            $addSession = "UPDATE members SET registeredSessions = CONCAT(registeredSessions, '$storeRegistrations') WHERE username='$theMember'";

            // result
            $registerResult = mysqli_query($con, $addSession);


            if ($registerResult) {
              echo "The session " . $storeRegistrations . " is successfully registered. <br>";
              echo"Directing back to register session page";
              header("Refresh:5; url=registerSession.php");

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
              echo"Directing back to register session page";
              header("Refresh:5; url=registerSession.php");
            }
          }
        }
      }
    }
  }
}
  mysqli_close($con);
 ?>
