<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location:index.php");
}

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

          <a href="#" class="navbar-brand">Online Notes</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar" name="button">

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>

        </div>
        <div class="collapse navbar-collapse" id="mynavbar">

          <ul class="nav navbar-nav">
            <li> <a href="profile.php">Profile</a> </li>
            <li> <a href="#">Help</a> </li>
            <li> <a href="#">Contact us</a> </li>
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

          

        </div>

      </div>

    </div>



    <div class="footer">

      <div class="container">

        <p>Developed By Sunil. Copyright &copy; 2019- <?php $today=date("Y");echo $today; ?> </p>

      </div>

    </div>



  </body>
</html>
