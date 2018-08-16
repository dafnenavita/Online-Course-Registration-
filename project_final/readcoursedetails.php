<?php
 include 'database_config.php'; 

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
	
    // get User ID
    $section_id = $_POST['id'];
    
    // Get User Details
    $sql = "SELECT * FROM course_details,section WHERE course_details.course_id = section.course_id and section_id = '$section_id'";
    $result = mysqli_query($db_con,$sql);
    $rows = array();
	while($row=mysqli_fetch_assoc($result)) {
	$rows[] = $row;
	}
	echo json_encode($rows); 
    
}


?>