<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");

    $fid = $_POST["fid"]; 
    $title = $_POST["title"]; 
    $institute = $_POST["institute"];
    $coordinator = $_POST["coordinator"]; 
    $holder = $_POST["holder"]; 
    $target_industry = $_POST["target_industry"]; 
    $gen = $_POST["gen"]; 
    $per_gen = $_POST["per_gen"]; 
    $per_total = $_POST["per_total"]; 
    $train_schedule = $_POST["train_schedule"];
    $train_period = $_POST["train_period"]; 
    $budget_per_gen = $_POST["budget_per_gen"];
    $budget_total = $_POST["budget_total"];
    $target = $_POST["target"]; 
    $intro = $_POST["intro"]; 
    $outcome = $_POST["outcome"]; 
    $impact = $_POST["impact"];
	

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

	
	$update = update_form_eb01($con, $fid, $title,$institute ,$target_industry,$per_total ,$per_gen, $gen,$train_schedule ,$train_period ,$budget_per_gen,$budget_total ,$target ,$intro ,$outcome ,$impact, $eb01_detail, $holder,1);

    if($update){
        header("location:../?content=list-eb01"); 
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