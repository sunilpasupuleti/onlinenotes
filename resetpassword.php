<?php
//The user is re-directed to this file after clicking the activation link
//Signup link contains two GET parameters: email and activation key
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reset password</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            h1{
                color:purple;
            }
            .contactForm{
                border:1px solid #7c73f6;
                margin-top: 50px;
                border-radius: 15px;
            }
        </style>
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- jquery ui -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.css">
        <script  src="	https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.css">
        <script  src="	https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.js"></script>


        <!-- google fonts -->

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">

    </head>
        <body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Reset Password</h1> <br>
            <div id="resultmessage">

            </div>
            <br>
<?php

if (!isset($_GET['user_id']) || !isset($_GET['key'])  ) {

  echo "<div class='alert alert-danger'>Please click on the password reset link sent to your email-id</div>";
  exit;
}

$user_id = $_GET['user_id'];
$key = $_GET['key'];
$time = time() - 3600;

$user_id = mysqli_real_escape_string($link,$user_id);
$key = mysqli_real_escape_string($link,$key);

//  24 hrs time link validation check

$sql = "SELECT user_id FROM forgotpassword WHERE resetkey = '$key' AND user_id = '$user_id' AND validationtime > '$time' AND status='pending'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error in running query!</div>';
    exit;
}

// if combination does not exists

$count = mysqli_num_rows($result);

if($count != 1){
    echo '<div class="alert alert-danger">Your link has been expired</div>';  exit;
}

echo "

<form id='passwordreset' method='post'>
<input type=hidden name=key value=$key>
<input type=hidden name=user_id value=$user_id>

<div class='form-group'>
<label for='password'>Enter your new password</label>
<input type='password' class='form-control' name='password' id='password' placeholder='Enter the password'>
</div>

<div class='form-group'>
<label for='password2'>Re-enter password</label>
<input type='password' class='form-control' name='password2' id='password2' placeholder='confirm your password'>
</div>

<input type='submit' name='resetpassword' class='btn btn-success btn-lg' value='Reset Password'>

</form>


";


 ?>
        </div>
    </div>
</div>
        <script type="text/javascript" src="javascript.js">

        </script>
        <script type="text/javascript">

        $("#passwordreset").submit(function(event){
            //prevent default php processing
            event.preventDefault();
            //collect user inputs
            var datatopost = $(this).serializeArray();
        //    console.log(datatopost);
            //send them to signup.php using AJAX
            $.ajax({
                url: "storeresetpassword.php",
                type: "POST",
                data: datatopost,
                success: function(data){

                    $("#resultmessage").html(data);


                },
                error: function(){
                    $("#resultmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

                }

            });

        });


        </script>

        </body>
</html>
