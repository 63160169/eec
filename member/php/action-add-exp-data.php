<?php 
       session_start(); 
       require ('config.php'); 
       require ("function-generic.php");
       require ("function-user-data.php");
       require ("function-education-data.php");
       require ("PHPMailer_v5.0.2/class.phpmailer.php");
       require ("function-email.php"); 

       $uid = $_POST["uid"];
       $job = $_POST["job_title"]; 
       $workplace= $_POST["work_place"]; 
       $salary = $_POST["salary"]; 
       $date = $_POST["work_date"];

       
       $add = add_user_exp($con, $uid, $job, $workplace, $salary, $date);

       if($add){
            alert_update($con,$_SESSION['user'],$smail,$spass);
            ?> 
        <script>
            alert("แก้ไขข้อมูลสำเร็จ");
            window.location.href = "../";
        </script>
        <?php 
    }
    else{
        ?> 
        <script>
            alert("ไม่สามารถแก้ไขข้อมูลได้");
           // window.location.href = "../";
        </script>
        <?php
       }
?> 