<?php 
     session_start(); 
     require ('config.php'); 
     require ("function-generic.php");
     require ("function-user-data.php");
     require ("function-education-data.php");
     require ("PHPMailer_v5.0.2/class.phpmailer.php");
     require ("function-email.php"); 

     $oldpass = md5($_POST["old"]); 
     $newpass = md5($_POST["new"]);
     $uid = $_POST["uid"];

     $sql = "SELECT * FROM eec_user WHERE `user_id` = '$uid' AND `user_pass` = '$oldpass'";
     $query = mysqli_query($con, $sql); 
     if(mysqli_num_rows($query) > 0){
        $sql = "UPDATE eec_user SET user_pass = '$newpass' WHERE `user_id` = '$uid'";
        $query = mysqli_query($con, $sql); 
        if($query){
            alert_update_password($con,$_SESSION["user"],$smail,$spass)
            ?> 
            <script> 
                alert("เปลี่ยนรหัสผ่านสำเร็จ"); 
                window.location.href = '../';
            </script>
            <?php 
        }
        else{
            ?> 
            <script>
                alert("ไม่สามารถดำเนินการได้"); 
                window.history.back();
            </script>
         <?php 
        }
     }
     else{
         ?> 
            <script>
                alert("ไม่สามารถดำเนินการได้"); 
                window.history.back();
            </script>
         <?php 
     }

?> 