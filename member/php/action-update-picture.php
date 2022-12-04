<?php 
    require('config.php'); 
    require("function-generic.php");
    require("function-user-data.php");
    require("PHPMailer_v5.0.2/class.phpmailer.php");
    require("function-email.php");

    $id = $_POST["uid"];
    $t = time();
    $target_dir = "./uploads/profile/";
    $file_name = $t.'_'.basename($_FILES["pic"]["name"]);
    $target_file = $target_dir . $file_name;
    
    $flag = false;
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        if(update_user_pictre($con, $id, $file_name)){
            $flag = true; 
        }
    } 
    if(!$flag){
        ?> 
        <script>
            alert("ไม่สามารถดำเนินการได้");
            //window.history.back();
        </script>
        <?php 
    }
    else{
        ?> 
        <script>
            alert("ดำเนินการเสร็จสมบูรณ์");
            window.location.href="../";
        </script>
        <?php
    }
  



?> 