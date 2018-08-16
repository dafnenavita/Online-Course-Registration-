<?php
session_start();
include 'database_config.php'; 

$student_name = $_SESSION["sess_username"];


$sql = "SELECT student_id from student_details where email = '$student_name'";
$result = mysqli_query($db_con,$sql);
while($row=mysqli_fetch_assoc($result)) {
   	$studentid = $row['student_id'];
   }

$sql1 = "SELECT course_id from students_course where student_id = '$studentid' and semester = 'spring' and year = 2018";
$result1 = mysqli_query($db_con,$sql1);
while($row1=mysqli_fetch_assoc($result1)) {
   	$courseid = $row1['course_id'];
    
$sql2="Select course_id,course_name from course_details where course_id = '$courseid'";
$result2 = mysqli_query($db_con,$sql2);
$rows = array();
while($row2=mysqli_fetch_assoc($result2)) {     
  $rows[] = $row2;
}
echo json_encode($rows);


}

?>