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
  <script type="text/javascript" src="deletecourses.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid" style="background-image: url('utdbanner.png');
  background-repeat:no-repeat; background-size:100% 150px; height: 150px;">
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color:black;" href="register.php"><span class="glyphicon glyphicon-log-in"></span> Register New User</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <p class="well">Weekly Maintenance Window</p>
     <p class="well" style="text-align: justify;">eLearning's regular weekly maintenance window is every Tuesday from 2-4am CST.

During this time, eLearning could become unavailable.  We strongly recommend against taking online tests in eLearning during this time.  If you have any questions, please email elearning@utdallas.edu.</p>
    </div>


    <div class="col-sm-8"> 

    <nav class="navbar navbar-inverse">
    <div class="navbar-header navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin.php">View Courses</a></li>
        <li><a href="addcourses.php">Add Courses</a></li>
        <li><a href="deletecourses.php">Delete Courses</a></li>
        <li><a href="updatecourses.php">Update Courses</a></li>
      </ul>
    </div>
    </nav>

      <h1>Delete Courses</h1>
      <hr>
      <div id="error">
        <!-- error will be shown here ! -->
      </div>
    <form method="POST" id="deletecourses_form" class="well form-horizontal" style="width:800px;margin-left: 100px;">
     
    <div class="form-group">
       <label class="control-label col-md-4" for="courseid">Course Id:</label>
      <div class="col-sm-4">
        <input type="courseid" class="form-control" id="courseid" placeholder="Enter courseid" name="courseid" style="width:300px;">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-primary" id="button_login" name="button_login"><span class="glyphicon glyphicon-log-in"></span> Delete Course!</button>
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
      <div class="well">
        <p>HELP LINKS</p>
        <a href="https://www.utdallas.edu/oit/helpdesk/">Contact the OIT Helpdesk</a><br/>
        <a href="https://ets.utdallas.edu/elearning/helpdesk">Contact the eLearning Helpdesk</a>

      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
<p>© The University of Texas at Dallas <br/>
Questions or comments about this page? <br/>
Blackboard Learn: Release 9.1.130093.0</p>
</footer>

</body>
</html>
