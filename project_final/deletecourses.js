$('document').ready(function()
{ 
     /* validation */
  $("#deletecourses_form").validate({
      rules:
   {
   courseid: {
   required: true
   },
    },
       messages:
    {
            courseid:{
                      required: "please enter your courseid"
                     },
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#deletecourses_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'deletecoursesimpl.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#button_login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
   },
   success :  function(response)
      {      
     if(response=="Course Deleted Succefully!"){
         
     $("#error").fadeIn(1000, function(){      
     $("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
     $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Delete Course!');
         });
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
      $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
      $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Delete Course!');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});