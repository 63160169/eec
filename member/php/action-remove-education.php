<?php 
     session_start(); 
     require ('config.php'); 
     $eid = $_GET["eid"]; 
     $sql = "DELETE FROM eec_user_education WHERE edu_id = $eid"; 
     $query = mysqli_query($con, $sql); 
     header("location:../");
?> 