<?php
      include 'database_config.php'; 
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="login.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <link type="text/css" rel="stylesheet" href="./adminstyle.css"></script>
   <link rel="icon" type="image/jpg" href="utd.jpg" />
  </head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">


<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" href="#"><i class="fa fa-user-circle"></i> Admin <span class="caret"></span></a>
                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out" ></i> Logout</a></li>
            </ul>
        </div>
    </div>
    
</div>


<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    <ul class="nav nav-pills nav-stacked">
        <!--<li class="nav-header"></li>-->
        <li><a href="admin.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li><a href="viewcourse.php"><i class="fa fa-eye"></i> View Course</a></li>
        <li><a href="addcourse.php"><i class="fa fa-plus"></i> Add Course</a></li>
        <li><a href="editcourse.php"><i class="fa fa-pencil-square-o"></i> Edit Course</a></li>

    </ul> 
</div>

<div class="content">
<div class="container-fluid text-center">
<div id="enrolledcourse">
    <br/>
      
<div class="well" style="width:500px;margin-left: 200px;">
<p>Current term: Spring 18 </p>
 


      
 </div>
<div class="well" style="width:500px;margin-left: 200px;" id ="info" >
   <p>UNIVERSITY LINKS</p>
        <a href="https://www.utdallas.edu/academiccalendar/">Academic Calendar</a>
        <a href="https://coursebook.utdallas.edu/">CourseBook</a><br/>
        <a href="https://ets.utdallas.edu/">eLearning Team</a><br/>
        <a href="https://daih-prd.utshare.utsystem.edu/psp/DAIHPRD/EMPLOYEE/EMPL_UTD/h/?tab=PAPP_GUEST">Galaxy & Orion</a>
  <br/>

<br/>  <p>HELP LINKS</p>
        <a href="https://www.utdallas.edu/oit/helpdesk/">Contact the OIT Helpdesk</a><br/>
        <a href="https://ets.utdallas.edu/elearning/helpdesk">Contact the eLearning Helpdesk</a>

  </div>
</div>

</div>
</div>
</body>
</html>
