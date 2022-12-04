<?php 
    session_start(); 
    require('config.php'); 
    require("function-generic.php");
    require("function-user-data.php");
    require("PHPMailer_v5.0.2/class.phpmailer.php");
    require("function-email.php");

    $prefix = $_POST["prefix"];
    $nameth = $_POST["nameth"]; 
    $lastnameth = $_POST["lastnameth"];
    $nameen = $_POST["nameen"];
    $lastnameen = $_POST["lastnameen"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"]; 
    $birth = $_POST["birth"]; 
    $mariage = $_POST["mariage"];
    $idcard = $_POST["idcard"];
    $address = $_POST["address"];
    $district = $_POST["district"];
    $amphoe = $_POST["amphoe"];
    $province = $_POST["province"];
    $zipcode = $_POST["zipcode"];
    $tel = $_POST["tel"];
    $workplace = $_POST["workplace"];
    $position = $_POST["position"];
    $salary = $_POST["salary"];

    $uid = $_POST["uid"];

    $update = update_user_data($con, $uid, $prefix, $nameth, $lastnameth, $nameen, $lastnameen,  $gender,  $nationality,  $birth,  $tel , $mariage, $idcard, $address, $district, $amphoe, $province, $zipcode, $workplace, $position, $salary); 
    if($update){
        //alert_update($con,$_SESSION['user'],$smail,$spass);
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
            window.location.href = "../";
        </script>
        <?php
    }


?> 