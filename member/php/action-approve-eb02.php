<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");

    $fid = $_POST["fid"];
    
    
    $key = generateRandomString(6); 
    $sql = "UPDATE eec_form_eb01 SET eb01_enroll_key = '$key' WHERE eb01_id = $fid"; 
    $update = mysqli_query($con, $sql);

    if($update){
        $res = get_form_eb01_detail($con, $fid); 
        alert_eb01_status($con,$_SESSION["user"],$res["eb01_title"],$status_txt,$smail,$spass);
        alert_eb01_status($con,$res["user_username"],$res["eb01_title"],$status_txt,$smail,$spass);  
       
        
        ?> 
        <script>
            alert("แก้ไขข้อมูลสำเร็จ");
            window.location.href = "../?content=user-request-approve";
        </script>
        <?php 
    }
    else{
        ?> 
        <script>
            alert("ไม่สามารถแก้ไขข้อมูลได้");
            window.history.back();
        </script>
        <?php
    }


?> 