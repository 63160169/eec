<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");

    $eb01_id_2 = $_POST["eb01_id_2"];
    $course_id = $_POST["course_id"];
    $title = $_POST["title"];
    $ins_name = $_POST["ins_name"];



	
	
	//dynamic_form -------------------------------
	$dynamic_form = $_POST["dynamic_form"]; 
	$eb01_detail = "";

	$keys = array_keys($dynamic_form);
	for($i = 0; $i < count($dynamic_form); $i++) {
		$chk=0;
		foreach($dynamic_form[$keys[$i]] as $key => $value) {
			if($chk!=0){ $eb01_detail = $eb01_detail.","; }
			$eb01_detail = $eb01_detail."{a1: \'".$dynamic_form["dynamic_form"][$key]["a1"]."\',a2: \'". $dynamic_form["dynamic_form"][$key]["a2"]."\',a3: \'". $dynamic_form["dynamic_form"][$key]["a3"]."\'}";
			$chk++;
		}
	}
	//echo $eb01_detail;
	//dynamic_form -------------------------------



    $create = create_form_select_test($con, $eb01_id_2, $course_id,$title ,$ins_name);
    if($create){
        header("location:../?content=list-test"); 
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