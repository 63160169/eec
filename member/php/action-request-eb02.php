<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");
	
    $eb01_id = $_POST["eb01_id"]; 
    $trainee_comp = $_POST["trainee_comp"];
    $trainee_date = $_POST["trainee_date"]; 
    $trainee_num = $_POST["trainee_num"]; 
    $budget1 = $_POST["budget1"]; 
    $budget2 = $_POST["budget2"]; 
    $budget3 = $_POST["budget3"]; 
    $budget4 = $_POST["budget4"]; 
    $budget5 = $_POST["budget5"];
    $budget6 = $_POST["budget6"]; 
    $budget_sum = $_POST["budget_sum"];
    $budget_eec = $_POST["budget_eec"];
    $sign_name = $_POST["sign_name"]; 
    $sign_pos = $_POST["sign_pos"]; 
    $sign_date = $_POST["sign_date"]; 


    $create = create_form_eb02($con , $eb01_id , $trainee_comp , $trainee_date , $trainee_num , $budget1 , $budget2 , $budget3 , $budget4 ,$budget5 , $budget6 , $budget_sum , $budget_eec , $sign_name , $sign_pos , $sign_date, 1,$_SESSION['id']);

    if($create){
        header("location:../?content=list-eb02"); 
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