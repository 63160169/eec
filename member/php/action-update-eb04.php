<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php");
	
    $fid = $_POST["fid"]; 
    $eb03_id = $_POST["eb03_id"]; 
    $comp_name  = $_POST["comp_name"];
    $comp_trainee  = $_POST["comp_trainee"]; 
    $fileupload_ori  = $_POST["fileupload_ori"]; 
	
	

	// File Uploader ---------------------------------------------	
	
	//chk file upload
	if(!file_exists($_FILES['fileupload']['tmp_name']) || !is_uploaded_file($_FILES['fileupload']['tmp_name'])) {
		echo 'No upload';
	}
	else{ echo 'Have file';
	}
	
	include('../dist/js/fileuploader/class.fileuploader.php');

	// get custom name field
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}	
	$customName = "eb04_".$randomString;
	
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
	

    $create = update_form_eb04($con , $fid , $eb03_id , $comp_name , $comp_trainee , $filenameDB , 1);
	
	

    if($create){
        header("location:../?content=list-eb04"); 
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