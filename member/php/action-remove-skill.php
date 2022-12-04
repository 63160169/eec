<?php 
     session_start(); 
     require ('config.php'); 
     $sid = $_GET["sid"]; 
     $sql = "DELETE FROM eec_user_skill WHERE sk_id = $sid"; 
     $query = mysqli_query($con, $sql); 
     header("location:../#nav-certification");
?> 