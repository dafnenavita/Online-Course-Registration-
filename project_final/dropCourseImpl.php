<?php
session_start();
include 'database_config.php'; 

$student_name = $_SESSION["sess_username"];

  $id = trim($_POST['id']);
  $semester = trim($_POST['semester']);
  $year = trim($_POST['year']);

$sql = "SELECT student_id from student_details where email = '$student_name'";
$result = mysqli_query($db_con,$sql);
while($row=mysqli_fetch_assoc($result)) {
   	$studenid = $row['student_id'];
   }

  try
  { 
   
  $sql1 = "UPDATE student_course SET flag = '1' WHERE course_id ='$id' and student_id ='$studenid'";
   $row1 = mysqli_query($db_con,$sql1);
   if($row1)
   {
     $sql2 = "UPDATE section SET availability = availability+1  WHERE course_id ='$id' and semester='$semester' and year='$year'";
     $row2 = mysqli_query($db_con,$sql2);
     echo "Course Dropped Successfully!";
   }
   else
   {
    echo "Error occurred while dropping course";
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 

?>