<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location:index.php");
}
include("icon.php");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Notes</title>

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
        margin-top: 120px;
        margin-bottom: 100px;
      }
      #notepad,#allbutton,#donebutton,.delete{
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

      .noteheader{
        border: 1px solid grey;
        border-radius: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        padding: 0 10px;
        background: linear-gradient(#FFFFFF,#ECEAE7);

      }
      .text{
        font-size: 20px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
      }
      .timetext{
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;

      }
    </style>

  </head>
  <body>


    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">

        <div class="navbar-header">

          <a href="index.php" class="navbar-brand">Online Notes</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar" name="button">

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>

        </div>
        <div class="collapse navbar-collapse" id="mynavbar">

          <ul class="nav navbar-nav">
            <li> <a href="profile.php">Profile</a> </li>
            <li> <a href="#" data-target="#contactmodal" data-toggle="modal">Feedback / Enquiry</a> </li>
            <li class="active"> <a href="#">My Notes</a> </li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="#">Logged in as  <b><?php echo $_SESSION['username']?></b> </a> </li>

            <li> <a href="index.php?logout=1">logout</a> </li>


          </ul>

        </div>

      </div>
    </nav>


    <div class="container" id="container">
      <div class="row">

        <div class="col-md-offset-3 col-md-6">

          <div id="alert" class="alert alert-danger collapse">
              <a href="#" class="close" data-dismiss='alert'>&times;</a>
              <p id="alertcontent"></p>
          </div>

          <div class="buttons">

            <button type="button" id="addbutton" class="btn btn-info btn-lg" name="button">Add Note</button>
            <button type="button" id="editbutton" class="btn btn-info btn-lg pull-right" name="button">Edit</button>
            <button type="button" id="donebutton" class="btn green btn-lg pull-right" name="button">Done</button>
            <button type="button" id="allbutton" class="btn btn-info btn-lg" name="button">Save Notes</button>


          </div>


          <div id="notepad">

            <textarea name="name" rows="10" cols="80"></textarea>

          </div>

          <div id="notes" class="notes">

            <!--   AJAX CALL  TO A PHP FILE  -->

          </div>

        </div>

      </div>

    </div>


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





    <script type="text/javascript" src="javascript.js">

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


    <script type="text/javascript" src="mynotes.js">

    </script>


  </body>
</html>
