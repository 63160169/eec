<?php

echo "1";
// File Uploader ++++++++++++++++++++++++++++++++++++++++++++++++
include('../dist/js/fileuploader/class.fileuploader.php');

// get custom name field
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }	
$customName = "eb00_".$randomString;

// initialize FileUploader
$FileUploader = new FileUploader('files', array(
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
echo "2";
// call to upload the files
$data = $FileUploader->upload();

// export to js
//echo json_encode($data);

// get the fileList
$fileList = $FileUploader->getFileList();

echo "3";
	
//บันทึกชื่อไฟล์สำหรับเก็บลง DB
$chkArray=1;
foreach($fileList as $key => $value)
{
	$filenameDB = $filenameDB.$value['name'];
	if($chkArray != count($fileList))$filenameDB = $filenameDB."|";
	$chkArray++;
}
echo "4";
echo "xxx ".$filenameDB;

/*
// Update 
$sql = "UPDATE `cch_helpdesk`.`hd_ticket` SET `fileupload` = '$filenameDB' WHERE `hd_ticket`.`id` =$job_no;";
$query = mysql_query($sql,$connect_db_project) or die(mysql_error());


//Log record
$logSql="insert into hd_log ( username, detail) values ( '".$_SESSION["opr_username"]."','".str_replace("'", "", $sql)." ".chkIP()."')";
$query = mysql_query($logSql,$connect_db_project) or die(mysql_error());
*/
//exit;
// File Uploader ++++++++++++++++++++++++++++++++++++++++++++++++
echo "5";
?>