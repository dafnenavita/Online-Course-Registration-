<?php

 session_start();

 $servername = "localhost";
 $username = "root";
 $password = "root";
 $dbname = "courseregistration";

 //create connection
$db_con=mysqli_connect($servername,$username,$password,$dbname,'3306');

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>