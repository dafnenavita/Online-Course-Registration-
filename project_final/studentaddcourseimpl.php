<?php
 include 'database_config.php'; 

  $semester = trim($_POST['semester']);
  $year= trim($_POST['year']);
  $search = trim($_POST['search']);

  try
  { 
   $sql = '';
   if($search != ""){
	$sql = "Select * from course_details,section where course_details.course_id=section.course_id and (semester = '$semester' and year = '$year' and 
   (course_details.course_id LIKE '%$search%' or course_name like '%$search%')) and flag = 0";
   }
   else{   
   $sql = "Select * from course_details,section where course_details.course_id=section.course_id and semester = '$semester' and year = '$year' and flag = 0";}
   $result = mysqli_query($db_con,$sql);

	$rows = array();
	while($row=mysqli_fetch_assoc($result)) {
	$rows[] = $row;
	}
	echo json_encode($rows);    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 

?>