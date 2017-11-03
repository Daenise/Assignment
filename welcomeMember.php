<?php
         session_start();
         $fullName = $_SESSION['fullName'];
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
  <title> Welcome Page For Member </title>
  <style>
    h1{font-style: italic;}
    .pull-right {margin: 5px;}
    .title{text-align:center;
            color:#6d4c41;}
    .notice{background-color: #fffde7;}
    .zumba{color:#ff6d00;}
    .notice2{background-color: #e8f5e9;
                margin:0;
                width:auto;
                height:auto;}
    .heart{color:#d50000;}

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
      <br>
      <div class="input-group-btn col-xs-4 col-md-3 col-lg-2 pull-right">
          <button type="button" class="btn btn-default btn-md dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"></span>
              &nbsp;<label id="memberName"></label>
            <b class="caret"></b>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="displayMemberProfile.html">View profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a class="dropdown-item" href="signOut.php" onclick="return logOut()">Logout</a></li>
          </ul>
        </div>
      </div>

    <div class="row">
      <ul class="nav nav-pills nav-justified">
        <li class="active"><a href="welcomeMember.php"> Home </a></li>
        <li><a href="registerSession.php"> Training Session </a></li>
        <li><a href="memberTrainingHist.html"> Training History </a></li>
        <li><a href="reviewTrainer.html"> Review Trainer </a></li>
      </ul>
      </div>
     <div>
    <label id="greeting" style="font-size:30px;"></label>
    </div>

      <div class ="notice">
        <div class="container">
          <h2 class="title"> NOTICE FOR MEMBER </h2>
          <br />
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <img src="images/zumba.jpg" alt="zumba poster" class="img-responsive">
                <br /><br />
              </div>
              <div class = "col-md-offset-8 col-lg-offset-8">
                <h1><span class="glyphicon glyphicon-pushpin zumba"></span> Zumba Party </h1>
                <h2> Come Join Us ! </h2>
                <h3> Date : 20 OCTOBER 2017<br /><br />  Time : 10:00AM <br /><br />
                  Venue : STUDIO ROOM 1 <br /><br />  Fee : Free </h3> <br />
                <a href="registerSession.php" class="btn btn-default btn-lg center-block col-xs-5 col-sm-5 col-md-5"> Register now! </a> <br /><br />
              </div>

          </div>
      </div>
    </div>

      <div class="notice2">
      <div class ="container">
        <h2 class="title"> HEALTHY TIPS FOR MEMBER </h2>
        <br />
        <div class="row">
            <div class="thumbnail col-xs-12 col-s-12 col-md-6 col-lg-6">
            <img src ="images/foodPyramid.jpg" alt="food pyramid" class="img-responsive" height="300px">
            </div>
            <div class = "caption col-xs-12 col-md-6 col-lg-6">
              <h2><span class="glyphicon glyphicon-heart heart"></span> Eat healthy, Live healthy !  </h2>
              <h3> The Food Pyramid is designed to make healthy eating easier.
                Healthy eating is about getting the correct amount of nutrients –
                 protein, fat, carbohydrates, vitamins and minerals you need
                 to maintain good health.<br /><br /> Healthy eating involves:
                <ul>
                  <li>plenty of vegetables, salad and fruit</li>
                  <li>a serving of wholemeal cereals and breads, potatoes,
                    pasta and rice at every meal -
                    go for wholegrain varieties wherever possible</li>
                  <li>some milk, yoghurt and cheese
                  <li>some meat, poultry, fish, eggs, beans and nuts</li>
                  <li>a very small amount of fats, spreads and oils</li>
                  <li>and a very small amount or no foods and drinks high in fat,
                     sugar and salt</li>
                   </p>
                </ul>
              </h3>
              <br />
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
          <a class="footNav" href="memberTrainingHist.html">Training History</a>
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
     document.getElementById('greeting').innerHTML ='<b>' + greet + '</b>, ' + fullName;
     document.getElementById('memberName').innerHTML = fullName;
  </script>
</html>
