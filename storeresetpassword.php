<?php

session_start();
include('connection.php');


if (!isset($_POST['user_id']) || !isset($_POST['key'])  ) {

  echo "<div class='alert alert-danger'>Please click on the password reset link sent to your email-id</div>";
  exit;
}

$user_id = $_POST['user_id'];
$key = $_POST['key'];
$time = time() - 3600;

$user_id = mysqli_real_escape_string($link,$user_id);
$key = mysqli_real_escape_string($link,$key);

//  24 hrs time link validation check

$sql = "SELECT user_id FROM forgotpassword WHERE resetkey = '$key' AND user_id = '$user_id' AND validationtime > '$time' AND status='pending' ";
$result=mysqli_query($link,$sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error in running query!</div>';
    exit;
}

// if combination does not exists

$count = mysqli_num_rows($result);

if($count != 1){
    echo '<div class="alert alert-danger">Please try again</div>';  exit;
}

$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';

if(empty($_POST["password"])){
    $errors .= $missingPassword;
}elseif(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

$password = mysqli_real_escape_string($link, $password);
//$password = md5($password);
$password = hash('sha256', $password);

$user_id = mysqli_real_escape_string($link,$user_id);

$sql = "UPDATE users SET password = '$password' WHERE user_id = '$user_id'";
$result = mysqli_query($link,$sql);

if(!$result){
    echo '<div class="alert alert-danger">There was problem storing new password!</div>';
//    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}

$sql="UPDATE forgotpassword SET status='used' WHERE resetkey='$key' AND user_id = '$user_id'";
$result = mysqli_query($link,$sql);

if(!$result){
    echo '<div class="alert alert-danger">Error running query</div>';
//    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}

echo "<div class='aler alert-success'>Your Password has been updated Successfully! <a href='index.php'>Login</a> </div>";







 ?>
