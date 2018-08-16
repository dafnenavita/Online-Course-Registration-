<?php
session_start();
      include 'database_config.php'; 
     /* if(isset($_GET['enrolledresult'])){
        echo $_GET['enrolledresult'];
      }*/
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shopping cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <link type="text/css" rel="stylesheet" href="./adminstyle.css"></script>
  <link rel="icon" type="image/jpg" href="utd.jpg" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script>

$('document').ready(function() {
$("#submitbtn").click(function(e) {
e.preventDefault();

   // Add course ID to the hidden field for furture usage
  var data = $("#enroll_form").serialize();
     $.ajax({
    
   type : 'POST',
   url  : 'enrollcourses.php',
    data : data,
    async: true,
   success :  function(data1)
      {  
   
  
                        $( "#dialog" ).html("");
                        $( "#dialog" ).html("<p>"+data1+"</p>");
                        $( "#dialog" ).dialog({
                        modal: true,
                        dialogClass: 'no-close success-dialog',
                        buttons: {
                            Ok: function () {            
                                $(this).dialog("close");
                            }              
                         
                        },
                        close: function(event, ui){ 
                            window.location.href="studentaddcourse.php";
                        }
                        });


                     
   }
    
    
  }


  );


});

});

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
                    <a class="dropdown-toggle" role="button" href="shoppingcart.php">  <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span></a>

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

<div id="dialog">
  </div>
<div class="container-fluid text-center col-md-7 col-flex-item">
      <h1> Shopping Cart</h1>
      <hr>

              
          <?php
    

   // if(isset($_SESSION['cart'])){ 

     
   
     
        $sql="Select * from course_details,section where course_details.course_id=section.course_id and section_id IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
       $sql=substr($sql, 0, -1).")"; 
       $result = mysqli_query($db_con,$sql); 
       //echo mysqli_num_rows($result);
       if(mysqli_num_rows($result)==0){

        ?>
      
        <h3> No courses added in shopping cart </h3>

<?php
       }
       else{


        ?> 
        
  <form method="post" id="enroll_form">

      <table class ='table table-bordered'>
        <thead>
          <tr>
            <th class='text-center'>Course Id</th>
            <th class='text-center'>Course Name</th>
            <th class='text-center'>Major</th>
            <th class='text-center'>Professor Name</th>
            <th class='text-center'>Semester</th>
            <th class='text-center'>Year</th>
            <th class='text-center'></th>

    </tr>
  </thead>
  <tbody>
  <?php

       while($row=mysqli_fetch_assoc($result)) {
              
              
        ?> 
           <tr> 
                             <td><?php echo $row['course_id'] ?></td> 
                             <td><?php echo $row['course_name'] ?></td> 
                             <td><?php echo $row['major'] ?></td> 
                             <td><?php echo $row['prof_name'] ?></td> 
                             <td><?php echo $row['semester'] ?></td>
                             <td><?php echo $row['year'] ?></td>
          <td><input type="checkbox" class="form-check-input" id="selectcheckbox" name = "selectcheckbox[]" value= <?php echo $row['section_id'] ?>></td>

                        
              </tr> 
        <?php 
              
        } 

       
    ?> 
 
   </tbody>
  </table>
  <input type="submit" value="Enroll Courses" id="submitbtn">
 </form>
<?php
}
?>
</div>
    
 </div>
</div>

</body>
</html>
