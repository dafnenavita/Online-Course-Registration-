<?php
 include 'database_config.php'; 

  $id=trim($_POST['id']);
  $course_id = trim($_POST['update_course_id']);
  $course_name = trim($_POST['update_course_name']);
  $major = trim($_POST['update_major']);
  $professor_id = trim($_POST['update_prof_id']); 
  $semester = trim($_POST['update_semester']);
  $year = trim($_POST['update_year']);
  $availability = trim($_POST['update_availability']);


  try
  { 
   
   $sql = "UPDATE course_details SET course_id='$course_id',course_name='$course_name',
   major='$major' WHERE course_id='$course_id'";
   $row = mysqli_query($db_con,$sql);
   if($row)
   {
       $sql1 = "UPDATE section SET course_id='$course_id',semester='$semester',year='$year',prof_name='$professor_id',availability='$availability' WHERE section_id ='$id'";
      $row1 = mysqli_query($db_con,$sql1);
      echo "updated successfully";
   }
   else
   {
    echo "error in updating values";
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 

?>