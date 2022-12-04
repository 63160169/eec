<?php 
       session_start(); 
       require ('config.php'); 
       require ("function-generic.php");
       require ("function-user-data.php");
       require ("function-institute-data.php");
       require ("PHPMailer_v5.0.2/class.phpmailer.php");
       require ("function-email.php"); 

       $ins_id = $_POST["institute"]; 
       $co_type = $_POST["coordinator_type"];
       $no = $_POST["id"];
       $uid = "";
       if($co_type == 1){
            $uid = $_POST["coordinator"];
            echo "uid : ".$uid;
       }
       else if($co_type == 2){
           $email = $_POST["co-email"]; 
           $name = $_POST["co-name"]; 
           $lastname = $_POST["co-lastname"];
           $id = generateRandomString(20);
           $type = 3;
           if(create_coordinator($con, $email, $name, $lastname, $id, $type)){
               $sent = email_confirmation_coordinator($con,$email,$cfcourl,$smail,$spass);
               if(!$sent){
                    echo "Mail Error..";
               }
           }
           $uid = $id; 
       }
    
       if(create_institute($con, $ins_id, $uid, $no)){
            header("location:../?content=list-institute-training");
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