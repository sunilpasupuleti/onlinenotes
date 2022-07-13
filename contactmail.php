<?php

session_start();
include("connection.php");
$missingname = "<p>Your name required</p>";
$missingemail = "<p>Email-address required to contact</p>";
$missingmessage = "<p>Feedback / enquiry required</p>";
$invalidemail = "<p>Enter a valid email-address</p>";

if (empty($_POST['contactname'])) {
  $error .= $missingname;
}else{
  $contactname = filter_var($_POST['contactname'],FILTER_SANITIZE_STRING);
}

if (empty($_POST['contactemail'])) {
  $error .= $missingemail;
}else{
  $contactemail = filter_var($_POST['contactemail'],FILTER_SANITIZE_EMAIL);
  if (!filter_var($contactemail,FILTER_VALIDATE_EMAIL)) {
    $error .= $invalidemail;
  }
}

if (empty($_POST['contactmessage'])) {
  $error .= $missingmessage;
}else{
  $contactmessage = filter_var($_POST['contactmessage'],FILTER_SANITIZE_STRING);
}

if ($error) {
  $resultmessage = "<div class='alert alert-danger'>".$error."</div>";
  echo $resultmessage;
  exit;
}
$to = "sunil.pandvd22@gmail.com";
$message = "<html><body>

        <h3>Name : <span style='color:red'>$contactname</span></h2>
        <h3>From : <span style='color:red'>$contactemail</span></h2>
        <h4>Message : </h4>
        <p style='background-color:#a8dadc;padding:20px;color:black;border-radius:15px;width:70%;'><strong>$contactmessage</strong></p>
        <p>click on the link to reply to the mail</p>
        <p>https://www.stackmail.com/?_task=mail&_action=compose</p>
        </body> </html>";

       $headers = "Content-type: text/html";

if(mail($to, 'Feedback / Enquiry', $message,$headers)){

       echo "<div class='alert alert-success'>Thanks for contacting us ! we will reach you out soon 😊</div>";


       $message1 = "<html><body>

        <h3>Message : </h4>
        <p style='background-color:#a8dadc;padding:20px;color:black;border-radius:15px;width:70%;'><strong>Thanks for contacting us ! we will reach you out soon 😊.. As soon as possible</strong></p>



        </body> </html>";

       $headers = "Content-type: text/html";

       mail($contactemail,"Reply message",$message1,$headers);
}
 ?>
 <script type="text/javascript">
    location.reload();
 </script>
