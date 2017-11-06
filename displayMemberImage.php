<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";


$con = new mysqli($servername, $username, $password, $dbname);


 $select_path="SELECT * FROM image_table WHERE username='$theMember'";

  $var2 = mysqli_query($con, $select_path);

  $num2 = mysqli_num_rows($var2);

 if($num2 == '0'){

    while($row3=mysqli_fetch_array($var2))
    {
         $image_name=$row3["upload_image"];
         //$image_path=$row2["folder"];
         echo '<img src="images/'.$image_name.'" alt="Profile Picture" class="img-circle" width="180" height="180">';
         $_SESSION['profilePic'] = true;
    }

  }else{
      $_SESSION['profilePic'] = false;
  }



    mysqli_close($con);

?>
