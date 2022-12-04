<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");

    $title = $_POST["title"]; 
    $ins = $_POST["institute"];
    $center = $_POST["center"]; 
    $indus = $_POST["indus"]; 
    $year = $_POST["year"]; 
    $credit = $_POST["credit"]; 
    $cid = $_POST["course_id"]; 
    $enroll = generateRandomString(6);



    $sql = "INSERT INTO `eec_training_course`(`course_title`, `course_course_id`, `course_year`, `course_training_institute`, `course_training_center`, `course_credit`, `course_target_industry`, `course_status`, `course_enroll_key`) VALUES ('$title','$cid','$year','$ins','$center','$credit', '$indus',3,'$enroll')"; 
    $query = mysqli_query($con, $sql);
   
    if($query){
        header("location:../?content=training-course"); 
    }
    else{
        ?> 
        <script>
            alert("ไม่สามารถส่งฟอร์มได้");
            window.history.back();
        </script>
        <?php 
    }


?> 