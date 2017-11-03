<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

 if (!$con) {
  die("Could not connect to database.");
  }

 $sql_getSession = "SELECT * FROM trainingSessions JOIN trainers
  ON sessionTrainer = username  WHERE status='Available'";

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
              <span class="glyphicon glyphicon-user"></span> John Tan
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
            <li class="active"><a href="registerSession.html"> Training Session </a></li>
            <li><a href="memberTrainingHist.html"> Training History </a></li>
            <li><a href="reviewTrainer.html"> Review Trainer </a></li>
          </ul>
          </div>
      </div>
    </header>

    <div class="container">
      <h2 align="center">Available Training Sessions</h2>

      <div class="row">
        <div class="form-group">
          <div class="col-xs-5 col-sm-3 pull-right">
            <select class="form-control">
              <option value="Sort by" selected disabled>Sort by</option>
              <option value="sessionID">Session ID</option>
              <option value="Date">Date</option>
              <option value="Class Type">Class Type</option>
            </select>
          </div>
        </div>
      </div>

      <br />

      <div class="table-responsive">
        <table class="table table-hover table-condensed table-bordered">
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
            <th>Trainer's Review </th>
          </tr>

            <?php

            while($row = mysqli_fetch_array($query) )
            {
              echo '
              <tr>
              <td align="center">
              <input type="checkbox" class="checkbox" name="checkBox"
              value="'.$regSess.'"></td>';
              echo '
              <td align="center"> '.$row['sessionID']. ' </td>
              <td> '.$row['title']. '</td>
              <td align="center"> '.$row['sessionDate']. '</td>
              <td align="center"> '.$row['sessionTime']. '</td>
              <td align="center"> '.$row['sessionFee']. '</td>
              <td align="center"> '.$row['type']. '</td>
              <td align="center"> '.$row['status']. '</td>
              <td align="center"> '.$row['fullName']. '</td>
              <td align="center"> '.$row['specialty']. '</td>
              </tr>
              ';

            }
            ?>

        </table>
      </div>
      <br />

      <div class="col-xs-12 col-md-11 pull-right">
        <form action="regSession.php" method="post">
          <button type="submit" class="btn btn-primary btn-lg pull-right">REGISTER</button>
        </form>
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
        <a class="footNav" href="registerSession.html">Register Session</a>&nbsp;  &#9474; &nbsp;
        <a class="footNav" href="memberTrainingHist.html">Training History</a>&nbsp; &#9474; &nbsp;
        <a class="footNav" href="reviewTrainer.html">Review Trainer</a>
      </nav>
      </div>
    </footer>

  </body>
</html>
