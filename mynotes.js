$(function(){

  var activenote=0;
  var editmode= false;
  // load notes : ajax call to loadnotes file

  $.ajax({

    url : "loadnotes.php",
    success : function(data){
      $("#notes").html(data);
      clickonnote();clickondelete();
    },
    error : function(data){
      $('#alertcontent').text("There was an error with the Ajax Call. Please try again later.");
          $("#alert").fadeIn();
    }

  });



  //add a new note: : Ajax call to createnote.php
  $('#addbutton').click(function(){
      $.ajax({
          url: "createnotes.php",
          success: function(data){
              if(data == 'error'){
                  $('#alertcontent').text("There was an issue inserting the new note in the database!");
                  $("#alert").fadeIn();
              }else{
                  //update activeNote to the id of the new note
                  activenote = data;
                  $("textarea").val("");
                  //show hide elements
                  showHide(["#notepad", "#allbutton"], ["#notes", "#addbutton", "#editbutton", "#donebutton"]);
                  $("textarea").focus();

              }
          },
          error: function(){
              $('#alertcontent').text("There was an error with the Ajax Call. Please try again later.");
                  $("#alert").fadeIn();
          }


      });


  });

  // all button click show notes

  $("#allbutton").click(function(){

    $.ajax({

      url : "loadnotes.php",
      success : function(data){
        $("#notes").html(data);
        showHide(["#notes", "#addbutton","#editbutton"], ["#allbutton", "#notepad"]);
        clickonnote();clickondelete();
      },
      error : function(data){
        $('#alertcontent').text("There was an error with the Ajax Call. Please try again later.");
            $("#alert").fadeIn();
      }

    });

  });

  // updating note

  $("textarea").keyup(function(){
    // sento ajax to update note.php
    $.ajax({
      url : "updatenotes.php",
      type : "POST",
      // we have to send the current note content id to that php file
      data : {note: $(this).val(),id:activenote},
      success : function(datareturned){
        if (datareturned=='error') {
          $('#alertcontent').text("There was an issue in updating the note in the database. Please try again later.");
          $("#alert").fadeIn();
        }
      },
      error : function(data){
        $('#alertcontent').text("There was an error with the Ajax Call. Please try again later.");
            $("#alert").fadeIn();
      }
    });
  });


// click on edit button

$("#editbutton").click(function(){

  editmode = true;
  // reduce width of notes

  $(".noteheader").addClass("col-xs-7 col-sm-9");

  showHide(["#donebutton",".delete"],[this]);


});


// click on done button

$("#donebutton").click(function(){
  editmode = false;
  $(".noteheader").removeClass("col-xs-7 col-sm-9");

  showHide(["#editbutton"],[this,".delete"]);

});




  // click on a note
function clickonnote(){

    $(".noteheader").click(function(){
        if (!editmode) {
          activenote = $(this).attr("id");
          // fill text area

          $("textarea").val($(this).find('.text').text());

          showHide(["#notepad", "#allbutton"], ["#notes", "#addbutton", "#editbutton", "#donebutton"]);

          $("textarea").focus();


        }
    });
}
  //show Hide function

function showHide(array1, array2){
  for(i=0; i<array1.length; i++){
      $(array1[i]).show();
  }
  for(i=0; i<array2.length; i++){
      $(array2[i]).hide();
  }
};

// click on delete

function clickondelete() {

  $(".delete").click(function(){
    var deletebutton = $(this);
    $.ajax({
      url : "deletenotes.php",
      type : "POST",
      // we have to send the current note content id to that php file
      data : {id:deletebutton.next().attr("id")},
      success : function(datareturned){
        if (datareturned=='error') {
          $('#alertcontent').text("There was an issue in deleting the note from the database. Please try again later.");
          $("#alert").fadeIn();
        }else{
          // remove caontaing div
          deletebutton.parent().remove();
        }
      },
      error : function(data){
        $('#alertcontent').text("There was an error with the Ajax Call. Please try again later.");
            $("#alert").fadeIn();
      }
    });

  })

}


});
