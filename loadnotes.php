<?php

session_start();
include("connection.php");

// get the user id
$user_id = $_SESSION['user_id'];
// run query to delete the empty notees
$sql = "DELETE FROM notes WHERE note=''";
$result = mysqli_query($link,$sql);

if(!$result){
  echo "<div class='alert alert-warning'>An occur errored</div>";exit;
}

// look for notes for user_id

$sql = "SELECT *FROM notes WHERE user_id = '$user_id' ORDER BY time DESC";
if ($result = mysqli_query($link,$sql)) {

  if(mysqli_num_rows($result) > 0){

    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      $note_id = $row['id'];
      $note = $row['note'];
      $time = $row['time'];
      $time = date("F d, Y h:i:s A",$time);
      // show notes or alert message
      echo "<div class='note'>

      <div class='col-xs-5 col-sm-3 delete'>

          <button class='btn btn-danger btn-lg' style='width:100%'>Delete</button>

      </div>

      <div class='noteheader' id='$note_id' >

        <div class='text'>$note</div>
        <div class='timetext'>$time</div>


       </div>
       </div>";

    }

  }else{
    echo "<div class='alert alert-warning'>You had not created any note yet</div>";
    exit;
  }

}else{
  echo "<div class='alert alert-warning'>Error :".mysqli_error($link)." </div>";
  exit;
}





 ?>
