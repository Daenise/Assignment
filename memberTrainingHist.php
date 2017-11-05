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
      .session-group {border-bottom: 1px solid black;}
      .formContent{background-color:#fafafa;
                  color:#000000;}
      .formDivider{position: relative;
                  border-bottom: 1px solid lightgray;
                  margin-top: 10px; }
    </style>
  </head>

  <body class="main">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script type = "text/javascript"  src = "logoutConfirmation.js"></script>
    <script type = "text/javascript"  src = "formValidation.js"></script>

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
              <span class="glyphicon glyphicon-user"></span> &nbsp;<label><?php echo $fullName; ?></label>
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
            <li class="active"><a href=" memberTrainingHist.php"> Training History </a></li>
          </ul>
          </div>
      </div>
    </header>

    <div class="container">
      <h2 align="center">Training History</h2>

      <div class="row">
        <div class="col-xs-5 col-sm-3">
          <div class="input-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary glyphicon glyphicon-search" type="button">
              </button>
            </span>
          </div>
        </div>

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
        <table id="trainingHistData" onkeyup="searchTrainingHist()" class="table table-hover table-condensed table-bordered">
          <tr class="success">
            <th>SessionID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Time</th>
            <th>Class Type</th>
            <th>Review Trainer</th>
          </tr>
          <tr>
            <td class="info">S100</td>
            <td>Be a Good Sport with Cross Country!</td>
            <td>2017-09-30</td>
            <td>6:00 PM</td>
            <td class="warning">Group (Sport)</td>
            <td align="center"><a data-toggle="modal" data-target="#session1">Review</a></td>
          </tr>
          <tr>
            <td class="info">S101</td>
            <td>Build Up Your Skills with Trainer Ben</td>
            <td>2017-10-05</td>
            <td>10:00 AM</td>
            <td class="danger">Personal</td>

          </tr>
          <tr>
            <td class="info">S102</td>
            <td>Personal Zumba + Yoga Session</td>
            <td>2017-10-07</td>
            <td>4:00 PM</td>
            <td class="danger">Personal</td>
          </tr>
          <tr>
            <td class="info">S103</td>
            <td>Light Exercise with Trainer Tina</td>
            <td>2017-11-01</td>
            <td>2:00 PM</td>
            <td class="danger">Personal</td>
          </tr>
        </table>
        <div align="center">
          <ul class="pagination">
            <li><a href="#">&laquo;</a></li>
            <li class='active'><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
        </div>
      </div>

    </div>














    <!-- Pop-up overlay to write a review for session S100 -->
    <div class="container2">
      <div class="modal fade" id="session1" role="dialog">
        <div class="modal-dialog">
          <div class="reviewTrainer_1">

            <div class="FormContent">
              <form name="review1" action="inputReview.php" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3 class="modal-title" align="center">Write a Review</h3>
                </div>

                <div class="modal-body" align="right">
                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Session ID :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        S100
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Title :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        Be a Good Sport with Cross Country!
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Date :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        2017-09-30
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Time :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        6:00 PM
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Fee (RM):</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        RM 10
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Status :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        Completed
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Class type :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        Group (Sport)
                      </div>
                    </div>
                  </div>


                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Max participants :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        10
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Num participants :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        8
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Trainer's name :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        Ben Lee
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Trainer's specialty :</label>
                      <div class="col-xs-6 col-sm-6" align="left">
                        Sport
                      </div>
                    </div>
                  </div>

                  <div class="formDivider"></div>

                  <br />

                  <input type="hidden" name="sessionID" value="100">
                  <input type="hidden" name="sessionTrainer" value="trainer123">

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Rating :</label>
                      <div class="col-xs-6 col-sm-8" align="left">
                        <input type="radio" name="trainerRating" class="input-md" id="trainerRating" value="1">&nbsp;
                        <input type="radio" name="trainerRating" class="input-md" id="trainerRating" value="2">&nbsp;
                        <input type="radio" name="trainerRating" class="input-md" id="trainerRating" value="3">&nbsp;
                        <input type="radio" name="trainerRating" class="input-md" id="trainerRating" value="4">&nbsp;
                        <input type="radio" name="trainerRating" class="input-md" id="trainerRating" value="5" required>
                        <br />
                        &nbsp;1 &nbsp; 2  &nbsp; 3 &nbsp; 4 &nbsp; 5
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="form-group">
                      <label class="col-xs-5 col-sm-4">Comments :</label>
                      <div class="col-xs-6 col-sm-6">
                        <textarea name="reviewComments" class="form-control input-md" rows="2" id="reviewComments" required></textarea>
                      </div>
                    </div>
                  </div>

                  <br />

                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                      <button type="submit" class="btn btn-primary btn-md pull-right">Submit</button>
                    </div>
                  </div>

                </div>
              </form>
            </div>

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
        <a class="footNav" href="welcomeMember.php">Home</a>&nbsp; &#9474; &nbsp;
        <a class="footNav" href="registerSession.php">Register Session</a>&nbsp;  &#9474; &nbsp;
        <a class="footNav" href=" memberTrainingHist.php">Training History</a>
      </nav>
      </div>
    </footer>

  </body>
</html>
