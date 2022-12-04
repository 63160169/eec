<?php 
    require("../../member/php/config.php");
    require("../../member/php/function-generic.php");
    require("../../member/php/function-user-data.php");
    require("../../member/php/PHPMailer_v5.0.2/class.phpmailer.php");
    require("../../member/php/function-email.php");
    
    $email = $_POST["email"]; 
    $user = $_POST["username"]; 
    $pass = $_POST["password"];  
    $rand_id = generateRandomString(20);
    
    $create = create_user($con, $email, $user, $pass, $rand_id, 5);

   
    if($create){
        $userdata = get_user($con, $user);
        $sent = email_confirmation($con,$email,$cfurl,$smail,$spass);
        if($sent){
            ?> 
                <script>
                    alert("กรุณายืนยันที่อยู่อีเมล์ <?php echo $userdata["user_username"]; ?>")
                    window.location.href = '../';
                    
                </script>
            <?php
        }
    }
    else{
        ?> 
                <script>
                    alert("ไม่สามารถดำเนินการได้")
                    window.history.back();
                    
                </script>
            <?php
    }

    
    
    
?>  