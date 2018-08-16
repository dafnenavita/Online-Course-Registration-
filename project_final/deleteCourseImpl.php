<?php
 include 'database_config.php'; 


  $id = trim($_POST['id']);
  //echo $id;

  try
  { 
   
  $sql = "UPDATE section SET flag = '1' WHERE section_id='$id'";
  $row = mysqli_query($db_con,$sql);
   if($row)
   {
   
   $sql_s = "SELECT * from section where section_id='$id'";
   $result1 = mysqli_query($db_con,$sql_s);
   while($row1=mysqli_fetch_assoc($result1)) {
      $course_id = $row1['course_id'];
      $semester = $row1['semester'];
      $year = $row1['year'];
   }

   $sql1= "UPDATE student_course SET flag = '1' WHERE course_id ='$courseid' and semester='$semester' and year='$year'";
   $rows = mysqli_query($db_con,$sql1);
   echo "Deletion Successful!";
   }
   else
   {
    echo "Error occurred while deleting";
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 

?>