<?php 

  
    require("PHPMailer_v5.0.2/class.phpmailer.php");
     $mail = new PHPMailer();
        
     

 
     $body = "Hello World!!!!!!";
  
   
 
     
     
     $mail->CharSet = "utf-8";
     $mail->IsSMTP();
     $mail->SMTPDebug = 1;
     $mail->SMTPAuth = true;
     $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
     $mail->Port = 465; //port
     $mail->Username = 'view4gsignal.test@gmail.com'; // account SMTP
     $mail->Password = 'pwd@2021'; // SMTP Password

     $mail->SetFrom( "view4gsignal.test@gmail.com", "view4gsignal Admin");
     $mail->Subject = "ทดสอบ SMTP Server";

     $mail->MsgHTML($body);

     $mail->AddAddress('w.yookwan@gmail.com', 'สมชาย อยู่ดึก'); 
     

     if(!$mail->Send()) {
         echo "mail Error";
         return FALSE;
     } 
     else{
         
         return TRUE;
     }
?> 