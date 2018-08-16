<?php
      include 'database_config.php'; 
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit course</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="studentdropcourse.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <link type="text/css" rel="stylesheet" href="./adminstyle.css"></script>
  <link rel="icon" type="image/jpg" href="utd.jpg" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script>
function dropCourseDetails(id,semester,year){
  //alert(id);
 $( "#dialog" ).html("");
                        $( "#dialog" ).html("<p>Are you sure, do you really want to drop Course?</p>");
                        $( "#dialog" ).dialog({
                        modal: true,
                        buttons: {
                            Ok: function () {            
                                $(this).dialog("close");
                                 $.post("dropCourseImpl.php", {
                                   id: id,
                                    semester:semester,
                                     year:year
                                  },
                           function (data, status) {
                     
                           $( "#dialog" ).html("");
                                 $( "#dialog" ).html("<p>"+data+"</p>");
                                   $( "#dialog" ).dialog({
                               modal: true,
                                dialogClass: 'no-close success-dialog',
                                buttons: {
                                   Ok: function () {            
                                   $(this).dialog("close");
                                   window.location.reload(true); 
                                 }
                               }
                             }
                             );

                         
                       });

        
            }

                            }
                         


  
});

                      }
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

                   <a class="dropdown-toggle" role="button" href="#"><i class="fa fa-user-circle"></i> <?php echo $_SESSION["user_name"]; ?> </a>
                </li>
                <li class="dropdown">

                    <a class="dropdown-toggle" role="button" href="#">  <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span></a>

                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out" ></i> Logout</a></li>
            </ul>
        </div>
    </div>
    
</div>
<div id="main">

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
<div class="container-fluid text-center">
<div id="viewcourse">
      <h1>Drop Course</h1>
      <hr>
<form id="view_form" method="POST">
   <div class="container">
      
    <div class="form-group">
          Semester:
      <div class="btn-group btn-group-inline">
      <select style="width: 100px;"class="form-control" name="semester" id="semester">
      <?php
      
      $sql = "SELECT distinct semester FROM section";
      $row = mysqli_query($db_con,$sql);
      $count  = mysqli_num_rows($row);

       while($row1=mysqli_fetch_array($row,MYSQLI_ASSOC)){
         echo "<option>". $row1['semester'] ."</option>";
        }
      ?>
    </select>
  </div>
      <div class="btn-group btn-group-inline">

      <select style="width: 100px;"class="form-control" name="year" id="year">
      <?php
      $sql = "SELECT distinct year FROM section where year>=2018";
      $row = mysqli_query($db_con,$sql);
      $count  = mysqli_num_rows($row);

       while($row1=mysqli_fetch_array($row,MYSQLI_ASSOC)){
         echo "<option>". $row1['year'] ."</option>";
        }
      ?>
    </select>
  </div>
  
 <div class="btn-group btn-group-inline">
    <!-- Search form -->
   <form class="form-inline active-cyan-4">
    <input class="form-control form-control-sm mr-3 w-75" type="text" name = "search" id="search" placeholder="Enter any keywords here" aria-label="Search">
   </form>
 </div>
  
  <button type="submit" id="searchbtn" class="btn btn-default" name="button_login">Search</button>

<div id = "viewtable">
</div>
</div>
</div>
  </form>
  <div id="dialog">
  </div>
</div>
</div>
</div>
</body>
</html>
