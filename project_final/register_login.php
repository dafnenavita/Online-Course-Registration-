<?php
 session_start();
 include 'database_config.php'; 
 
 if(isset($_POST['button_login']))
 {
  $user_name = trim($_POST['username']);
  $user_password = trim($_POST['password']);
  $user_email = trim($_POST['email']);
  
  $password = md5($user_password);


  
  try
  { 
   $sql1 = "INSERT INTO user_authentication values('$user_email','$password',0)";
   $row1 = mysqli_query($db_con,$sql1);
   if($row1){
       $sql3 = "INSERT INTO student_details values(NULL,'$user_name','$user_email')";
       $row3 = mysqli_query($db_con,$sql3);
     echo 'Registered Successfully';  	
  }
   else{
     echo 'Already registered user';
   }
 
  }
  catch(Exception $e){
   echo $e->getMessage();
  }
 }

?>