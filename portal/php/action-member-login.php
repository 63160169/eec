<?php 
    require("../../member/php/config.php");
    require("../../member/php/function-user-data.php");
    $user = $_POST["username"]; 
    $pass = $_POST["password"];  

    $res = user_login($con, $user, md5($pass));  
    if(count($res) > 0){
        if($res["user_status"] == 0){
            header("location:../?err=1");
        }
        else{
            session_start(); 
            $_SESSION['user'] = $res["user_username"];
            $_SESSION['type'] = $res["type_id"];
            $_SESSION['id'] = $res["user_id"];  
            header("location:../../member/"); 
        }
    }
    else{
        header("location:../?err=0");
    }

    
?> 