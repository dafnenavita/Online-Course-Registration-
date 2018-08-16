<?php
session_start();
include 'database_config.php'; 

  $semester = trim($_POST['semester']);
  $year= trim($_POST['year']);
  $search = trim($_POST['search']);
  $student_name = $_SESSION["sess_username"];

  //echo $student_name;

  try
  {
   $sql = "SELECT student_id from student_details where email = '$student_name'";
    $result = mysqli_query($db_con,$sql);
     while($row=mysqli_fetch_assoc($result)) {
    $studentid = $row['student_id'];
   }
   

   if($search != ""){
   $sql1 = "Select * from student_course where student_id='$studentid' and semester='$semester' and year='$year' and  flag=0 and course_id like '%$search%'";
   }
   else{   
   $sql1 = "Select * from student_course where student_id='$studentid' and semester='$semester' and year='$year' and  flag=0";
   }

   $result1 = mysqli_query($db_con,$sql1);
   $rows = array();
   while($row_1=mysqli_fetch_assoc($result1)) {
      $courseid = $row_1['course_id'];
      //echo $courseid;
      $sql2 = "SELECT * from section,course_details where section.course_id = course_details.course_id and section.course_id = '$courseid' and section.semester='$semester' and section.year='$year' and flag=0";
      $result2 = mysqli_query($db_con,$sql2);

     //$rows = array();
     while($row=mysqli_fetch_assoc($result2)) {
     $rows[] = $row;
     }
     
    }  

    echo json_encode($rows);  
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 

?>