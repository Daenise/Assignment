<?php


$upload_image = $_FILES["pic"]["name"];
$folder="images/";

move_uploaded_file($_FILES["pic"]["tmp_name"], "$folder".$_FILES["pic"]["name"]);

$sql = mysqli_query($con,"SELECT * FROM image_table WHERE username = '$theTrainer'");
$num = mysqli_num_rows($sql);

if($num >0){
  mysqli_query($con,"UPDATE image_table SET folder='$folder',upload_image='$upload_image' WHERE username='$theTrainer'");


}else{
  mysqli_query($con,"INSERT INTO image_table VALUES('$theTrainer','$folder','$upload_image')");
}


?>
