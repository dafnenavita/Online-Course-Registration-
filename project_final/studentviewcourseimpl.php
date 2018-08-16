<?php
session_start();
include 'database_config.php'; 

  $semester = trim($_POST['semester']);
  $year= trim($_POST['year']);

  try
  { 
   $sql = '';

   $student_name = $_SESSION["sess_username"];
   $sql = "SELECT student_id from student_details where email = '$student_name'";
   $result = mysqli_query($db_con,$sql);
   while($row=mysqli_fetch_assoc($result)) {
    $studentid = $row['student_id'];
   }

 // echo $studentid;

   $sql1 = "SELECT * from student_course where student_id = '$studentid' and semester = '$semester' and year = '$year' and flag = 0";
   $result1 = mysqli_query($db_con,$sql1);
   $rows = array();

   while($row1=mysqli_fetch_assoc($result1)) {
    $course_id=$row1['course_id'];
   // echo $course_id;
    $sql = "Select * from course_details,section where course_details.course_id=section.course_id and semester = '$semester' and year = '$year' and course_details.course_id='$course_id' and flag = 0";
     $result = mysqli_query($db_con,$sql);
	 

  	while($row=mysqli_fetch_assoc($result)) {
    	$rows[] = $row;
   	}   
  }
  echo json_encode($rows);
}
  catch(PDOException $e){
   echo $e->getMessage();
  }
 

?>