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
  <script type="text/javascript" src="editcourse.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <link type="text/css" rel="stylesheet" href="./adminstyle.css"></script>
  <link rel="icon" type="image/jpg" href="utd.jpg" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
  
<script>
function getCourseDetails(id) {
   // Add course ID to the hidden field for furture usage
    $("#hidden_course_id").val(id);
    $.post("readcoursedetails.php", {
            id: id
        },
        function (data, status) {
            var dat = JSON.parse(data)[0];
      //alert(dat.course_id);
            ///Assing existing values to the modal popup fields
            $('#update_course_id').val(dat.course_id);
            $("#update_course_name").val(dat.course_name);
            $("#update_major").val(dat.major);
      $("#update_prof_id").val(dat.prof_name);
            $("#update_semester").val(dat.semester);
      $("#update_year").val(dat.year);
      $("#update_availability").val(dat.availability);

        
        }
    );
    // Open modal popup
     $("#update_course_modal").modal("show");
  
}

function UpdateCourseDetails() {
    // get values
    var course_id = $("#update_course_id").val();
    var course_name = $("#update_course_name").val();
    var major = $("#update_major").val();
  var update_prof_id = $("#update_prof_id").val();
    var update_semester = $("#update_semester").val();
  var update_year = $("#update_year").val();
  var update_availability = $("#update_availability").val();
   // alert(update_prof_id);
    // get hidden field value
    var id = $("#hidden_course_id").val();   
  
    $.post("updatecourseimpl.php", {
        id:id,
            update_course_id: course_id,
            update_course_name: course_name,
            update_major: major,
      update_prof_id: update_prof_id,
      update_semester: update_semester,
      update_year: update_year,
      update_availability:update_availability
    },
        function (data, status) {
    
            // hide modal popup
            $("#update_course_modal").modal("hide");
                //readRecords();
                         $( "#dialog" ).html("");
                        $( "#dialog" ).html("<p>"+data+"</p>");
                        $( "#dialog" ).dialog({
                        modal: true,
                        buttons: {
                            Ok: function () {            
                                $(this).dialog("close");
                            }              
                        },
                        close: function(event, ui){ 
                            window.location.reload(true); 
                        }
                        });
                            
        }
    );
}

function deleteCourseDetails(id){
  //alert(id);
    $( "#dialog" ).html("");
   $( "#dialog" ).html("Are you sure you want to delete");
  $("#dialog").dialog({
    
              modal: true,
             width: 400,
            buttons : {
                Ok: function() {
                    $(this).dialog("close"); //closing on Ok click
                      $.post("deleteCourseImpl.php", {
                         id: id
                           },
                        function (data, status) {
                         // reload Users by using readRecords();
                         //readRecords();
                         $( "#dialog" ).html("");
                        $( "#dialog" ).html("<p>Deletion Successful</p>");
                        $( "#dialog" ).dialog({
                        modal: true,
                        buttons: {
                            Ok: function () {            
                                $(this).dialog("close");
                            }              
                        },
                        close: function(event, ui){ 
                            window.location.reload(true); 
                        }
                        });
                            
                                }
                            );
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
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" href="#"><i class="fa fa-user-circle"></i> Admin </a>
                </li>
                <li><a href="logout.php"><i class="fa fa-sign-out" ></i> Logout</a></li>
            </ul>
        </div>
    </div>
    
</div>
<div id="main">

<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 style="min-height: 800px">
   <ul class="nav nav-pills nav-stacked">
        <!--<li class="nav-header"></li>-->
        <li><a href="admin.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
        <li><a href="viewcourse.php"><i class="fa fa-eye"></i> View Course</a></li>
        <li><a href="addcourse.php"><i class="fa fa-plus"></i> Add Course</a></li>
        <li><a href="editcourse.php"><i class="fa fa-pencil-square-o"></i> Edit Course</a></li>

    </ul> 
</div>

<!-- /span-3 -->
<div class="container-fluid text-center">
<div id="viewcourse">
      <h1>Edit Course</h1>
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
      $sql = "SELECT distinct year FROM section";
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
  
  <button type="submit" id="searchbtn" class="btn btn-primary" name="button_login">Search</button>
  <br/>
  <br/>
<div id = "viewtable">
</div>
</div>
</div>
  
</form>

</div>

<div id="dialog">
</div>
 
<div class="modal fade" id="update_course_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog centre-posit" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_course_id">Course Id</label>
                    <input type="text" name="update_course_id" id="update_course_id" placeholder="Course Id" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_course_name">Course Name</label>
                    <input type="text" id="update_course_name" placeholder="Course Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_major">Major</label>
                    <input type="text" id="update_major" placeholder="Major" class="form-control"/>
                </div>
        
        <div class="form-group">
                    <label for="update_prof_id">Prof Name</label>
                    <input type="text" id="update_prof_id" placeholder="Prof Name" class="form-control"/>
                </div>
        
        <div class="form-group">
                    <label for="update_semester">Semester</label>
                    <input type="text" id="update_semester" placeholder="Semester" class="form-control"/>
                </div>
        
        <div class="form-group">
                    <label for="update_year">Year</label>
                    <input type="text" id="update_year" placeholder="Year" class="form-control"/>
                </div>

                  <div class="form-group">
                    <label for="update_availability">Availability</label>
                    <input type="text" id="update_availability" placeholder="Availability" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateCourseDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_course_id">
            </div>
        </div>
    </div>
</div>
</div>

</body>
<footer style="background-color:white; text-align: center;">
<nav aria-label="Page navigation example" id="pageid" style="visibility:hidden">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#" >1</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</footer>
</html>
