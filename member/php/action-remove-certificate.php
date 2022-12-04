<?php 
     session_start(); 
     require ('config.php'); 
     $cid = $_GET["cid"]; 
     $sql = "DELETE FROM eec_user_certificate WHERE cer_id = $cid"; 
     $query = mysqli_query($con, $sql); 
     header("location:../");
?> 