<?php
 include 'database_config.php'; 


  $course_id = trim($_POST['courseid']);
  $course_name = trim($_POST['coursename']);
  $major = trim($_POST['major']);
  $professor_id = trim($_POST['professorid']);
  $semester = trim($_POST['semester']);
  $year = trim($_POST['year']);

  try
  { 
    $sql_s="Select * from section where course_id='$course_id' and semester='$semester' and year='$year'";
    $row_s = mysqli_query($db_con,$sql_s);
    $rowcount=mysqli_num_rows($row_s);

   if($rowcount==0){
   
   $sql = "INSERT INTO course_details values('$course_id','$course_name','$major')";
   $row = mysqli_query($db_con,$sql);

     $sql1 = "INSERT INTO section values(NULL,'$course_id','$semester','$year','$professor_id',0,20)";
     $row1 = mysqli_query($db_con,$sql1);
     if($row1){
       // echo $rowcount;}
    echo "Course Added Succefully!";}
     else{
     echo "Check the course details to be added!";
     }
   
    
  }
  else{
     echo "Course already exists!";
  }


}
  catch(PDOException $e){
   echo $e->getMessage();
  }
 

?>