<?php 
    session_start(); 
    require ('config.php'); 
    $cert_title = $_POST["cer_title"]; 
    $cert_date = $_POST["cer_date"];
    $cert_certified = $_POST["cer_certified"];
    $cid = $_POST["cid"];
    
    $sql = "UPDATE eec_user_certificate SET `cer_title`='$cert_title', `cer_certified` = '$cert_certified', `cer_date` = '$cert_date' WHERE cer_id = $cid";
    $query = mysqli_query($con, $sql); 
    header('location:../');

?> 