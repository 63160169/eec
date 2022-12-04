<?php 
       session_start(); 
       require ('config.php'); 
       require ("function-generic.php");
       require ("function-user-data.php");
       require ("function-institute-data.php");
       require ("PHPMailer_v5.0.2/class.phpmailer.php");
       require ("function-email.php"); 

       $email = $_POST["email"]; 
       $type = $_POST["type"];
      
      
           $id = generateRandomString(20);
           if(create_user_proxy($con, $email, $id, $type)){
               $sent = email_confirmation_coordinator($con,$email,$cfcourl,$smail,$spass);
               if(!$sent){
                    echo "Mail Error..";
               }
               else{
                ?> 
                <script> 
                     alert("สร้างบัญชีผู้ใช้สำเร็จ");
                     window.location.href= "../?content=list-user";
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