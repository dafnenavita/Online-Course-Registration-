$('document').ready(function()
{ 
     /* validation */

  //minimum 8 characters
var bad = /(?=.{8,}).*/;
//Alpha Numeric plus minimum 8
var good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
var better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
var best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;

$('#password').on('keyup', function () {
    var password = $(this);
    var pass = password.val();
    var passLabel = $('[for="password"]');
    var stength = 'Weak';
    var pclass = 'danger';
    if (best.test(pass) == true) {
        stength = 'Very Strong';
        pclass = 'success';
    } else if (better.test(pass) == true) {
        stength = 'Strong : Must contain at least one upper case letter, one lower case letter and (one number AND one special char)';
        pclass = 'warning';
    } else if (good.test(pass) == true) {
        stength = 'Almost Strong : Must contain at least one upper case letter, one lower case letter and (one number OR one special char)';
        pclass = 'warning';
    } else if (bad.test(pass) == true) {
        stength = 'Weak : Must Contain Alpha Numeric';
    } else {
        stength = 'Very Weak : Must Contain Minimum of 8 Characters';
    }

    var popover = password.attr('data-content', stength).data('bs.popover');
    popover.setContent();
    popover.$tip.addClass(popover.options.placement).removeClass('danger success info warning primary').addClass(pclass);

});

$('input[data-toggle="popover"]').popover({
    placement: 'top',
    trigger: 'focus'
});   

  $("#registration_form").validate({
   //    rules:
   // {
   // password: {
   // required: true,
   // },
   // username: {
   // required: true
   //  },
   // email: {
   // required: true
   // },
   //  },

   //     messages:
   //  {
   //          password:{
   //                    required: "please enter your password"
   //                   },
   //          email:{
   //                    required: "please enter your email"
   //                   },        
   //          username: "please enter your user name",
   //     },

    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {

         
     var patt=/[^0-9a-zA-Z]/
     var password_value = $('#password').val();
     $("#error").fadeOut();
       if(!(password_value.match(patt) && (password_value.length >= 8))){
           $("#error").fadeIn(1000, function(){      
           $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+'Password criteria not met!'+' !</div>');
           $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
         });

       }else{

   var data = $("#registration_form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'register_login.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    //$("#button_login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
   },
   success :  function(response)
      {      
     if(response=="Registered Successfully"){

     	 $("#error").fadeIn(1000, function(){      
    	$("#error").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
           $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
         });
       }  
      
     else{
         
    $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
           $("#button_login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
         });
     }
     }
   });
   }
    //return false;
  }
    /* login submit */

});