<?php

session_start();
include("connection.php");

// get user id
$id = $_SESSION['user_id'];
// get username sent through the ajax
$username = $_POST['updateusername'];

$sql = "SELECT *FROM users WHERE username ='$username'";
$result = mysqli_query($link,$sql);
if(mysqli_num_rows($result) > 0){
    
echo "<div class='alert alert-danger'>Username already taken ! try another username</div>";exit;
exit;
}
// run query
$sql = "UPDATE users SET username= '$username' WHERE user_id = '$id'";
$result = mysqli_query($link,$sql);
if (!$result) {
  echo "<div class='alert alert-danger'>There was an error in updating the username Please try again later</div>";exit;

}



 ?>
