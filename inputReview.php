<!-- inputReview.php -->

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

  // Connect to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "helpfit";
  $con = new mysqli($servername, $username, $password, $dbname);

  if (!$con) {
   die("Could not connect to database.");
   }

  // Store values from user input in review form
  $rating = $_POST['trainerRating'];
  $comments = $_POST['reviewComments'];
  $sessionID = $_POST['sessionID'];
  $sessionTrainer = $_POST['sessionTrainer'];

  $theMember = $_SESSION['theMember'];

  // Add record
  $sql_addReview = "INSERT INTO  reviews (rating, comments, sessionID, sessionTrainer, reviewedBy) VALUES ('$rating','$comments','$sessionID', '$sessionTrainer', '$theMember')";

  $result_addReview = mysqli_query($con, $sql_addReview);

 if ($result_addReview) {
   echo "Review successfully added. <br>";
   echo "Redirecting back to training history page...";
   header("Refresh: 5; url=  memberTrainingHist.php");
 }
 else {
    echo "Error submitting a review : " . mysqli_error($con);
    mysqli_error($con);
  }

 mysqli_close($con);


 ?>
