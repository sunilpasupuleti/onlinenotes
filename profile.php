<?php
include("icon.php");
session_start();
include("connection.php");
if (!isset($_SESSION['user_id'])) {
  header("Location:index.php");
}
$user_id = $_SESSION['user_id'];
// get email and username
$sql ="SELECT *FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);
if ($count == 1) {
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $username = $row['username'];
  $email = $row['email'];
}else{
  echo "There was an error in retreving username and email from databse";
}


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

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

    <style media="screen">

      #container{
        margin-top: 100px;
        margin-bottom: 100px;
      }
      #notepad,#allbutton,#donebutton{
        display: none;
      }
      .buttons{
        margin-bottom: 20px;
      }
      textarea{
        width: 100%;
        max-width: 100%;
        font-size: 16px;
        line-height: 1.5em;
        border-left-width: 20px;
        border-color: #CA3DD9;
        color: #CA3DD9;
        background-color: #FBEFFF;
        padding: 10px;
      }
      tr{
        cursor: pointer;
      }

    </style>

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
        <div class="collapse navbar-collapse" id="mynavbar">

          <ul class="nav navbar-nav">
            <li class="active"> <a href="#">Profile</a> </li>
            <li> <a href="#" data-target="#contactmodal" data-toggle="modal">Feedback / Enquiry</a> </li>
            <li > <a href="loginmainpage.php">My Notes</a> </li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="#">Logged in as  <b><?php echo $username; ?></b> </a> </li>

            <li> <a href="index.php?logout=1">logout</a> </li>


          </ul>

        </div>

      </div>
    </nav>


    <div class="container" id="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">

          <h2>General Account Settings :</h2>
          <div class="table-responsive">

            <table class="table table-hover table-condensed table-bordered">
              <tr data-target="#updateusername" data-toggle="modal">
                <td>Username</td>
                <td><?php echo $username; ?></td>
              </tr>
              <tr data-target="#updateemail" data-toggle="modal">
                <td>Email</td>
                <td><?php echo $email; ?></td>
              </tr>
              <tr data-target="#updatepassword" data-toggle="modal">
                <td>Password</td>
                <td>hidden</td>
              </tr>

            </table>
            <br>

            <button type='button' class='btn btn-danger btn-block' data-target='#deleteaccount' data-toggle='modal'>Delete Your Account</button>

          </div>

        </div>

      </div>

    </div>

    <!-- update username -->
        <form class="" id="updateusernameform" method="post">
          <div class="modal" id="updateusername">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" name="button">&times;</button>
                  <h4>Edit Username :</h4>
                </div>
                <div class="modal-body">

                  <div id="updateusernamemessage">


                  </div>

                  <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="updateusername" max-maxlength="30" value="<?php echo $username; ?>">


                  </div>

                </div>
                <div class="modal-footer">

                  <input type="submit" class="btn btn-success" name="updateusername" value="Submit">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                </div>

              </div>

            </div>

          </div>
        </form>

      <!-- update email -->
      <form class="" id="updateemailform" method="post">
        <div class="modal" id="updateemail">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal" name="button">&times;</button>
                <h4>Enter new email :</h4>
              </div>
              <div class="modal-body">

                <div id="updateemailmessage">


                </div>

                <div class="form-group">

                  <input type="email" class="form-control" id="email" name="email" max-maxlength="50" value="<?php echo $email; ?>">


                </div>

              </div>
              <div class="modal-footer">

                <input type="submit" class="btn btn-success" name="updateusername" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

              </div>

            </div>

          </div>

        </div>
      </form>

      <!-- update password -->


      <form class="" id="updatepasswordform" method="post">
        <div class="modal" id="updatepassword">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal" name="button">&times;</button>
                <h4>Enter Current and New password :</h4>
              </div>
              <div class="modal-body">

                <div id="updatepasswordmessage">


                </div>

                <div class="form-group">

                  <input type="password" class="form-control" id="currentpassword" name="updatepassword" max-maxlength="30" placeholder="Enter current password">
                </div>

                <div class="form-group">

                  <input type="password" class="form-control" id="newpassword" name="newpassword" max-maxlength="30" placeholder="Enter new password">

                </div>

                <div class="form-group">

                  <input type="password" class="form-control" id="newpassword1" name="newpassword1" max-maxlength="30" placeholder="Confrim your password">

                </div>

              </div>
              <div class="modal-footer">

                <input type="submit" class="btn btn-success" name="updateusername" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

              </div>

            </div>

          </div>

        </div>
      </form>

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
                    <input type="text" class="form-control" id="contactname" name="contactname" placeholder="Your name Please" max-maxlength="30" value="<?php echo $_SESSION['username'] ;?>">

                  </div>
                  <div class="form-group">
                    <label for="contactemail">Email-id</label>
                    <input type="email" class="form-control" id="contactemail" placeholder="Your email-address to Contact" maxlength="50" name="contactemail" readonly value="<?php echo $_SESSION['email'] ;?>">


                  </div>

                  <div class="form-group">
                    <label for="contactmessage">Feedback/Enquiry</label>
                    <textarea name="contactmessage" id="contactmessage" rows="8" cols="70"></textarea>
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


        <form class="" id="deleteform" method="post">
          <div class="modal" id="deleteaccount">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-body">

                  <div id="deleteaccountmessage">


                  </div>

                  <button class="close" data-dismiss="modal" name="button">&times;</button>
                  <h4>Are you sure to delete Your ACCOUNT :</h4>


                </div>
                <div class="modal-footer">

                  <input type="submit" class="btn btn-success" name="deleteaccount" value="Delete the account">
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

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


    <script type="text/javascript" src="profile.js">

    </script>

    <script type="text/javascript" src="javascript.js">

    </script>

  </body>
</html>
