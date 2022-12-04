<?php 
    session_start(); 
    require ('config.php'); 
    $cert_title = $_POST["cer_title"]; 
    $cert_date = $_POST["cer_date"];
    $cert_certified = $_POST["cer_certified"];
    $uid = $_POST["uid"];
    
    $sql = "INSERT INTO eec_user_certificate(`cer_title`, `cer_certified`, `cer_date`, `user_id`) VALUES ('$cert_title', '$cert_certified', '$cert_date', '$uid')";
    $query = mysqli_query($con, $sql); 
    header('location:../');

?> 