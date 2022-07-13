// ajax call to update usrname
$("#updateusernameform").submit(function(event){

        event.preventDefault();
        // collect user inputs
        var datatopost=$(this).serializeArray();
        console.log(datatopost);

        //  send them to the signup.php using ajax

        $.ajax({
          url : "updateusername.php",
          type: "POST",
          data : datatopost,
          success : function(data){
              if(data){
                $("#updateusernamemessage").html(data);
              }else{
                location.reload();
              }

          } ,
          error: function(){

            $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error in the Ajax call.Please try again later</div>");


          }

        });


});

$("#updatepasswordform").submit(function(event){
  event.preventDefault();
  var datatopost = $(this).serializeArray();
  $.ajax({
    url : "updatepassword.php",
    type : "POST",
    data : datatopost,
    success : function(data){
      if(data){
        $("#updatepasswordmessage").html(data);
      }
    },
    error: function(){

      $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error in the Ajax call.Please try again later</div>");


    }


  })
});




// Ajax call to updateemail.php
$("#updateemailform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateemailmessage").html(data);
                
            }
        },
        error: function(){
            $("#updateemailmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");

        }

    });

});


