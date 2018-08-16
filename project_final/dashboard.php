<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!--<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>-->
  <script type="text/javascript" src="login.js"></script> 
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  
  <link type="text/css" rel="stylesheet" href="./adminstyle.css"></script>
  <link rel="icon" type="image/jpg" href="utd.jpg" />
 
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid" style="background-image: url('utdbanner.png');
  background-repeat:no-repeat; background-size:100% 90px; height: 80px;">
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color:black;" href="register.php"><span class="glyphicon glyphicon-log-in heading"></span> Register New User</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center" style ="position:relative ;overflow-x : hidden; padding: 0px;">    
  <div class="row content" style ="position:relative ;overflow-x : hidden; padding: 0px;">
    <div class="col-sm-2 sidenav">
     <p class="well">Weekly Maintenance Window</p>
     <br/><br/>
     <p class="well" style="width:auto;text-align:justify;">eLearning's regular weekly maintenance window is every Tuesday from 2-4am CST.

During this time, eLearning could become unavailable.We strongly recommend against taking online tests in eLearning during this time.</p>
    </div>


    <div class="col-sm-8"> 

      <h1>Login Here</h1>
      <hr>
      <br/><br/>
      <div id="error">
        <!-- error will be shown here ! -->
      </div>
    <form method="POST" id="dashboard_form" class="well form-horizontal" style="width:auto;height:auto;margin-left: 50px;margin-right: 50px">
     
    <div class="form-group">
       <label class="control-label col-md-4" for="username" >User-Email:</label>
      <div class="col-sm-4 input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        <input type="email" class="form-control" required="" id="username" placeholder="Enter valid user email id" name="username" style="width:300px;">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="pwd">Password:</label>
      <div class="col-sm-4 input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>        
        <input type="password" class="form-control " required="" id="password" placeholder="Enter password" name="password" style="width:300px;">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit"  class="btn btn-primary" id="button_login" name="button_login"><span class="glyphicon glyphicon-log-in"></span> Log in!</button>
      </div>
    </div>
  </form>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>UNIVERSITY LINKS</p>
        <a href="https://www.utdallas.edu/academiccalendar/">Academic Calendar</a>
        <a href="https://coursebook.utdallas.edu/">CourseBook</a><br/>
        <a href="https://ets.utdallas.edu/">eLearning Team</a><br/>
        <a href="https://daih-prd.utshare.utsystem.edu/psp/DAIHPRD/EMPLOYEE/EMPL_UTD/h/?tab=PAPP_GUEST">Galaxy & Orion</a>
      </div>
      <br/><br/>
      <div class="well">
        <p>HELP LINKS</p>
        <a href="https://www.utdallas.edu/oit/helpdesk/">Contact the OIT Helpdesk</a><br/>
        <a href="https://ets.utdallas.edu/elearning/helpdesk">Contact the eLearning Helpdesk</a>

      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center footer">
<p>© The University of Texas at Dallas <br/>
Questions or comments about this page? <br/>
Blackboard Learn: Release 9.1.130093.0</p>
</footer>

</body>
</html>
