<?php 
    session_start(); 
    require ('config.php'); 
    $skill = $_POST["skill"]; 
    $uid = $_POST["uid"]; 
    
    $sql = "INSERT INTO eec_user_skill(`sk_title`, `user_id`) VALUES ('$skill', '$uid')";
    $query = mysqli_query($con, $sql); 
    header('location:../');

?> 