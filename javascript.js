

$("#signupform").submit(function(event){

        event.preventDefault();
        // collect user inputs
        var datatopost=$(this).serializeArray();
        console.log(datatopost);

        //  send them to the signup.php using ajax

        $.ajax({
          url : "register.php",
          type: "POST",
          data : datatopost,
          success : function(data){
              if(data){
                $("#signupmessage").html(data);

              }

          } ,
          error: function(){

            $("#signupmessage").html("<div class='alert alert-danger'>There was an error in the Ajax call.Please try again later</div>");


          }

        });


});

//Ajax Call for the login form
//Once the form is submitted
$("#loginform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "loginmainpage.php";
            }else{
                $('#loginmessage').html(data);
            }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});


$("#forgotform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "forgotpassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){

            $("#forgotmessage").html(data);


        },
        error: function(){
            $("#forgotmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});
$("#contactform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "contactmail.php",
        type: "POST",
        data: datatopost,
        success: function(data){

            $("#contactmessage").html(data);


        },
        error: function(){
            $("#contactmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});

$("#deleteform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "deleteaccount.php",
        type: "POST",
        data: datatopost,
        success: function(data){

            if(data == "success"){
                window.location = "loginmainpage.php";
            }else{
                $('#deleteaccountmessage').html(data);
            }


        },
        error: function(){
            $("#deleteaccountmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});
