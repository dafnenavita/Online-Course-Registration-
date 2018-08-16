<?php  

 include 'database_config.php'; 

        $id=$_POST['id']; 
        
        //echo $id;
        

         // $_SESSION['cart']['id']=$id;
        
        if(isset($_SESSION['cart'][$id])){ 
            $message="Course already in cart!"; 
            echo $message;
              
        }else{ 
         //     $_SESSION['cart'][$id]=$id;
            $sql="Select * from course_details,section where course_details.course_id=section.course_id and section_id = '$id'"; 
            $result = mysqli_query($db_con,$sql);
         
                while($row_s=mysqli_fetch_assoc($result)) {
                
                  
                 $_SESSION['cart'][$row_s['section_id']]=array( 
                        "course_id" => $row_s['course_id'] , 
                        "course_name" => $row_s['course_name'] ,
                        "major" => $row_s['major'] ,
                        "professorname" => $row_s['prof_name'] ,
                        "semester" => $row_s['semester'] ,
                        "year" => $row_s['year'] 
                    ); 
                
                                   
            }

            echo "Course added to cart";
              
        }
    
  
?>