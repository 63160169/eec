<?php 
    session_start(); 
    require ('config.php'); 
    require ("function-generic.php");
    require ("function-user-data.php");
    require ("function-institute-data.php");
    require ("PHPMailer_v5.0.2/class.phpmailer.php");
    require ("function-email.php"); 
    require ("function_course_data.php"); 
    require_once 'Classes/PHPExcel.php';
    /** PHPExcel_IOFactory - Reader */
    include 'Classes/PHPExcel/IOFactory.php';
    $t = time(); 
    // $conid = $_POST["conid"];
    // $source = $_POST["source"];
    // $stdFile = $_FILES["file"];
    // $sql = "SELECT * FROM CONFR_CONFERENCE WHERE con_id = $conid"; 
    // $obj = mysqli_query($con, $sql);
    // $res = mysqli_fetch_array($obj);
    // $cname = $res["con_abv"]; 
    // $ext = pathinfo($stdFile['name'], PATHINFO_EXTENSION);
    // $newName = $cname."-".$t.".".$ext;
    // echo $newName;  
    // if(move_uploaded_file($stdFile["tmp_name"],"./temp/".$newName))
    // {
        //echo "Copy/Upload Complete"." ".$stdFile["name"];
        $newName = 'data2.xlsx';
        $inputFileName = "./uploads/data/".$newName;  
        echo $inputFileName;
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
        $objReader->setReadDataOnly(true);  
        $objPHPExcel = $objReader->load($inputFileName);  
            
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
            
        $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
        $headingsArray = $headingsArray[1];
            
        $r = -1;
        $namedDataArray = array();
        for ($row = 2; $row <= $highestRow; ++$row) {
            $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
            if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
                ++$r;
                foreach($headingsArray as $columnKey => $columnHeading) {
                    $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
                }
            }
        }
    // }
?> 
        <table width="500" border="1">
              <tr>
                <td>no</td>
                <td>Year</td>
                <td>Institute</td>
                <td>Center </td>
                <td>Industry </td>
                <td>title </td>
                <td>Course ID </td>
                <td>Credit </td>
                <td>Name </td>
                <td>Nat ID </td> 
                <td>Work Place </td>
                <td> Remark </td>
                
              </tr>
            <?php
            $flag = true;
            foreach ($namedDataArray as $result) {
            ?>
                  <tr>
                    <td><?php echo $result["ที่"];?></td>
                    <td><?php echo $result["ปีงบประมาณ"];?></td>
                    <td><?php echo $result["สถาบันที่จัดการอบรม"];?></td>
                    <td><?php echo $result["หน่วยฝึกอบรม"];?></td>
                    <td><?php echo $result["อุตสาหกรรมเป้าหมาย"];?></td>
                    <td><?php echo $result["ชื่อหลักสูตร"];?></td>
                    <td><?php echo $result["รหัสหลักสูตร"];?></td>
                    <td><?php echo $result["จำนวนชั่วโมง"];?></td>
                    <td><?php echo $result["ชื่อผู้เข้ารับการอบรม"];?></td>
                    <td><?php echo $result["เลขประจำตัวประชาชน"];?></td>
                    <td><?php echo $result["ชื่อสถานที่ทำงาน"];?></td>
                    <td><?php echo $result["หมายเหตุ"];?></td>
                    

                  

                    <?php 
                        $year = $result["ปีงบประมาณ"];
                        $ins = $result["สถาบันที่จัดการอบรม"];
                        $center = $result["หน่วยฝึกอบรม"];
                        $indus = $result["อุตสาหกรรมเป้าหมาย"];
                        $title = $result["ชื่อหลักสูตร"];
                        $cid = $result["รหัสหลักสูตร"];
                        $credit = $result["จำนวนชั่วโมง"];
                        $name = $result["ชื่อผู้เข้ารับการอบรม"];
                        $nid = $result["เลขประจำตัวประชาชน"];
                        $work = $result["ชื่อสถานที่ทำงาน"];
                        $remark = $result["หมายเหตุ"];
                        $username = $result["email"];
                      

                        
                        $entry = get_course_data_by_cid($con, $cid);
                        $course_id = 0;
                        if($entry){
                           $course_id = $entry["course_id"];
                        } 
                        else{
                            $enroll = generateRandomString(6);
                            $sql = "INSERT INTO `eec_training_course`(`course_title`, `course_course_id`, `course_year`, `course_training_institute`, `course_training_center`, `course_credit`, `course_target_industry`, `course_status`, `course_enroll_key`) VALUES ('$title','$cid','$year','$ins','$center','$credit', '$indus',3,'$enroll')"; 
                            $query = mysqli_query($con, $sql);
                            if(!$query){
                                echo "Error ".$sql;    
                            }
                            else{
                                $course_id = mysqli_insert_id($con);
                            } 
                        }

                        $user =  get_user_by_nat_id($con, $nid);
                        if($user){
                            $t = time(); 
                            $uid = $user["user_id"]; 
                            $sql = "INSERT INTO eec_course_enroll(`user_id`, `course_id`, `enr_status`, `enr_time`) VALUES ('$uid', '$course_id', '1', '$t')";
                            $query = mysqli_query($con, $sql); 
                        }
                        else{
                            $type = 1;
                            $arr_user = explode(" ",$name);
                            //echo $arr_user[1]; 
                            $rand_id = generateRandomString(20);
                            $create = create_user_proxy_from_file($con, $username, $rand_id, $arr_user[0], $arr_user[1], $work, $nid, $type);

                            $t = time(); 
                            $sql = "INSERT INTO eec_course_enroll(`user_id`, `course_id`, `enr_status`, `enr_time`) VALUES ('$rand_id', '$course_id', '1', '$t')";
                            $query = mysqli_query($con, $sql); 
                        }
                        
                    ?> 
                    
                  </tr>
            <?php
            }//End foreach
            ?>
        </table>
        <br> 
    <?php header("location:../?content=training-course"); ?>
    