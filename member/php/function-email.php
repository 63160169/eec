<?php 
    function email_confirmation($con,$email,$cfurl,$smail,$spass){
       
        $mail = new PHPMailer();
        
        $res = get_user($con, $email);

        $name = $res['user_firstname']. ' '.$res['user_lastname'];
        $body = "เรียน $name   <br>";
        $body = $body."กรุณายืนยันที่อยู่อีเมล์เพื่อเสร็จสิ้นการสมัครบัญชี อีอีซีมีงานทำ.com <br><br>";
        $body = $body.$cfurl.$res['user_id'];
      
    
        
        
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
        $mail->Port = 465; //port
        $mail->Username = $smail; // account SMTP
        $mail->Password = $spass; // SMTP Password

        $mail->SetFrom($smail, "ยืนยีนที่อยู่อีเมล์");
        $mail->Subject = "ยืนยันที่อยู่อีเมล์อีอีซีมงานทำ.com";

        $mail->MsgHTML($body);

        $mail->AddAddress($email, $name); 
        

        if(!$mail->Send()) {
            echo "mail Error";
            return FALSE;
        } 
        else{
            
            return TRUE;
        }
    }
    function email_confirmation_coordinator($con,$email,$cfcourl,$smail,$spass){
       
        $mail = new PHPMailer();
        
        $res = get_user($con, $email);

        $name = $res['user_firstname']. ' '.$res['user_lastname'];
        $body = "เรียน $name   <br>";
        $body = $body."กรุณายืนยันที่อยู่อีเมล์เพื่อเสร็จสิ้นการสมัครบัญชี อีอีซีมีงานทำ.com <br><br>";
        $body = $body.$cfcourl.$res['user_id'];
      
    
        
        
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
        $mail->Port = 465; //port
        $mail->Username = $smail; // account SMTP
        $mail->Password = $spass; // SMTP Password

        $mail->SetFrom($smail, "ยืนยีนที่อยู่อีเมล์");
        $mail->Subject = "ยืนยันที่อยู่อีเมล์อีอีซีมงานทำ.com";

        $mail->MsgHTML($body);

        $mail->AddAddress($email, $name); 
        

        if(!$mail->Send()) {
            echo "mail Error";
            return FALSE;
        } 
        else{
            
            return TRUE;
        }
    }
    function alert_update($con,$email,$smail,$spass){
        $time = time(); 
        $mail = new PHPMailer();
        
        $res = get_user($con, $email);
  
        $name = $res['user_firstname']. ' '.$res['user_lastname'];
        $body = "เรียน $name   <br>";
        $body = $body."แก้ไขข้อมูลส่วนบุคคลสำเร็จ <br>";
        $body = $body."เวลาที่ทำการการแก้ไข : ".date("d-m-Y H:i:s", $time);
    
    
        
        
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
        $mail->Port = 465; //port
        $mail->Username = $smail; // account SMTP
        $mail->Password = $spass; // SMTP Password

        $mail->SetFrom($smail, "แจ้งเตือนการแก้ไขข้อมูล");
        $mail->Subject = "แจ้งเตือนการแก้ไขข้อมูล";

        $mail->MsgHTML($body);

        $mail->AddAddress($email, $name); 
        

        if(!$mail->Send()) {
            echo "mail Error";
            return FALSE;
        } 
        else{
            
            return TRUE;
        }
    }
    
    function alert_eb01_status($con,$email,$fname, $status,$smail,$spass){
        $time = time(); 
        $mail = new PHPMailer();
        
        
        $body = $body."ยืนยันการบันทึกสถานะแบบฟอร์ม <br>";
        $body = $body."โครงการ: $fname <br>";
        $body = $body."สถานะ: $status <br>";
        $body = $body."เวลาที่ทำการบันทึก : ".date("d-m-Y H:i:s", $time);
    
    
        
        
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
        $mail->Port = 465; //port
        $mail->Username = $smail; // account SMTP
        $mail->Password = $spass; // SMTP Password

        $mail->SetFrom($smail, "อีอีซีมีงานทำ.com");
        $mail->Subject = "แจ้งเตือนการบันทึกเอกสาร";

        $mail->MsgHTML($body);

        $mail->AddAddress($email, $name); 
        

        if(!$mail->Send()) {
            echo "mail Error";
            return FALSE;
        } 
        else{
            
            return TRUE;
        }
    }
    function alert_eb02_status($con,$email,$fname, $status,$smail,$spass){
        $time = time(); 
        $mail = new PHPMailer();
        
        
        $body = $body."ขออนุมัติจัดอบรมระยะสั้นตามแนวทางอีอีซีโมเดล (EB-02) <br>";
        $body = $body."โครงการ: $fname <br>";
        $body = $body."สถานะ: $status <br>";
        $body = $body."เวลาที่ทำการบันทึก : ".date("d-m-Y H:i:s", $time);
    
    
        
        
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
        $mail->Port = 465; //port
        $mail->Username = $smail; // account SMTP
        $mail->Password = $spass; // SMTP Password

        $mail->SetFrom($smail, "อีอีซีมีงานทำ.com");
        $mail->Subject = "รายงานผลการขออนุมัติจัดอบรมระยะสั้นตามแนวทางอีอีซีโมเดล (EB-02)";

        $mail->MsgHTML($body);

        $mail->AddAddress($email, $name); 
        

        if(!$mail->Send()) {
            echo "mail Error";
            return FALSE;
        } 
        else{
            
            return TRUE;
        }
    }
    function alert_update_password($con,$email,$smail,$spass){
        $time = time(); 
        $mail = new PHPMailer();
        
        $res = get_user($con, $email);
  
        $name = $res['user_firstname']. ' '.$res['user_lastname'];
        $body = "เรียน $name   <br>";
        $body = $body."เปลี่ยนรหัสผ่านสำเร็จ <br>";
        $body = $body."เวลาที่ทำการการแก้ไข : ".date("d-m-Y H:i:s", $time);
    
    
        
        
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Host = "ssl://smtp.gmail.com"; // SMTP server
        $mail->Port = 465; //port
        $mail->Username = $smail; // account SMTP
        $mail->Password = $spass; // SMTP Password

        $mail->SetFrom($smail, "แจ้งเตือนการแก้ไขข้อมูล");
        $mail->Subject = "แจ้งเตือนการแก้ไขข้อมูล";

        $mail->MsgHTML($body);

        $mail->AddAddress($email, $name); 
        

        if(!$mail->Send()) {
            echo "mail Error";
            return FALSE;
        } 
        else{
            
            return TRUE;
        }
    }
?> 