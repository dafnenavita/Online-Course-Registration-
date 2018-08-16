<?php
session_start();
      include 'database_config.php'; 
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Course</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="addcourses.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="adminstyle.css"></script>
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
                    <a class="dropdown-toggle" role="button" href="#"><i class="fa fa-user-circle"></i> Admin </a>
                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out" ></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>


<section class="container-fluid">
<div class="content">
<div class="row row-flex">
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 col-flex-item ">
    <ul class="nav nav-pills nav-stacked">
        <!--<li class="nav-header"></li>-->
        <li><a href="admin.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li><a href="viewcourse.php"><i class="fa fa-eye"></i> View Course</a></li>
        <li><a href="addcourse.php"><i class="fa fa-plus"></i> Add Course</a></li>
        <li><a href="editcourse.php"><i class="fa fa-pencil-square-o"></i> Edit Course</a></li>

    </ul> 
</div>

<!-- /span-3 -->
<div class="container-fluid text-center col-md-7 col-flex-item">
      <h1>Add Courses</h1>
      <hr>
      
    <form method="POST" id="addcourses_form" class="well form-horizontal" style="width:auto;margin-left: 2px;">
     
    <div class="form-group">
		<div id="error">
        <!-- error will be shown here ! -->
		</div>
       <label class="control-label col-md-4" for="courseid">Course Id:</label>
     <div class="col-sm-4">
        <input type="courseid" class="form-control" id="courseid" required="" placeholder="Enter courseid" name="courseid" style="width:300px;">
	</div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="coursename">Course Name:</label>
      <div class="col-sm-4">          
        <input type="coursename" class="form-control " id="coursename" required="" placeholder="Enter coursename" name="coursename" style="width:300px;">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-md-4" for="major">Major:</label>
      <div class="col-sm-4">          
        <input type="major" class="form-control " id="major" placeholder="Enter major" required="" name="major" style="width:300px;">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-md-4" for="professorid">Professor Name:</label>
      <div class="col-sm-4">          
        <input type="professorid" class="form-control " id="professorid" required="" placeholder="Enter professorname" name="professorid" style="width:300px;">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-md-4" for="semester">Semester:</label>
      <div class="col-sm-4">          
        <input type="semester" class="form-control " id="semester" required="" placeholder="Enter semester" name="semester" style="width:300px;">
      </div>
    </div>
       <div class="form-group">
      <label class="control-label col-md-4" for="year">Year:</label>
      <div class="col-sm-4">          
        <input type="year" class="form-control " id="year" required="" placeholder="Enter year" name="year" style="width:300px;">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-primary" id="button_login" name="button_login"><span class="glyphicon glyphicon-log-in"></span> Add Course!</button>
      </div>
    </div>
  </form>
</div>
</div>
</section>
<!-- <footer class="container-fluid text-center footer">
<p>© The University of Texas at Dallas <br/>
Questions or comments about this page? <br/>
Blackboard Learn: Release 9.1.130093.0</p>
</footer> -->
</body>
</html>
