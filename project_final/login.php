<?php


 include 'database_config.php'; 
 //session_start(); 
 if(isset($_POST['button_login']))
 {
  $user_name = trim($_POST['username']);
  $user_password = trim($_POST['password']);
  
  $password = md5($user_password);

  try
  { 
   
   $sql = "SELECT * FROM user_authentication WHERE user_email_id = '$user_name'";
   $row = mysqli_query($db_con,$sql);
   $count  = mysqli_num_rows($row);
   if($count > 0)
   {
    while($res=mysqli_fetch_array($row,MYSQLI_ASSOC)){
     if($res['password'] == $password){
          session_regenerate_id(); 
          $_SESSION['sess_username'] = $user_name;
          session_write_close();

       if($res['admin_flag'] == 0){
         echo "student";
         }
      else{
        echo 'admin' ;
         }
      }
     else{
      echo "password does not match";
     }
    }
   }
   else
   {
    echo "user does not exist";
    //echo $row['user_id'];
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>