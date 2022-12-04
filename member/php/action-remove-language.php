<?php 
     session_start(); 
     require ('config.php'); 
     $lid = $_GET["lid"]; 
     $sql = "DELETE FROM eec_user_language WHERE lg_id = $lid"; 
     $query = mysqli_query($con, $sql); 
     header("location:../#nav-certification");
?> 