<?php
session_start();
include 'database_config.php'; 
$student_name = $_SESSION["sess_username"];


	
try
  { 
   foreach ($_POST['selectcheckbox'] as $section_id){

   $sql = "SELECT student_id from student_details where email = '$student_name'";
   $result = mysqli_query($db_con,$sql);
   while($row=mysqli_fetch_assoc($result)) {
   	$studentid = $row['student_id'];
   }

   $sql1 = "SELECT * FROM section where section_id = '$section_id'";
   $result1 = mysqli_query($db_con,$sql1);
   while($row=mysqli_fetch_assoc($result1)) {
   	$courseid = $row['course_id'];
   	$semester = $row['semester'];
   	$year = $row['year'];
    $avail=$row['availability'];
     
   } 
   //
   if($avail!=0){

   $sql_s= "SELECT COUNT(*) as total from student_course group by student_id,semester,year having student_id='$studentid' and semester='$semester' and year='$year' and flag=0";
   $result_s = mysqli_query($db_con,$sql_s);
   
   $data=mysqli_fetch_assoc($result_s);

   if($data['total'] == 3) {
    $message= 'Course cannot be enrolled.Reason:Cannot add more than 3 courses';
   }

   else{


  

     $sql2 = "INSERT INTO student_course values('$studentid','$courseid','$semester','$year',0)";
     $result2 = mysqli_query($db_con,$sql2);
  


     if($result2){
     $avail=$avail-1;
     $message="";

     $sql3 = "UPDATE section SET availability='$avail' where section_id = '$section_id'";
     $result3= mysqli_query($db_con,$sql3);
 
    if(isset($_SESSION['cart'])){

       unset($_SESSION['cart'][$section_id]);
       $_SESSION['cart'] = array_values($_SESSION['cart']);
   
    }

   
      $message="course enrolled successfully";
      //header('Location:studentaddcourse.php');
      }
     else{
      $message="Course already enrolled";
      //header("Location:shoppingcart.php?enrolledresult='Check the course details to be enrolled!'");
      }


     }

   }
   else{

    $message="Availability NIL.Course registration closed.";
   }
}
     echo $message;
}
  catch(PDOException $e){
   echo $e->getMessage();
  }

?>