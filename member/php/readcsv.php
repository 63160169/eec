<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
    header( 'Content-Type:text/html; charset=utf-8'); 
?> 
<?php
      require_once "./phpExcel/Classes/PHPExcel.php";//เรียกใช้ library สำหรับอ่านไฟล์ excel
      require ("config.php");
        $tmpfname = "ins2.xlsx";//กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
       //สร้าง object สำหรับอ่านข้อมูล ชื่อ $excelReader
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);//อ่านข้อมูลจากไฟล์ชื่อ test_excel.xlsx
        $worksheet = $excelObj->getSheet(0);//อ่านข้อมูลจาก sheet แรก
        $lastRow = $worksheet->getHighestRow(); 
       //นับว่า sheet แรกมีทั้งหมดกี่แถวแล้วเก็บจำนวนแถวไว้ในตัวแปรชื่อ $lastRow
   
        echo "<table>";
        for ($row = 1; $row <= $lastRow; $row++)//วน loop อ่านข้อมูลเอามาแสดงทีละแถว
       {
           echo "<tr><td>";
             echo $worksheet->getCell('A'.$row)->getValue();//แสดงข้อมูลใน colum A
           echo "</td><td>";
              echo $worksheet->getCell('B'.$row)->getValue();//แสดงข้อมูลใน colum B
              echo "</td><td>";
              echo $worksheet->getCell('C'.$row)->getValue();//แสดงข้อมูลใน colum B
              echo "</td><td>";
              echo $worksheet->getCell('D'.$row)->getValue();//แสดงข้อมูลใน colum B
            echo "</td><tr>";
            $a = $worksheet->getCell('B'.$row)->getValue();
            $b = $worksheet->getCell('C'.$row)->getValue(); 
            $c = $worksheet->getCell('D'.$row)->getValue();
            $sql = "INSERT INTO `eec_institute`(ins_name_th, ins_name_en, ins_campus) VALUES ('$a','$b','$c')"; 
            $obj = mysqli_query($con, $sql); 
        }
        echo "</table>";   
?>