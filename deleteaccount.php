<?php

session_start();
include("connection.php");
$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>There was an error in executing query</div>";
    exit;
}
echo "<div class='alert alert-success'>Your account has been deleted ! Thanks for using our website ! You will be <strong>Redirected to main page within 3 seconds</strong></div>";
$to = $_SESSION['email'];
$message = "<html><body>

        <h3>Message : </h4>
        <p style='background-color:#a8dadc;padding:20px;color:black;border-radius:15px;width:70%;'><strong>Thanks for Using our website ! Your account is successfully deleted ! WE ARE TRYING TO IMPROVE OUR WEBSITE..Reach us again we are waiting for your arrival 😊</strong></p>



        </body> </html>";

       $headers = "Content-type: text/html";



 mail($to,"Delete Account",$message,$headers);
 session_destroy();
 echo "<script>setTimeout(function(){
   window.open('loginmainpage.php','_self')
 },3000)</script>";
?>
