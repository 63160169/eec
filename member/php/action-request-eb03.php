<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");
	
    $eb02_id = $_POST["eb02_id"]; 
    $province_id = $_POST["province_id"];
    $contact_name = $_POST["contact_name"]; 
    $contact_surname = $_POST["contact_surname"]; 
    $contact_agency = $_POST["contact_agency"]; 
    $contact_email = $_POST["contact_email"]; 
    $contact_phone = $_POST["contact_phone"]; 
    $train_institute_1 = $_POST["train_institute_1"]; 
    $train_date_start = $_POST["train_date_start"]; 
    $train_date_end = $_POST["train_date_end"];
    $train_days = $_POST["train_days"];
    $train_hours = $_POST["train_hours"]; 
    $train_trainee = $_POST["train_trainee"]; 
    $train_lecturer = $_POST["train_lecturer"]; 
    $expenses_total = $_POST["expenses_total"]; 
    $expenses_regis = $_POST["expenses_regis"]; 
    $expenses_regis_perc = $_POST["expenses_regis_perc"]; 
    $expenses_eec = $_POST["expenses_eec"]; 
    $expenses_eec_perc = $_POST["expenses_eec_perc"]; 
    $expenses_support = $_POST["expenses_support"]; 
    $expenses_support_text = $_POST["expenses_support_text"]; 
    $payee_name = $_POST["payee_name"]; 
    $payee_address = $_POST["payee_address"]; 
    $payee_tex = $_POST["payee_tex"]; 
    $payee_bookbank = $_POST["payee_bookbank"]; 
    $payee_bookbank_id = $_POST["payee_bookbank_id"]; 
    $payee_bookbank_bank = $_POST["payee_bookbank_bank"]; 
    $payee_bookbank_branch = $_POST["payee_bookbank_branch"]; 
	
	
	//dynamic_form -------------------------------
	$dynamic_form = $_POST["dynamic_form"]; 
	$train_institute_2 = "";

	$keys = array_keys($dynamic_form);
	for($i = 0; $i < count($dynamic_form); $i++) {
		$chk=0;
		foreach($dynamic_form[$keys[$i]] as $key => $value) {
			if($chk!=0){ $train_institute_2 = $train_institute_2.","; }
			$train_institute_2 = $train_institute_2."{a1: \'".$dynamic_form["dynamic_form"][$key]["a1"]."\'}";
			$chk++;
		}
	}
	//echo $train_institute_2;
	//dynamic_form -------------------------------
	
	
	
	// File Uploader ---------------------------------------------	
	include('../dist/js/fileuploader/class.fileuploader.php');

	// get custom name field
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}	
	$customName = "eb03_".$randomString;
	
	//ถ้าไม่เคยมีเอกสาร
	if($fileupload_ori == " ")
	{ 
		$customName = $fileupload_ori; 
	}  
	else
	{
		$link = './uploads/'.$fileupload_ori;
		unlink("$link");
	}
	
	// initialize FileUploader
	$FileUploader = new FileUploader('fileupload', array(
		'limit' => null,
		'maxSize' => null,
		'fileMaxSize' => null,
		'extensions' => null,
		'required' => false,
		'uploadDir' => 'uploads/',
		'title' => $customName,
		'listInput' => true,
		'files' => null
	));

// call to upload the files
$data = $FileUploader->upload();

// export to js
//echo json_encode($data);

// get the fileList
$fileList = $FileUploader->getFileList();

		
	//บันทึกชื่อไฟล์สำหรับเก็บลง DB
	$chkArray=1;
	foreach($fileList as $key => $value)
	{
		$filenameDB = $filenameDB.$value['name'];
		if($chkArray != count($fileList))$filenameDB = $filenameDB."|";
		$chkArray++;
	}
	//echo "xxx ".$filenameDB;


	//exit;
	// File Uploader ---------------------------------------------
	

    $create = create_form_eb03($con , $eb02_id , $province_id , $contact_name , $contact_surname , $contact_agency , $contact_email , $contact_phone , $train_institute_1 , $train_institute_2 ,$train_date_start , $train_date_end , $train_days , $train_hours , $train_trainee , $train_lecturer , $expenses_total, $expenses_regis, $expenses_regis_perc, $expenses_eec, $expenses_eec_perc, $expenses_support, $expenses_support_text, $payee_name, $payee_address, $payee_tex, $payee_bookbank, $payee_bookbank_id, $payee_bookbank_bank, $payee_bookbank_branch, $filenameDB, 1, $_SESSION['id']);
	
	

    if($create){
        header("location:../?content=list-eb03"); 
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