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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type = "text/javascript"  src = "formValidation.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type = "text/javascript"  src = "logoutConfirmation.js"></script>
    <style>
      .pull-right {margin: 5px;}
      .container {border: 1px solid black; margin-top: 30px; margin-bottom: 30px; padding: 10px}
      .session-group {border-bottom: 1px solid black;}
      .formContent{background-color:#fafafa;
                  color:#000000;}
    </style>

  </head>

  <body class="main">

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
              <li class="active"><a href="trainerTrainingHist.php"> Training History </a></li>

            </ul>
        </div>
      </div>
    </header>

    <div class="container">
      <h2 align="center">Training History</h2>

      <div class="row">
        <div class="col-xs-5 col-sm-3">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-secondary glyphicon glyphicon-search" type="button">
              </button>
            </span>

            <form action="#" method="get" onsubmit="return false;">

              <input type="text" size="30" name="s" id="s" onkeyup="searchTrainingHist();" class="form-control"  placeholder="Search for..." autofocus>
            </form>

          </div>
        </div>


      </div>

      <br />
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "helpfit";
        $con = new mysqli($servername, $username, $password, $dbname);

        if (!$con) {
          die("Could not connect to database.");
        }

        $theTrainer = $_SESSION ['theTrainer'];

        // Pagination logic
        /* Initial value of page is 1
           If page variable is set, get page number
        */
        if (isset($_GET["page"])) {
          $page = $_GET["page"];
        }
        else {
          $page = 1;
        }

        // if current page is empty or 1, set the firstElement to 0
        if ($page == "" || $page == "1") {
          $firstElement = 0;
          $_SESSION['prev'] = $page;
          $_SESSION['next'] = $page + 1;
        }
        // else, set the firstElement to (current page * 5) - 5
        else {
          $firstElement = ($page * 5) - 5;
          $_SESSION['page'] = $firstElement;
          $_SESSION['prev'] = $page - 1;
          $_SESSION['next'] = $page + 1;
        }

         // Query for all sessions created by theTrainer, limiting to 5 per page
         $q_sessions = "SELECT * FROM trainingsessions WHERE sessionTrainer='$theTrainer' LIMIT $firstElement, 5";

         // Result of the query
         $r_sessions = mysqli_query($con, $q_sessions);

         // initialize counter for pop-up/modal reference
         $trainingRecordNo = "1";

         // Number of rows (sessions) from query result
         $numOfSess = mysqli_num_rows($r_sessions);

         if ($numOfSess > 0)
         {
           echo "<div class='table-responsive'>" .
                   "<table id='t' class='table table-hover table-condensed table-bordered table-striped'>" .
                     "<tr id='r' class='success'>
                       <th onclick='sortTrainingHist(0)'>Session ID <span class='glyphicon glyphicon-sort'></span></th>
                       <th onclick='sortTrainingHist(1)'>Title <span class='glyphicon glyphicon-sort'></span></th>
                       <th onclick='sortTrainingHist(2)'>Date <span class='glyphicon glyphicon-sort'></span></th>
                       <th onclick='sortTrainingHist(3)'>Time <span class='glyphicon glyphicon-sort'></span></th>
                       <th onclick='sortTrainingHist(4)'>Class Type <span class='glyphicon glyphicon-sort'></span></th>
                     </tr>";
            while ($row = mysqli_fetch_assoc($r_sessions))
            {
              // Output the table data
              if ($row['type'] == "Personal") {
                $displayType = "<td class='info'>" . $row['type'];
                $displayTypeRecord = $row['type'];
              } else {
                $displayType = "<td class='warning'>" . $row['type'] . " (" . $row['classType'] . ")";
                $displayTypeRecord = $row['type'];
              }

              // Convert time to String to print AM/PM
              $timeStr = $row['sessionTime'];
              $timeDisplay = date('h:i A', strtotime($timeStr));

                echo   "<tbody id='tb'>
                          <tr id='r'>
                            <td><a data-toggle='modal' data-target='#updateTRecord" . $trainingRecordNo . "'> S" . $row['sessionID'] . "</a></td>

                            <td>" . $row['title'] . "</td>
                            <td>" . $row['sessionDate'] . "</td>
                            <td>" . $timeDisplay . $displayType . "</td>
                          </tr>
                        </tbody>";

                /* Pop-up overlay to view and update record for each respective session */
                echo '<div class="container2">
                  <div class="modal fade" id="updateTRecord' . $trainingRecordNo . '" role="dialog">
                    <div class="modal-dialog">

                    <form method="post" action="updateRecord.php">

                        <div class="FormContent">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="modal-title" align="center">' . $displayTypeRecord . ' Training Record</h2>
                          </div>

                          <input type="hidden" name="sID" value="' . $row['sessionID'] . '">

                          <div class="modal-body" align="right">
                            <div class="row">
                              <div class="form-group">
                                <label class="col-xs-5 col-sm-4">Title :</label>
                                <div class="col-xs-6 col-sm-6" align="left">' .
                                  $row['title'] .
                                '</div>
                              </div>
                            </div>

                            <br />

                            <div class="row">
                              <div class="form-group">
                                <label class="col-xs-5 col-sm-4">Date :</label>
                                <div class="col-xs-6 col-sm-6" align="left">
                                <input type="date" name="sessionDate" class="form-control input-md" id="sessionDate" placeholder="Enter Date (e.g. DD-MM-YYY)" value="' . $row['sessionDate'] . '" required>
                                </div>
                              </div>
                            </div>

                            <br />

                            <div class="row">
                              <div class="form-group">
                                <label class="col-xs-5 col-sm-4">Time :</label>
                                <div class="col-xs-6 col-sm-6" align="left">
                                  <input type="time" name="sessionTime" class="form-control input-md" id="sessionTime"
                                    placeholder="Enter Time (e.g. 10:00 AM)" value="' . $row['sessionTime'] . '" required>
                                </div>
                              </div>
                            </div>

                            <br />

                            <div class="row">
                              <div class="form-group">
                                <label class="col-xs-5 col-sm-4">Fee (RM):</label>
                                <div class="col-xs-6 col-sm-6" align="left">
                                  <input type="number" name="sessionFee" class="form-control input-md" id="sessionFee" min="0" placeholder="Enter fee" value="' . $row['sessionFee'] .'" required>
                                </div>
                              </div>
                            </div>

                            <br />

                            <div class="row">
                              <div class="form-group">
                                <label class="col-xs-5 col-sm-4">Status :</label>
                                <div class="col-xs-6 col-sm-6" align="left">
                                  <select class="form-control" id="sessionStatus" name="sessionStatus" required>
                                    <option value="Choose status" selected disabled>Choose status</option>
                                    <option value="Cancelled" ';

                                    if ($row['status'] == "Cancelled")
                                      echo 'selected="selected" ';

                                    echo '>Cancelled</option>

                                    <option value="Completed" ';

                                    if ($row['status'] == "Completed")
                                      echo 'selected="selected" ';

                                    echo '>Completed</option>
                                    <option value="Available" ';

                                    if ($row['status'] == "Available")
                                      echo 'selected="selected" ';

                                    echo '>Available</option>
                                  </select>
                                </div>
                              </div>
                            </div>';

                            if ($row['type'] == "Group") {
                              echo '<br />
                              <input type="hidden" name="typeOfClass" value="Group">
                              <div class="row">
                                <div class="form-group">
                                  <label class="col-xs-5 col-sm-4">Class type :</label>
                                  <div class="col-xs-6 col-sm-6" align="left">
                                    <select class="form-control" id="sessionType" name="sessionType" required>
                                      <option value="Choose class type" selected disabled>Choose class type</option>
                                      <option value="Sport" ';

                                      if ($row['classType'] == "Sport")
                                        echo 'selected="selected" ';

                                      echo '>Sport</option>

                                      <option value="Dance" ';

                                      if ($row['classType'] == "Dance")
                                        echo 'selected="selected" ';

                                      echo '>Dance</option>
                                      <option value="MMA" ';

                                      if ($row['classType'] == "MMA")
                                        echo 'selected="selected" ';

                                      echo '>MMA</option>
                                    </select>' .

                                  '</div>
                                </div>
                              </div>

                              <br />

                              <div class="row">
                                <div class="form-group">
                                  <label class="col-xs-5 col-sm-4">Max participants :</label>
                                  <div class="col-xs-6 col-sm-6" align="left">' .
                                    $row['maxPax'] .
                                  '</div>
                                </div>
                              </div>

                              <br />

                              <div class="row">
                                <div class="form-group">
                                  <label class="col-xs-5 col-sm-4">Num participants :</label>
                                  <div class="col-xs-6 col-sm-6" align="left">' .
                                    $row['numPax'] .
                                  '</div>
                                </div>
                              </div>';
                            } else {
                              echo '<br />
                              <input type="hidden" name="typeOfClass" value="Personal">
                              <div class="row">
                                <div class="form-group">
                                  <label class="col-xs-5 col-sm-4">Notes :</label>
                                  <div class="col-xs-6 col-sm-6" align="left">
                                    <input type="text" name="notes" class="form-control input-md" id="notes" placeholder="Enter notes" value="' . $row['notes'] . '">
                                  </div>
                                </div>
                              </div>';
                            }

                            echo'<br />
                            <div class="row">
                              <div class="col-xs-12 col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg pull-right">Update</button>
                              </div>
                            </div>';

                          echo '</div>
                        </div>

                    </form>

                    </div>
                  </div>
                </div>';

                $trainingRecordNo++;

            }

            echo "</table>
                  </div>
                  <div align='center'>
                    <ul class='pagination'>";
                    /* Pagination */
                    $q_sessions = "SELECT * FROM trainingsessions WHERE sessionTrainer='$theTrainer'";

                    // Result of the query
                    $r_sessions = mysqli_query($con, $q_sessions);

                    // Number of rows (sessions) from query result
                    $numOfSess = mysqli_num_rows($r_sessions);

                    // divide total number of sessions by 5 to display on each page
                    $totPages = $numOfSess / 5;
                    $totPages = round($totPages);

                    // if current page is the last, set next (pagination button) to current page
                    if ($_SESSION['next'] > $totPages) {
                      $_SESSION['next'] = $page;
                    }

                    // loop to print the pagination
                    for ($n = 1; $n <= $totPages; $n++) {
                      // print the prev (<<) pagination button
                      if ($n == 1) {
                        echo "<li><a href='trainerTrainingHist.php?page=" . $_SESSION['prev'] . "'>&laquo;</a></li>";
                      }

                      // if current page, set to active
                      if ($n == $page) {
                        echo "<li class='active'><a href='trainerTrainingHist.php?page=" . $page . "'> $page </a></li>";
                      }
                      else {
                        echo "<li><a href='trainerTrainingHist.php?page=" . $n . "'> $n </a></li>";
                      }

                      // print the next (>>) pagination button
                      if ($n == $totPages) {
                        echo "<li><a href = 'trainerTrainingHist.php?page=" . $_SESSION['next'] .
                        "'>&raquo;</a></li>";
                      }

                    }

                    echo "
                    </ul>
                  </div>
                  <br />
                </div>";
         }
         else
         {
           echo "No training history to show.";
         }

        mysqli_close($con);
      ?>

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
