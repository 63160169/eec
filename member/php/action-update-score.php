<?php 
    require('config.php'); 
    require("function-generic.php");
    require("function-north.php");
    require("function-user-data.php");
    require("PHPMailer_v5.0.2/class.phpmailer.php");
    require("function-email.php");
    $insertdata = array();
    $flag = 0;
    foreach ($_POST as $key => $value) {
        $insertdata[$key] = $value;
    }
    // updatedata($con,$insertdata);
    
    // print_r($insertdata);
    $flag = updatedata($con,'eec_enrollment_eb01_user',$insertdata['data']);
    print_r('<br>'.$flag);
    if($flag==0){
        ?> 
        <script>
            alert("ไม่สามารถดำเนินการได้");
            window.history.back();
        </script>
        <?php 
    }
    else{
        ?> 
        <script>
            alert("ดำเนินการเสร็จสมบูรณ์");
            window.history.back();
        </script>
        <?php
    }
?> 