<?php 
    // Database configurations
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "manpower";
    $con = mysqli_connect($host,$user,$pass ,$dbname);

    try {
      // สร้างตัวแปรสำหรับเชื่อมต่อฐานข้อมูล
      $db_con = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);
      // ตั้งค่าให้ PDO ส่งข้อผิดพลาดเมื่อมีข้อผิดพลาดเกิดขึ้น
      $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // ตั้งค่าให้ PDO ส่งข้อมูลเป็น UTF-8
      $db_con->exec("set names utf8");
  } catch (PDOException $e) {
      // แสดงข้อผิดพลาด
      echo $e->getMessage();
  }

    // if (mysqli_connect_errno()) {
    //   echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //   header("location:https://prepro.informatics.buu.ac.th/~manpower/eec/");
    //   exit();
    // }
    
  //Timezone configuration
  date_default_timezone_set("Asia/Bangkok");  
  
  //SMTP Configuration 
  $smail = 'eec.operator@gmail.com'; 
  $spass = 'Pwd@2021'; 

  //URL configuration 
  // $cfurl = 'https://prepro.informatics.buu.ac.th/~manpower/eec/portal/?content=confirm-email&uid=';  //Email confirmation url
  // $cfcourl = 'https://prepro.informatics.buu.ac.th/~manpower/eec/portal/?content=proxy-register&uid=';  //Email confirmation url for proxy
    
?>