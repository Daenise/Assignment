<?php
session_start();
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

 if (!$con) {
  die("Could not connect to database.");
  }

  if (!isset($_SESSION['fullName']))
    $_SESSION['fullName'] = "Guest";
  if (!isset($_SESSION['user']))
    $_SESSION['user'] = "Guest";

  $theMember = $_SESSION['user'];
  $con = new mysqli($servername, $username, $password, $dbname);

  $sql_getMember = "SELECT * FROM members WHERE username='$theMember'";

  $query = mysqli_query($con, $sql_getMember);
  $row = mysqli_fetch_array($query);

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
    <title> Member Profile </title>

    <style>
      .pull-right {margin-top: 5px; margin-right:3px;}
      .container {border: 1px solid black; margin-top: 30px; margin-bottom: 30px; padding: 10px}
      label {font-size: 12pt}
      .showdetail {font-weight: normal;}
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
              <span class="glyphicon glyphicon-user"></span> &nbsp;<label><?php echo $_SESSION['fullName'] ?></label>
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
              <li><a href="registerSession.php"> Training Session </a></li>
              <li><a href=" memberTrainingHist.php"> Training History </a></li>
            </ul>
        </div>
      </div>
    </header>

    <div class="container">
      <h2 align="center">Member Profile</h2>
        <br />
        <div class="row">
          <div class="col-xs-12 col-sm-5 col-md-2 col-md-offset-1 col-lg-4" align="center">
            <br />
            <h4>&nbsp;&nbsp; My Profile Picture</h4>
            <br />
            &nbsp; &nbsp;
            <img src="images/userProfilePic.png"  alt="Profile Picture" class="img-circle" width="180" height="180">
            <br />
            <br />
            <br />
            <br />
          </div>

          <br />
          <br />
          <br />

          <div align="center">
            <br />
            <div class="form-group col-xs-12 col-sm-5 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-5 col-lg-4">Username :</label>
              <label class="col-xs-12 col-sm-6 col-lg-4 showdetail"><?php echo $row['username'] ?></label>
            </div>

            <div class="form-group col-xs-12 col-sm-5 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-5 col-lg-4">Full Name :</label>
              <label class="col-xs-12 col-sm-6 col-lg-4 showdetail"><?php echo $row['fullName'] ?></label>
            </div>

            <div class="form-group col-xs-12 col-sm-5 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-5 col-lg-4">Email :</label>
              <label class="col-xs-12 col-sm-6 col-lg-4 showdetail"><?php echo $row['email'] ?></label>
            </div>

            <div class="form-group col-xs-12 col-sm-5 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-5 col-lg-4">Level :</label>
              <label class="col-xs-12 col-sm-6 col-lg-4 showdetail"><?php echo $row['level'] ?></label>
            </div>
          </div>
        </div>

        <br />

        <div class="col-xs-12 col-md-11">
          <a href="editMemberProfile.php">
            <button type="submit" class="btn btn-primary btn-lg pull-right">Edit</button>
          </a>
        </div>
        <br />
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
