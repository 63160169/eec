<?php

session_start(); 
if(!isset($_SESSION["user"])){
    header("location:../"); 
} 

ob_start();

//เรียกใช้ fpdf
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-form-data.php");
    require ("function-institute-data.php");
	require('./fpdf/fpdf.php');

//-------------------------------------------------

//นับคำแบบ UTF-8
function utf8_strlen($s) {
 $c = strlen($s); $l = 0;
 for ($i = 0; $i < $c; ++$i)
 if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
 return $l;
 }

//คำสั่งรับค่าตัวแปร
$fid=$_GET["fid"];	

$data = get_form_eb03_detail($con, $fid);
$data_eb02 = get_form_eb02_detail($con,  $data["eb02_id"]);
$data_eb01 = get_form_eb01_detail($con,  $data_eb02["eb01_id"]);


//-------------------------------------------------

//กำหนดขนาด A4 แนวตั้ง
//สามารถกำหนดขนาดได้ P=แนวตั้ง L=แนวนอน
//$pdf=new FPDF( 'P' , 'mm' , array( 210,297 ) );
//SetMargins ซ้าย,ขวา,บน
$pdf=new FPDF( 'P' , 'mm' , 'A4' );
$pdf->SetMargins( 10,5,10 );
$pdf->SetAutoPageBreak(10);
$pdf->AddPage();

//config font  B: ตัวหนา I: ตัวเอียง BI หรือ IB: ตัวหนาเอียง
define('FPDF_FONTPATH','font/');
$pdf->AddFont('THSarabun','','THSarabun.php');
$pdf->AddFont('THSarabun','B','THSarabunBold.php');
$pdf->AddFont('THSarabun','I','THSarabunItalic.php');
$pdf->AddFont('THSarabun','BI','THSarabunBoldItalic.php');

//เรียกฟอร์มที่เป็นรูปมาแสดงเป็นพื้นหลัง
$pdf->Image('print_eb03.gif',0,0,-144);


$pdf->SetFont('THSarabun','',14);	//ขนาดตัวอักษร
//$pdf->SetTextColor(255,0,0);//red color

$pdf->Ln(27.0);
$pdf->Cell(50.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data_eb01["eb01_course_id"] ),0,0);

$pdf->Ln(7.0);
$pdf->Cell(50.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data_eb01["eb01_title"] ),0,0);

$pdf->Ln(7.0);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', get_institute_name($con, $data_eb01["tins_id"]) ),0,0);
$pdf->Cell(42.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', display_province_name($con, $data["province_id"] )),0,0);

$pdf->Ln(7.2);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["contact_name"]." ".$data["contact_surname"] ),0,0);
$pdf->Cell(40.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["contact_agency"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(40.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["contact_email"] ),0,0);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["contact_phone"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(95.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["train_institute_1"] ),0,0);

//ex {a1: 'บริษัท ฤดี จำกัด มหาชน'},{a1: 'บริษัท ห้างขายยา จำกัด'}
$train_institute_2 = explode(",", $data["train_institute_2"]);
$pdf->Ln(14.0);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("{a1: '","",str_replace("'}","",$train_institute_2[0] ))),0,0);
$pdf->Ln(7.0);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("{a1: '","",str_replace("'}","",$train_institute_2[1] ))),0,0);
$pdf->Ln(7.0);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("{a1: '","",str_replace("'}","",$train_institute_2[2] ))),0,0);
$pdf->Ln(7.0);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("{a1: '","",str_replace("'}","",$train_institute_2[3] ))),0,0);
$pdf->Ln(7.0);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("{a1: '","",str_replace("'}","",$train_institute_2[4] ))),0,0);

$pdf->Ln(7.4);
$pdf->Cell(80.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', dateConvert2($data["train_date_start"]) ),0,0);
$pdf->Cell(30.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', dateConvert2($data["train_date_end"]) ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["train_days"] ),0,0);
$pdf->Cell(50.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["train_hours"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["train_trainee"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["train_lecturer"] ),0,0);

$pdf->Ln(14.0);
$pdf->Cell(100.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["expenses_total"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(100.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["expenses_regis"] ),0,0);
$pdf->Cell(42.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["expenses_regis_perc"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(100.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["expenses_eec"] ),0,0);
$pdf->Cell(42.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["expenses_eec_perc"] ),0,0);

$pdf->Ln(14.0);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["expenses_support"] ),0,0);
$pdf->Cell(20.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["expenses_support_text"] ),0,0);

$pdf->Ln(7.0);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["payee_name"] ),0,0);

$pdf->Ln(7.0);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["payee_address"] ),0,0);

$pdf->Ln(7.0);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["payee_tex"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["payee_bookbank"] ),0,0);

$pdf->Ln(7.2);
$pdf->Cell(55.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["payee_bookbank_id"] ),0,0);
$pdf->Cell(30.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["payee_bookbank_bank"] ),0,0);
$pdf->Cell(20.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["payee_bookbank_branch"] ),0,0);




$pdf->Output();
?>