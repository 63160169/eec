<?php 
    require ('../../member/php/config.php'); 
    require ("../../member/php/function-generic.php");
    require ("../../member/php/function-form-data.php");
    require ("../../member/php/PHPMailer_v5.0.2/class.phpmailer.php");
    require ("../../member/php/function-email.php");

    $nid = $_POST["national"]; 
    $uid = $_POST["uid"]; 
    $pass =  $_POST["password"];
    $pass = md5($pass);
    $sql = "UPDATE eec_user SET user_id_card = '$nid', user_pass = '$pass' WHERE `user_id` = '$uid'"; 
    $query = mysqli_query($con, $sql);
    if($query){
        header("location:../?content=confirm-email&uid=$uid");
    }
    else{
        ?> 
        <script>
            alert("ไม่สามารถกำเนินการได้");
            window.history.back();
        </script>
        <?php 
    }
?> 