<?php

session_start();
include('connection.php');
include("icocn.php");
// logout

include('logout.php');

// remembre me

include('remember.php');

if (isset($_SESSION['user_id'])) {

}


// php website tracking code

require_once('/home/sites/13a/c/c1305e9db2/public_html/analysis/owa_php.php');

$owa = new owa_php();
// Set the site id you want to track
$owa->setSiteId('bd0ce300ef86675e2b312e87b331638a');
// Uncomment the next line to set your page title
//$owa->setPageTitle('somepagetitle');
// Set other page properties
//$owa->setProperty('foo', 'bar');
$owa->trackPageView();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online notes</title>

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

    <link rel="stylesheet" href="styling.css">

    <!-- google fonts -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">

    <!--  AOS LINKS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.css">
<script  src="	https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.js"></script>



  </head>
  <body>


    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">

        <div class="navbar-header">

          <a href="#" class="navbar-brand">Online Notes</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar" name="button">

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>

        </div>

        <ul class="nav navbar-nav navbar-right">
            <li> <a href="#" data-target="#loginmodal" data-toggle="modal">Login</a> </li>

          </ul>

        <div class="collapse navbar-collapse" id="mynavbar">

          <ul class="nav navbar-nav">
            <li class="active"> <a href="index.php">Home</a> </li>
            <li> <a href="#" data-target="#contactmodal" data-toggle="modal">Feedback / Enquiry</a> </li>
          </ul>


        </div>



      </div>
    </nav>

    <div class="jumbotron" id="mycontainer">

      <h1>Online Notes App</h1>
      <p>Your Notes with you wherever you go.Easy to use,protects all your notes!</p>
      <button type="button" data-target="#signupmodal" data-toggle="modal" class="btn btn-lg green signup" name="button">Sign up-It's free</button>

    </div>


    <!-- login form -->


    <form class="" id="loginform" method="post">
      <div class="modal" id="loginmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" name="button">&times;</button>
              <h4>Login :</h4>
            </div>
            <div class="modal-body">

              <div id="loginmessage">


              </div>

              <div class="form-group">

                <input type="email" class="form-control" id="loginemail" name="loginemail" placeholder="Email" max-maxlength="50" value="<?php echo $_SESSION['email']?>">

              </div>
              <div class="form-group">

                <input type="password" class="form-control" id="loginpassword" placeholder="Password" maxlength="30" name="loginpassword" value="">


              </div>

              <div class="checkbox">
                <label>
                  <input type="checkbox" name="rememberme" id="rememberme">
                  Remember me
                </label>
                <a class="pull-right" data-dismiss="modal" data-toggle="modal" data-target="#forgotmodal" style="cursor:pointer">Forgot Password?</a>


              </div>


            </div>
            <div class="modal-footer">

              <input type="submit" class="btn btn-success" name="login" value="Log-in">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-default pull-left" data-target="#signupmodal" data-toggle="modal" data-dismiss="modal">Register</button>

            </div>

          </div>

        </div>

      </div>
    </form>


    <!-- signup form -->

    <form class="" id="signupform" method="post">
      <div class="modal" id="signupmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" name="button">&times;</button>
              <h4>Sign up Today and Start using our online Notes App !</h4>
            </div>
            <div class="modal-body">

              <div id="signupmessage">


              </div>

              <div class="form-group">

                <input type="text" class="form-control" id="username" name="username" placeholder="Username" max-maxlength="30" value="">

              </div>
              <div class="form-group">

                <input type="email" class="form-control" id="email" placeholder="Email Address" maxlength="50" name="email" value="">


              </div>
              <div class="form-group">

                <input type="password" class="form-control" id="password" placeholder="Choose a password" maxlength="30" name="password" value="">


              </div>
              <div class="form-group">

                <input type="password" class="form-control" id="repassword" placeholder="Confirm your password" maxlength="30" name="repassword" value="">


              </div>

            </div>
            <div class="modal-footer">

              <input type="submit" class="btn btn-success" name="signup" value="Sign-up">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>

          </div>

        </div>

      </div>
    </form>

    <!-- Forgot password -->

    <form class="" id="forgotform" method="post">
      <div class="modal" id="forgotmodal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal" name="button">&times;</button>
              <h4>Forgot Password?Enter your email-address :</h4>
            </div>
            <div class="modal-body">

              <div id="forgotmessage">


              </div>

              <div class="form-group">

                <input type="email" class="form-control" id="forgotemail" name="forgotemail" placeholder="Email" max-maxlength="50" value="">

              </div>

            </div>
            <div class="modal-footer">

              <input type="submit" class="btn btn-success" name="forgotsubmit" value="Submit">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

            </div>

          </div>

        </div>

      </div>
    </form>

<!-- contact form -->

        <form class="" id="contactform" method="post">
          <div class="modal" id="contactmodal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" name="button">&times;</button>
                  <h4>Contact us :</h4>
                  <small>Raise a query / provide feedback</small>
                </div>
                <div class="modal-body">

                  <div id="contactmessage">


                  </div>

                  <div class="form-group">
                    <label for="contactname">Name:</label>
                    <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Your name Please" max-maxlength="30" value="">

                  </div>
                  <div class="form-group">
                    <label for="contactemail"></label>
                    <input type="email" class="form-control" id="contactemail" placeholder="Your email-address to Contact" maxlength="50" name="contactemail" value="">


                  </div>

                  <div class="form-group">
                    <label for="contactmessage">Feedback/Enquiry</label>
                    <textarea name="contactmessage" rows="8" cols="70"></textarea>
                  </div>


                </div>
                <div class="modal-footer">

                  <input type="submit" class="btn btn-success" name="submit" value="Send Feedback/enquiry">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>


                </div>

              </div>

            </div>

          </div>
        </form>


    <div class="footer">

      <div class="container">

        <p>Developed By Sunil. Copyright &copy; 2019- <?php $today=date("Y");echo $today; ?> </p>

      </div>

    </div>





    <script type="text/javascript">

      $(function(){
        $("ul li a").click(function(){
          $("ul li").removeClass("active");
          $(this).parent().addClass("active");
        })
        $("nav").find("li").on("click","a",function(){
          $(".navbar-collapse.in").collapse("hide");
        })
      })



    </script>

    <script type="text/javascript" src="javascript.js">

    </script>




  </body>
</html>
