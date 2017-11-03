<?php
         session_start();
         $fullName = $_SESSION['fullName'];
         if(!isset($fullName)) {
           $fullName = "Guest";
?>
         <script type="text/javascript">
           alert("You are not logged in as a user.");
         </script>
<?php
          header("url=index.html");
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
  <title> Welcome Page For Trainer </title>
  <style>
  h1{font-style: italic;}
  .title{text-align:center;
          color:#6d4c41;}
  .notice{background-color: #fffde7;}
  .zumba{color:#ff6d00;}
  .notice2{background-color: #ffccbc;
              margin:0;
              width:auto;
              height:auto;}
  </style>

</head>

<body class="main">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script type = "text/javascript"  src = "logoutConfirmation.js" ></script>

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
              <span class="glyphicon glyphicon-user"></span>
              &nbsp;<label id="trainerName"></label>
              <b class="caret"></b>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="displayTrainerProfile.html">View profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="dropdown-item" href="signOut.php" onclick="return logOut()">Logout</a></li>
            </ul>
          </div>
    </div>
    <div class="row">
      <ul class="nav nav-pills nav-justified">
        <li class="active"><a href="welcomeTrainer.php"> Home </a></li>
        <li><a href="trainingSession.html"> Record Training Session </a></li>
        <li><a href="trainerTrainingHist.php"> Training History </a></li>

      </ul>
    </div>
     <div>
    <label id="greetings" style="font-size:30px;"></label>
    </div>

      <div class ="notice">
        <div class="container">
          <h2 class="title"> NOTICE FOR TRAINER </h2>
          <br />
          <div class = "row">
          <div class ="col-xs-12 col-s-12 col-md-6 col-lg-6">
              <img src ="images/zumba.jpg" alt="zumba poster" class="img-responsive"><br />
            </div>
            <div class = "col-md-offset-8 col-lg-offset-8">
              <h1><span class="glyphicon glyphicon-pushpin zumba"></span> Zumba Party </h1>
              <h3> Date : 20 OCTOBER 2017<br /><br />  Time : 10:00AM <br /><br />
                Venue : STUDIO ROOM 1 <br /><br />* Attendance is compulsory
                for all trainers. </h3>
            </div>
          </div>
      </div>
    </div>

      <div class ="notice2">
        <div class="container">
        <h2 class="title"> TRAINING FOR ALL TRAINERS ! </h2>
        <br />
        <div class="row">
            <div class="thumbnail col-xs-12 col-s-12 col-md-6 col-lg-6">
            <img src ="images/trainer.jpg" alt="trainer" class="img-responsive" height="300px">
            </div>
            <div class = "col-md-offset-8 col-lg-offset-8">
              <h1><span class="glyphicon glyphicon-pushpin zumba"></span> October training </h1>
              <h3> Date : 25 OCTOBER 2017 <br /><br /> Time : 8:00AM <br /><br />
                Venue : STUDIO ROOM 1 <br /><br />* Attendance is compulsory
                for all trainers. </h3>
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
          <a class="footNav" href="trainingSession.html">Record Training Session</a>&nbsp;  &#9474; &nbsp;
          <a class="footNav" href="trainerTrainingHist.php">Training History</a>
        </nav>
        </div>
      </footer>
  </body>
    <script type="text/javascript">
        var myDate = new Date();
        var time = myDate.getHours();
        var greet;
        if (time >= 5 && time < 12)
        {
          greet = 'Good morning';
        }
        else if (time > 12 && time < 18)
        {
          greet = 'Good afternoon';
        }
        else if (time >= 18)
        {
          greet = 'Good evening';
        }
        else
        {
          greet='Good day';
        }
      var fullName = <?php echo json_encode($fullName); ?>;
     document.getElementById('greetings').innerHTML ='<b>' + greet + '</b>, ' + fullName;
     document.getElementById('trainerName').innerHTML = fullName;
    </script>
</html>
