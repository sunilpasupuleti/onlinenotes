<?php

session_start();
include("connection.php");

// define error messages

$missingcurrentpassword = "<p>Current Password required!</p>";
$incorrectcurrentpassword = "<p>The Password entered by you is incorrect !</p>";
$missingpassword = "<p>Please enter a new password</p>";
$invalidpassword = "<p>Your Password should atleast <strong>6 Characters long</strong> and include one <strong>Capital letter</strong> and one <strong>Digit</strong></p>";
$missingpassword1 = "<p>Please confirm your new Password</p>";
$differentpassword = "<p>Passwords do not match !</p>";

// check errors
if (empty($_POST["updatepassword"])) {
  $error .= $missingcurrentpassword;
}else{
  $currentpassword = $_POST["updatepassword"];
  $currentpassword = filter_var($currentpassword,FILTER_SANITIZE_STRING);
  $currentpassword = mysqli_real_escape_string($link,$currentpassword);
  $currentpassword = hash('sha256',$currentpassword);
  // check password correct or not
  $user_id  = $_SESSION['user_id'];
  $sql = "SELECT password FROM users WHERE user_id = '$user_id' ";
  $result = mysqli_query($link,$sql);
  $count = mysqli_num_rows($result);
  if ($count != 1) {
    echo "<div class='alert alert-danger'>There was an error in running query</div>";
  }else{
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if ($currentpassword != $row['password']) {
      $error .= $incorrectcurrentpassword;
    }
  }
}


if(empty($_POST["newpassword"])){
    $error .= $missingpassword;
}elseif(!(strlen($_POST["newpassword"])>6
         and preg_match('/[A-Z]/',$_POST["newpassword"])
         and preg_match('/[0-9]/',$_POST["newpassword"])
        )
       ){
    $error .= $invalidpassword;
}else{
    $password = filter_var($_POST["newpassword"], FILTER_SANITIZE_STRING);
    if(empty($_POST["newpassword1"])){
        $error .= $missingpassword1;
    }else{
        $password2 = filter_var($_POST["newpassword1"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $error .= $differentpassword;
        }
    }
}

if ($error) {
  $resultMessage = '<div class="alert alert-danger">' . $error .'</div>';
  echo $resultMessage;
}else{
  $password = mysqli_real_escape_string($link,$password);
  $password = hash('sha256',$password);
  $sql = "UPDATE users SET password = '$password' WHERE user_id = '$user_id'";
  $result = mysqli_query($link,$sql);
  if (!$result) {
    echo "<div class='alert alert-danger'>The Password could not be reset Please try again later</div>";
  }else{
    echo "<div class='alert alert-success'>Your password updated successfully</div>";
    echo "<div class='alert alert-danger'>Your <strong>Session has been expired ! redirecting to main page</strong></div>";
    session_destroy();
  }
}

 ?>
 <script type="text/javascript">
 setTimeout(function(){location.reload()}, 3000);

</script>
