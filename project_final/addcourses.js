$('document').ready(function()
{ 
     /* validation */
  $("#addcourses_form").validate({
      rules:
   {
   courseid: {
   required: true
   },
   coursename: {
   required: true
    },
   major: {
   required: true
    },
   professorid: {
   required: true
    },
   semester: {
   required: true
    },
   year: {
   required: true
    },
    },
       messages:
    {
            coursename:{
                      required: "please enter your coursename"
                     },
            major:{
                      required: "please enter your major"
                     },
            professorid:{
                      required: "please enter professor name"
                     },
            semester:{
                      required: "please enter your semester"
                     },
            year:{
                      required: "please enter your year"
                     },
            courseid: "please enter your courseid",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#addcourses_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'addcoursesimpl.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#button_login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
   },
   success :  function(response)
      {   

      $("#error").html("");
     if(response=="Course Added Succefully!"){
         
     $("#error").fadeIn(1000, function(){      
     $("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
     $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Add Course!');
         });
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
      $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
      $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Add Course!');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});