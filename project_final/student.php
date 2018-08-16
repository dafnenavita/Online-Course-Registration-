<?php
      session_start();

     /* if(!isset($_SESSION['sess_username']) || (trim($_SESSION['sess_username']) == '')) {
      header("location: dashboard.php");
      exit();
      }*/
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
   <link rel="icon" type="image/jpg" href="utd.jpg" />
  <script type="text/javascript" src="login.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <link type="text/css" rel="stylesheet" href="./adminstyle.css"></script>
  <script>
  function makevisible(){
    /*$('document').ready(function(){*/
    document.getElementById('info').style.visibility = 'visible';
  };
  </script> 
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
                <li>
                    <a class="dropdown-toggle" role="button" href="#"><i class="fa fa-user-circle"></i></span></a>
                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out" ></i> Logout</a></li>
            </ul>
        </div>
    </div>
    
</div>


<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    <ul class="nav nav-pills nav-stacked">
        <!--<li class="nav-header"></li>-->
        <li><a href="./student.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li><a href="studentviewcourse.php"><i class="fa fa-eye"></i> Class Schedule</a></li>
        <li><a href="studentaddcourse.php"><i class="fa fa-plus"></i> Add Course</a></li>
        <li><a href="studentdropcourse.php"><i class="fa fa-pencil-square-o"></i> Drop Course</a></li>
        <li><a href="shoppingcart.php"><i class="fa fa-shopping-cart"></i> Shopping Cart</a></li>

    </ul> 
</div>

<!-- /span-3 -->
<div class="content">
<div class="container-fluid text-center">
<div id="enrolledcourse">
    <h3 id="welcometext">Welcome, <?php $student_name = $_SESSION["sess_username"];
      $sql = "SELECT name from student_details where email = '$student_name'";
      $result = mysqli_query($db_con,$sql);
      while($row=mysqli_fetch_assoc($result)) {
       $studentname = $row['name'];
       $_SESSION["user_name"] = $studentname;
       echo $studentname; } ?></h3> 
      
<div class="well" style="width:500px;margin-left: 200px;">
<p>Current term: Spring 18 </p>
 <?php
 $student_name = $_SESSION["sess_username"];

$sql = "SELECT student_id from student_details where email = '$student_name'";
$result = mysqli_query($db_con,$sql);
while($row=mysqli_fetch_assoc($result)) {
    $studentid = $row['student_id'];
   }

$sql1 = "SELECT course_id from student_course where student_id = '$studentid' and semester = 'spring' and year = 2018";
$result1 = mysqli_query($db_con,$sql1);
while($row1=mysqli_fetch_assoc($result1)) {
    $courseid = $row1['course_id'];
   
$sql2="Select course_id,course_name from course_details where course_id = '$courseid'";
$result2 = mysqli_query($db_con,$sql2);


while($row2=mysqli_fetch_assoc($result2)) {     
  ?> 
   <div class="form-group">
    <a href= "#" onclick="makevisible()" > <?php echo $row2['course_id'].'-'.$row2['course_name']; ?></a>
  </div>


  
<?php
}


}

?>

      
 </div>
<div class="well" style="width:500px;margin-left: 200px;visibility: hidden;" id ="info" >
  <h5> Announcements: </h5>
  <p> No Announcements </p>
  <br/>
  <h5> Assignment Due:</h5>
  <p> No Dues </p>

  </div>
</div>

</div>
</div>
</body>
<footer class="container-fluid text-center footer">
<p>© The University of Texas at Dallas <br/>
Questions or comments about this page? <br/>
Blackboard Learn: Release 9.1.130093.0</p>
</footer>
</html>
