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

$data = get_form_eb01_detail($con, $fid);


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
$pdf->Image('print_eb01_1.gif',0,0,-144);


$pdf->SetFont('THSarabun','',15);	//ขนาดตัวอักษร
//$pdf->SetTextColor(255,0,0);//red color

$pdf->Ln(54.0);
$pdf->Cell(42.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_title"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(69.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', get_institute_name($con, $data["tins_id"]) ),0,0);

$pdf->SetFont('THSarabun','',14);	//ขนาดตัวอักษร
$pdf->Ln(5.9);
$pdf->Cell(46.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', get_institute_contact($con, $data["tins_id"], 'n') ),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', get_institute_contact($con, $data["tins_id"], 't') ),0,0);
$pdf->Cell(18.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', get_institute_contact($con, $data["tins_id"], 'm') ),0,0);

//ผู้ประกอบการที่ประสงค์เข้ารับการอบรม
if($data["priv_id"]==1){$pdf->Image('../images/icon_true.png',39.0,84.5,-144);}	
if($data["priv_id"]==2){$pdf->Image('../images/icon_true.png',39.0,90.5,-144);}	
if($data["priv_id"]==3){$pdf->Image('../images/icon_true.png',39.0,96.0,-144);}	
if($data["priv_id"]==4){$pdf->Image('../images/icon_true.png',39.0,101.5,-144);}	

//ตอบสนองต่ออุตสาหกรรมเป้าหมาย28.0
if($data["eb01_target"]==1){$pdf->Image('../images/icon_true.png',28.0,113.5,-144);}	
if($data["eb01_target"]==2){$pdf->Image('../images/icon_true.png',78.5,113.5,-144);}	
if($data["eb01_target"]==3){$pdf->Image('../images/icon_true.png',134.0,113.5,-144);}	
if($data["eb01_target"]==4){$pdf->Image('../images/icon_true.png',28.0,123.0,-144);}	
if($data["eb01_target"]==5){$pdf->Image('../images/icon_true.png',78.5,123.0,-144);}	
if($data["eb01_target"]==6){$pdf->Image('../images/icon_true.png',134.0,123.0,-144);}	
if($data["eb01_target"]==7){$pdf->Image('../images/icon_true.png',28.0,132.5,-144);}	
if($data["eb01_target"]==8){$pdf->Image('../images/icon_true.png',78.5,132.5,-144);}	
if($data["eb01_target"]==9){$pdf->Image('../images/icon_true.png',134.0,132.5,-144);}	
if($data["eb01_target"]==10){$pdf->Image('../images/icon_true.png',28.0,137.5,-144);}	
if($data["eb01_target"]==11){$pdf->Image('../images/icon_true.png',78.5,137.5,-144);}	
if($data["eb01_target"]==12){$pdf->Image('../images/icon_true.png',134.0,137.5,-144);}	
if($data["eb01_target"]==13){$pdf->Image('../images/icon_true.png',28.0,147.3,-144);}	
if($data["eb01_target"]==14){$pdf->Image('../images/icon_true.png',78.5,147.3,-144);}	
if($data["eb01_target"]==15){$pdf->Image('../images/icon_true.png',134.0,147.3,-144);}	

$pdf->Ln(82.3);
$pdf->Cell(51.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_trainee_gen"] ),0,0);
$pdf->Cell(5.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_trainee_per_gen"] ),0,0);
$pdf->Cell(13.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_trainee_total"] ),0,0);

$pdf->Ln(6.3);
$pdf->Cell(57.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_schedule"] ),0,0);

$pdf->Ln(6.3);
$pdf->Cell(57.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_period"] ),0,0);

$pdf->Ln(6.5);
$pdf->Cell(57.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_budget_per_gen"] ),0,0);
$pdf->Cell(45.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_budget"] ),0,0);

$pdf->Ln(6.3);
$pdf->Cell(57.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', $data["eb01_target_trainee"] ),0,0);

$pdf->setXY(40,192.3);	//กำหนดตำแหน่งแสดงข้อความใหม่
$pdf->MultiCell( 135,6.4, iconv( 'UTF-8','TIS-620' , substr($data["eb01_intro"],0,500) ));

$pdf->setXY(40,218.0);	//กำหนดตำแหน่งแสดงข้อความใหม่
$pdf->MultiCell( 135,6.4, iconv( 'UTF-8','TIS-620' , substr($data["eb01_outcome"],0,500) ));

$pdf->setXY(40,243.3);	//กำหนดตำแหน่งแสดงข้อความใหม่
$pdf->MultiCell( 135,6.4, iconv( 'UTF-8','TIS-620' , substr($data["eb01_impact"],0,500) ));



/*
$pdf->setXY( 10, 50  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวธรรมดา ขนาด 12' ) );
 
$pdf->setXY( 10, 20  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวหนา ขนาด 16' )  );
 
$pdf->setXY( 10, 30  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวเอียง ขนาด 24' )  );
 
$pdf->setXY( 10, 40  );
$pdf->MultiCell( 0  , 0 , iconv( 'UTF-8','cp874' , 'อังสนา ตัวหนาเอียง ขนาด 32' )  );

*/






$pdf->AddPage();

//เรียกฟอร์มที่เป็นรูปมาแสดงเป็นพื้นหลัง
$pdf->Image('print_eb01_2.gif',0,0,-144);


$pdf->SetFont('THSarabun','',14);	//ขนาดตัวอักษร
//$pdf->SetTextColor(255,0,0);//red color


$eb01_detail = str_replace("},","};",$data["eb01_detail"]);	//เปลี่ยนคั่นกลางจาก , เป็น ;
$eb01_detail = explode(";", $eb01_detail);
for ($x = 0; $x <= 10; $x++) 
{
	$eb01_detail_2[$x] = explode(",", $eb01_detail[$x]);	
} 


$pdf->Ln(47.0);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[0] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[0] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[0] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[1] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[1] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[1] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[2] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[2] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[2] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[3] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[3] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[3] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[4] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[4] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[4] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[5] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[5] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[5] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[6] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[6] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[6] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[7] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[7] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[7] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[8] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[8] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[8] [2]))),0,0);

$pdf->Ln(5.6);
$pdf->Cell(24.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("{a1: '","",$eb01_detail_2[9] [0]))),0,0);
$pdf->Cell(35.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'","",str_replace("a2: '","",$eb01_detail_2[9] [1]))),0,0);
$pdf->Cell(60.0,7,iconv( 'UTF-8','TIS-620',''),0,0);//สำหรับปรับย่อหน้า
$pdf->Cell(19,7,iconv( 'UTF-8','TIS-620', str_replace("'}","",str_replace("a3: '","",$eb01_detail_2[9] [2]))),0,0);



$pdf->Output();
?>