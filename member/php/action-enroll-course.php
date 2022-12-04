<?php 
      session_start(); 
      require ('config.php'); 
      require ("function-generic.php");
      require ("function-user-data.php");
      require ("function-education-data.php");
      require ("PHPMailer_v5.0.2/class.phpmailer.php");
      require ("function-email.php"); 
   
    $key = $_POST["key"];
    $uid = $_POST["uid"];

    function get_course_form_key($con, $key){
        $sql = "SELECT * FROM eec_form_eb01 NATURAL JOIN eec_form_eb02 WHERE eb02_enroll_key = '$key'"; 
        $entry = mysqli_query($con, $sql);
        $res = mysqli_fetch_array($entry);
        return $res; 
    }
    function enroll_course($con, $fid, $uid){
        $t = time(); 
        $sql = "INSERT INTO eec_enrollment_eb01_user(`user_id`, `eb01_id`, `enr_status`, `enr_time`) VALUES ('$uid', $fid, '1', '$t')";
        $query = mysqli_query($con, $sql); 
        if($query){
            return true;
        }
        else{
            return false; 
        }
    }

    $res = get_course_form_key($con, $key); 
    if(enroll_course($con, $res["eb01_id"], $uid)){
        ?>
            <script>
                alert("ลงทะเบียนเสร็จสมบูรณ์");
                window.location.href="../?content=user-course-enroll"; 
            </script>
        <?php 
    }
    else{
        ?>
            <script>
                alert("ไม่สามารถลงทะเบียนได้");
                window.history.back(); 
            </script>
        <?php 
    }

 
    
?> 