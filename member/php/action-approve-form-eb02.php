<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");

    $fid = $_POST["fid"];
    $status = $_POST["app"]; 
    $status_txt = ""; 
    if($status == 1){
        $status_txt = "รอพิจารณา";
    }
    else if($status == 2){
        $status_txt = "รอแก้ไข";
    }
    else if($status == 3){
        $status_txt = "อนุมัติ";
    }
    
   
    $update = update_form_eb02_status($con, $fid, $status);
    if($update){
		
        $res = get_form_eb02_detail($con, $fid); 
        alert_eb02_status($con,$_SESSION["user"],$res["eb01_title"],$status_txt,$smail,$spass);
        alert_eb02_status($con,$res["user_username"],$res["eb01_title"],$status_txt,$smail,$spass);  
		
       
        
        ?> 
        <script>
            alert("รายงานผลการอนุมัติสำเร็จ");
            window.location.href = "../?content=list-eb02";
        </script>
        <?php 
    }
    else{
        ?> 
        <script>
            alert("ไม่สามารถรายงานผลการอนุมัติได้");
            window.history.back();
        </script>
        <?php
    }


?> 