<?php
         session_start();
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
  <title> Add Personal Training Session </title>
  <style>
  h2{text-align: center;}
  .container {border: 1px solid black; margin-top: 30px; margin-bottom: 30px; padding: 10px}
  </style>

</head>

<body class="main">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </script>
  <script src="js/bootstrap.min.js"></script>
  <script type = "text/javascript"  src = "validateSession.js"></script>
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
              <span class="glyphicon glyphicon-user"></span> <label><?php echo $_SESSION['fullName'] ?></label>
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

    <div class="container">
      <h2> Add Personal Training Session </h2><br />
       <form name="addSession" onsubmit="return addPSession()" action="trainingSessions.php" method="post">
         <input type="hidden" name="type" value="Personal">
            <div class="form-group">
              <div class="table-responsive">
                <table class="table table-bordered">

                <tr>
                  <th>Title : </th>
                  <td><input type="text" name="title" placeholder="Enter Title"
                    class="form-control input-lg" id="title"></td>
                </tr>

                <script type="text/javascript" src="date.js"></script>

                <tr>
                  <th>Date : </th>
                  <td><input type="date" name="sessionDate" class="form-control input-lg" id="sessionDate"
                       placeholder="Enter Date (e.g. YYYY-MM-DD)"></td>
                </tr>

                <tr>
                  <th>Time : </th>
                  <td><input type="time" name="sessionTime" class="form-control input-lg" id="sessionTime"
                    placeholder="Enter Time (e.g. 10:00 AM)" ></td>
                </tr>

                <tr>
                  <th>Fee (RM): </th>
                  <td class="row">
                    <input type="number" name="sessionFee" class="form-control input-lg" id="sessionFee" placeholder="Enter Fee">
                  </td>
                </tr>
                </table>
            </div>
          </div>
          <div class="col-xs-12 col-md-11 pull-right">
              <button type="submit" class="btn btn-primary btn-lg pull-right" id="submit"> Add Session </button>
              <a href="trainingSession.php" class="btn btn-danger btn-lg pull-right">Back</a>
            </a>
          </div>

        </form>
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
