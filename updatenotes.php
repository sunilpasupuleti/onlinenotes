<?php

session_start();
include("connection.php");

// get the id o f note sent through ajax

$id = $_POST['id'];

// get the content of note

$note = $_POST['note'];
$time = time();

$sql = "UPDATE notes SET note='$note',time ='$time' WHERE id = '$id' ";
$result = mysqli_query($link,$sql);
if (!$result) {
  echo "error";
}



 ?>
