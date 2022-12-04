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

$data = get_form_eb02_detail($con, $fid);
$data_eb01 = get_form_eb01_detail($con,  $data["eb01_id"]);


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
$pdf->Image('print_eb02.gif',0,0,-144);


$pdf->SetFont('THSarabun','',16);	//ขนาดตัวอักษร
//$pdf->SetTextColor(255,0,0);//red color

$pdf->Ln(36.0);
$pdf->Cell(44.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data_eb01["eb01_course_id"] ),0,0);

$pdf->Ln(7.0);
$pdf->Cell(44.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data_eb01["eb01_title"] ),0,0);

$pdf->Ln(7.0);
$pdf->Cell(78.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', get_institute_name($con, $data_eb01["tins_id"]) ),0,0);

$pdf->Ln(6.8);
$pdf->Cell(78.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
//$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', get_institute_contact($con, $data_eb01["tins_id"]) ),0,0);
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["trainee_comp"] ),0,0);

$pdf->Ln(6.8);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', dateConvert2($data["trainee_date"]) ),0,0);

$pdf->Ln(6.8);
$pdf->Cell(70.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["trainee_num"]." คน" ),0,0);


$pdf->Ln(24.0);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget1"] ),0,0);

$pdf->Ln(6.8);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget2"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget3"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget4"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget5"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget6"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget_sum"] ),0,0);

$pdf->Ln(13.0);
$pdf->Cell(124.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["budget_eec"] ),0,0);


$pdf->Ln(42.5);
$pdf->Cell(75.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["sign_name"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(75.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["sign_pos"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(90.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', dateConvert2($data["sign_date"]) ),0,0);


$pdf->Output();
?>