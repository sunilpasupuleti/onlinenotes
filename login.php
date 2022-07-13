<?php
//Start session
session_start();
//Connect to the database
include("connection.php");
//Check user inputs
    //Define error messages
$missingEmail = '<p><stong>Please enter your email address!</strong></p>';
$missingPassword = '<p><stong>Please enter your password!</strong></p>';
    //Get email and password
    //Store errors in errors variable
if(empty($_POST["loginemail"])){
    $errors .= $missingEmail;
}else{
    console.log($_POST['loginemail']);
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
}
if(empty($_POST["loginpassword"])){
    $errors .= $missingPassword;
}else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}
    //If there are any errors
if($errors){
    //print error message
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
}else{

  $email = mysqli_real_escape_string($link,$email);
  $password = mysqli_real_escape_string($link,$password);
  $password = hash('sha256',$password);

  $sql = "SELECT *FROM users WHERE email='$email' AND password = '$password' AND activation='activated'";
  $result = mysqli_query($link,$sql);

  if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
  }

  $count= mysqli_num_rows($result);
  if($count != 1){
    $sql = "SELECT *FROM users WHERE email = '$email' AND activation != 'activated'";

    $sentlink = mysqli_query($link,$sql);

    if(mysqli_num_rows($sentlink) == 1){
        echo "<div class='alert alert-danger'>Your account is not Activated ! Please click on the link sent to email <strong>'$email'</strong> and try Login again</div>";
        exit;
    }
    echo '<div class="alert alert-danger">Wrong <strong>Username</strong> or <strong>Password</strong> Pleas try again!</div>';


  }else{

      // set session variables
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $_SESSION['user_id']=$row['user_id'];
      $_SESSION['username']=$row['username'];
      $_SESSION['email']=$row['email'];
      $_SESSION['password']=$row['password'];
      if(empty($_POST['rememberme'])){
        echo "success";
      }else{

        //Create two variables $authentificator1 and $authentificator2
        $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
        //2*2*...*2
        $authentificator2 = openssl_random_pseudo_bytes(20);
        //Store them in a cookie
        function f1($a, $b){
            $c = $a . "," . bin2hex($b);
            return $c;
        }
        $cookieValue = f1($authentificator1, $authentificator2);
        setcookie(
            "rememberme",
            $cookieValue,
            time() + 1296000
        );

        //Run query to store them in rememberme table
        function f2($a){
            $b = hash('sha256', $a);
            return $b;
        }
        $f2authentificator2 = f2($authentificator2);
        $user_id = $_SESSION['user_id'];
        $expiration = date('Y-m-d H:i:s', time() + 1296000);

        $sql = "INSERT INTO remembername
        (`authentificator1`, `f2authentificator2`, `user_id`, `expires`)
        VALUES
        ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo  '<div class="alert alert-danger">There was an error storing data to remember you next time.</div>';
        }else{
            echo "success";
        }



      }


  }











}








                    ?>
