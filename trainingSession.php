<!--trainingSession.php-->
<?php
     session_start();
     if (!isset($_SESSION['theTrainer'])){
       $fullName = "Guest";
     } else {
       $fullName = $_SESSION['fullName'];
     }

     if ($fullName == "Guest"){
?>
    <!--if user did not log in -->
     <script type="text/javascript">
       alert("You are not logged in as a trainer.");
     </script>
<?php
      header("Refresh:0; url=index.html");
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
  <link rel="stylesheet" href="styles.css">
  <title> Record Training Session </title>
  <style>
  .record{background-color: #6d4c41;
          color:#ffffff;}
  .record:hover{background-color: #d7ccc8;
                  color:#000000;}
  .title{text-align: center;
          font-style: oblique;
          background-color: #fff3e0;}

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
        <a href="welcomeTrainer.php">
          <img src="images/helpfitLogo.png" alt="HELPFit Logo" width="350" height="90">
        </a>
      </div>
      <br>
        <div class="input-group-btn col-xs-4 col-md-3 col-lg-2 pull-right">
            <button type="button" class="btn btn-default btn-md dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user"></span> &nbsp;<label><?php echo $fullName ?></label>
              <b class="caret"></b>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="displayTrainerProfile.php">View profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="dropdown-item" href="signOut.php" onclick="return logOut()">Logout</a></li>
            </ul>
          </div>
    </div>
    <div class="row">
      <ul class="nav nav-pills nav-justified">
        <li><a href="welcomeTrainer.php"> Home </a></li>
        <li class="active"><a href="trainingSession.php"> Record Training Session </a></li>
        <li><a href="trainerTrainingHist.php"> Training History </a></li>

      </ul>
    </div>

    <div class="title">
      <br /><h2> Record Training Session </h2><br />
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 training">
          <a href="personalTraining.php">
            <img src ="images/personalTraining.jpg" alt="Personal Training" class="img-responsive">
            <button type="button" class="btn btn-block record btn-lg" > Record Personal Training </button>
          </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 training">
          <a href="groupTraining.php">
            <img src ="images/groupTraining.jpg" alt="Group Training" class="img-responsive">
            <button type="button" class="btn btn-block record btn-lg"> Record Group Training </button><br /><br />
          </a>
        </div>
    </div>
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
        <a class="footNav" href="welcomeTrainer.php">Home</a>&nbsp; &#9474; &nbsp;
        <a class="footNav" href="trainingSession.php">Record Training Session</a>&nbsp;  &#9474; &nbsp;
        <a class="footNav" href="trainerTrainingHist.php">Training History</a>
      </nav>
      </div>
    </footer>
  </body>
</html>
