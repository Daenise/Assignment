<!--registerSession.php-->
<?php
     session_start();
     if (!isset($_SESSION['theMember'])){
       $fullName = "Guest";
     } else {
       $fullName = $_SESSION['fullName'];
     }

     if ($fullName == "Guest"){
?>
    <!--if user did not log in -->
     <script type="text/javascript">
       alert("You are not logged in as a member.");
     </script>
<?php
      header("Refresh:0; url=index.html");
     }
//connect to db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

if (!$con) {
  die("Could not connect to database.");
  }
  //query
  $sql_getSession = "SELECT * FROM trainingSessions JOIN trainers
  ON sessionTrainer = username  WHERE status='Available'";

  //result
  $query = mysqli_query($con, $sql_getSession);

  if(!$query){
    die("Error : " . mysqli_error($con));
  }

  ?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href ="css/bootstrap-social.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title> Training History </title>
    <style>
      .pull-right {margin: 5px;}
      .container {border: 1px solid black; margin-top: 30px; margin-bottom: 30px; padding: 10px}
    </style>
  </head>

  <body class="main">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script type = "text/javascript"  src = "logoutConfirmation.js"></script>

    <header>
      <div class="row">
        <div class="col-xs-8 col-md-9 col-lg-10">
          <a href="welcomeMember.php">
            <img src="images/helpfitLogo.png" alt="HELPFit Logo" width="350" height="90">
          </a>
        </div>
          <br />

          <div class="input-group-btn col-xs-4 col-md-3 col-lg-2 pull-right">
            <button type="button" class="btn btn-default btn-md dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span> &nbsp;<label><?php echo $fullName ?></label>
              <b class="caret"></b>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="displayMemberProfile.php">View profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="dropdown-item" href="signOut.php" onclick="return logOut()">Logout</a></li>
            </ul>
          </div>
        </div>

        <div class="row">
          <ul class="nav nav-pills nav-justified">
            <li><a href="welcomeMember.php"> Home </a></li>
            <li class="active"><a href="registerSession.php"> Training Session </a></li>
            <li><a href=" memberTrainingHist.php"> Training History </a></li>
          </ul>
          </div>
      </div>
    </header>


    <div class="container">
      <form name="M_registerSess" action="regSession.php" method="post">
      <h2 align="center">Available Training Sessions</h2>

      <br />

      <div class="table-responsive">
        <table class="table table-hover table-condensed table-bordered table-striped">
          <tr class="success">
            <th>Choose <br />Session(s)</th>
            <th>SessionID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Fee </th>
            <th>Class <br />Type</th>
            <th>Status</th>
            <th>Trainer's Name </th>
            <th>Trainer's Specialty </th>
            <th>Trainer's Average Rating </th>
          </tr>

            <?php
            //fetch data from database
            while($row = mysqli_fetch_array($query) )
            {
              //declaration
              $timeStr = $row['sessionTime'];
              $timeDisplay = date('h:i A', strtotime($timeStr));
              $sessionID = $row['sessionID'];
              $title = $row['title'];
              $sessionDate = $row['sessionDate'];
              $sessionFee = $row['sessionFee'];
              $type = $row['type'];
              $status= $row['status'];
              $fullName= $row['fullName'];
              $specialty= $row['specialty'];
              $avgRating = round($row['averageRating'], 1);

              if ($avgRating == 0) {
                $avgRating = "No ratings yet";
              }

              //print out the output
              echo '
              <tr>
              <td align="center">
              <input type="checkbox" class="checkbox" name="regSess[]"
              value="'.$sessionID.'"></td>';
              echo '
              <td align="center"> '.$sessionID.'</td>
              <td> '.$title.'</td>
              <td align="center"> '.$sessionDate.'</td>
              <td align="center"> '.$timeDisplay. '</td>
              <td align="center"> '.$sessionFee.'</td>
              <td align="center"> '.$type.'</td>
              <td align="center"> '.$status.'</td>
              <td align="center"> '.$fullName.'</td>
              <td align="center"> '.$specialty.'</td>
              <td align="center"> '.$avgRating.'</td>
              </tr>
              ';
            }

            ?>

        </table>
      </div>
      <br />

      <div class="col-xs-12 col-md-11 pull-right">
          <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg pull-right">REGISTER</button>
        </a>
      </div>
    </div>

    <footer>
      <div align="center">
        Copyright &copy; HELPFIT 2017
      </div><br />
      <div align="center">
          <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/"> <span class="fa fa-linkedin"></span></a>
          <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/"> <span class="fa fa-facebook"></span></a>
          <a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/"> <span class="fa fa-instagram"></span></a>
          <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/"> <span class="fa fa-twitter"></span></a>
      </div></br />
      <div align="center">
      <nav>
        <a class="footNav" href="welcomeMember.php">Home</a>&nbsp; &#9474; &nbsp;
        <a class="footNav" href="registerSession.php">Register Session</a>&nbsp;  &#9474; &nbsp;
        <a class="footNav" href=" memberTrainingHist.php">Training History</a>
      </nav>
      </div>
    </footer>

  </body>
</html>
