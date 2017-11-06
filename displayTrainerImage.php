<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";


$con = new mysqli($servername, $username, $password, $dbname);


 $select_path="SELECT * FROM image_table WHERE username='$theTrainer'";

  $var = mysqli_query($con, $select_path);

  $num = mysqli_num_rows($var);

  if($num == '0'){

    while($row2=mysqli_fetch_array($var))
    {
           $image_name=$row2["upload_image"];
         //$image_path=$row2["folder"];
         echo '<img src="images/'.$image_name.'" alt="Profile Picture" class="img-circle" width="180" height="180">';
    }

  }else{
      echo '<img src="images/userProfilePic.png"  alt="Profile Picture" class="img-circle" width="180" height="180">';
  }




    mysqli_close($con);
?>
