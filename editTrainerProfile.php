<?php
     session_start();
     if (!isset($_SESSION['theTrainer'])){
       $fullName = "Guest";
     } else {
       $fullName = $_SESSION['fullName'];
     }

     if ($fullName == "Guest"){
?>
     <script type="text/javascript">
       alert("You are not logged in as a trainer.");
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

  $theTrainer = $_SESSION['theTrainer'];

  $con = new mysqli($servername, $username, $password, $dbname);

  $sql_getTrainer = "SELECT * FROM trainers WHERE username='$theTrainer' ";

  $query = mysqli_query($con, $sql_getTrainer);
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
    <title> Edit Trainer Profile </title>

    <style>
      .pull-right {margin-top: 5px; margin-right:3px;}
      .container {border: 1px solid black; margin-top: 30px; margin-bottom: 30px; padding: 10px}
      label {font-size: 12pt}
      .showdetail {font-weight: normal}
    </style>
  </head>

  <body class="main">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script type = "text/javascript"  src = "logoutConfirmation.js"></script>
    <script type = "text/javascript"  src = "updateValidation.js"></script>

    <header>
      <div class="row">
        <div class="col-xs-8 col-md-9 col-lg-10">
          <a href="welcomeTrainer.php">
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
              <li><a class="dropdown-item" href="displayTrainerProfile.php">View profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a class="dropdown-item" href="signOut.php" onclick="return logOut()">Logout</a></li>
            </ul>
          </div>

        </div>
        <div class="row">
          <ul class="nav nav-pills nav-justified">
            <li><a href="welcomeTrainer.php"> Home </a></li>
            <li><a href="trainingSession.php"> Record Training Session </a></li>
            <li><a href="trainerTrainingHist.php"> Training History </a></li>

          </ul>
        </div>
      </div>
    </header>

    <div class="container">
      <h2 align="center">Trainer Profile</h2>
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
            <div align="right">
              <input type="file" name="pic" accept="image/*">
            </div>
            <br />
            <br />
          </div>

          <br />

          <form name = "updateTProfile" onsubmit="return editTProfile()" method="post" action="updateTProfile.php">
          <div align="center">
            <div class="form-group col-xs-12 col-sm-5 col-md-offset-1 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-5 col-lg-4">Username :</label>
              <label class="col-xs-12 col-sm-6 col-lg-4 showdetail" name="username" id="username" ><?php echo $row['username'] ?></label>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-offset-1 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-4 col-lg-4">Password :</label>
              <div class="col-xs-12 col-sm-8 col-lg-8">
                <input type="password" name="inputPswd" class="form-text input-lg" id="inputPswd" value="<?php echo $row['password']?>" placeholder="Enter password" required>
              </div>
            </div>


            <div class="form-group col-xs-12 col-sm-6 col-md-offset-1 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-4 col-lg-4">Confirm Password :</label>
              <div class="col-xs-12 col-sm-8 col-lg-8">
                <input type="password" name="confirmPswd" class="form-text input-lg" id="confirmPswd" value="<?php echo $row['password']?>" placeholder="Confirm Password " required>
              </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-offset-1 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-4 col-lg-4">Full Name :</label>
              <div class="col-xs-12 col-sm-8 col-lg-8">
                <input type="text" name="fullName" class="form-text input-lg" id="fullName" value="<?php echo $row['fullName']?>" placeholder="Enter your Full Name" required>
              </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-offset-1 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-4 col-lg-4">Email :</label>
              <div class="col-xs-12 col-sm-8 col-lg-8">
                <input type="email" name="email" class="form-text input-lg" id="email" value="<?php echo $row['email']?>" placeholder="Enter your Email" required>
              </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-offset-1 col-lg-4 col-lg-offset-0">
              <label class="col-xs-12 col-sm-4 col-lg-4">Specialty :</label>
              <div class="col-xs-3">
              </div>
              <div class="col-xs-6 col-sm-8 col-lg-8">
                <input type="text" name="specialty" class="form-text input-lg" id="specialty" value="<?php echo $row['specialty']?>" placeholder="Enter your Specialty" required>
              </div>
            </div>

          </div>


        </div><br />
        <div class="col-xs-12 col-md-11">
          <button type="submit" class="btn btn-primary btn-lg pull-right">Update</button>
          <a href="displayTrainerProfile.php" class="btn btn-danger btn-lg pull-right">Cancel</a>
        </div><br />
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
