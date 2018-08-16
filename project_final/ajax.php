<?php
    session_start();     
  

?>
<html>
<head>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
 $('document').ready(function()
{ 
     /* validation */
  $("#dashboard_form").validate({
      rules:
   {
   password: {
   required: true
   },
   username: {
            required: true
            },
    },
       messages:
    {
            password:{
                      required: "please enter your password"
                     },
            username: "please enter valid user email",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#dashboard_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'login.php',
   cache : false,
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#button_login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
   },
   success :  function(response)
      {      
     if(response=="student"){
         
      $("#button_login").html('&nbsp; Signing In ...');
      setTimeout(' window.location.href = "student.php"; ',10);
     }

     else if(response=="admin"){
      $("#button_login").html('&nbsp; Signing In ...');
      setTimeout(' window.location.href = "admin.php"; ',10);
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
           $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Log me in');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});
</script>
</head>
<body>
</body>
</html>