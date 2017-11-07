<?php


$query="SELECT * FROM image_table WHERE username='$theMember'";

$result = mysqli_query($con, $query);

 $num =  mysqli_num_rows($result);

if($num>0){
  while($row1=mysqli_fetch_array($result))
  {
         $image_name=$row1["upload_image"];
         $image_path=$row1["folder"];

      echo '<img src="'.$image_path.'/'.$image_name.'" alt="Profile Picture" class="img-circle" width="180" height="180">';
  }



 }else{
     echo '<img src="images/userProfilePic.png"  alt="Profile Picture" class="img-circle" width="180" height="180">';
 }




   mysqli_close($con);
?>
