<?php 
    function get_euclidean_distance($lat1, $long1, $lat2, $long2){ 
        return sqrt((($lat1 - $lat2)**2) + (($long1 - $long2)**2));
    }
    function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
      {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
      
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
      
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return ($angle * $earthRadius);
      }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
            }
            else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
        
            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
    function generateRandomString($length = 10) {
        //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
	
	
	 /*----------------------------------------------------*/
	
	
	function monthText($month , $type)
	{
		if($type ==1)
		{
			if($month ==1){ $text = "มกราคม"; }		if($month ==2){ $text = "กุมภาพันธ์"; }		if($month ==3){ $text = "มีนาคม"; }
			if($month ==4){ $text = "เมษายน"; }		if($month ==5){ $text = "พฤษภาคม"; }		if($month ==6){ $text = "มิถุนายน"; }
			if($month ==7){ $text = "กรกฎาคม"; }		if($month ==8){ $text = "สิงหาคม"; }		if($month ==9){ $text = "กันยายน"; }
			if($month ==10){ $text = "ตุลาคม"; }		if($month ==11){ $text = "พฤศจิกายน"; }	if($month ==12){ $text = "ธันวาคม"; }
		}
		if($type ==2)
		{
			if($month ==1){ $text = "ม.ค."; }		if($month ==2){ $text = "ก.พ."; }		if($month ==3){ $text = "มี.ค."; }
			if($month ==4){ $text = "ม.ย."; }		if($month ==5){ $text = "พ.ค."; }		if($month ==6){ $text = "มิ.ย."; }
			if($month ==7){ $text = "ก.ค."; }		if($month ==8){ $text = "ส.ค."; }		if($month ==9){ $text = "ก.ย."; }
			if($month ==10){ $text = "ต.ค."; }		if($month ==11){ $text = "พ.ย."; }		if($month ==12){ $text = "ธ.ค."; }
		}
		return $text;
	}

	$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  
	$thai_month_arr=array("00"=>"","01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน", "07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");  
	$thai_month_arr_short=array("00"=>"","01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"ม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.", "07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");  

	//แปลงวันที่เป็นรูปแบบภาษาไทย
	//รับค่ามาตราฐาน YYYY-MM-DD HH:MM:SS คืนค่าเป็น  วัน จันทร์ ที่ 1 มกราคม พ.ศ.2558 8:00 น.
	function dateTimeConvert($datetime)
	{
		list($date, $time) = split('[ ]', $datetime);
		list($hour, $min, $sec) = split('[:]', $time);
		$date=strtotime($date);
		global $thai_day_arr,$thai_month_arr;  
		$a ="วัน".$thai_day_arr[date("w",$date)];  
		$b = "ที่ ".date("j",$date);  
		$c = " ".$thai_month_arr[date("m",$date)];  
		$d = " พ.ศ.".(date("Y",$date)+543); 
	 
		$timecovert= $hour.":".$min." น.";
		$datetimecovert=$a.$b.$c.$d." ".$timecovert;
		return $datetimecovert;
	}

	//รับค่ามาตราฐาน YYYY-MM-DD  คืนค่าเป็น  วัน จันทร์ ที่ 1 มกราคม พ.ศ.2558 
	function dateConvert($date)
	{
		//list($date, $time) = split('[ ]', $datetime);
		//list($hour, $min, $sec) = split('[:]', $time);
		$date=strtotime($date);
		global $thai_day_arr,$thai_month_arr;  
		$a ="วัน".$thai_day_arr[date("w",$date)];  
		$b = "ที่ ".date("j",$date);  
		$c = " ".$thai_month_arr[date("m",$date)];  
		$d = " พ.ศ.".(date("Y",$date)+543); 
	 
		//$timecovert= $hour.":".$min." น.";
		$datetimecovert=$a.$b.$c.$d;
		return $datetimecovert;
	}

	//รับค่ามาตราฐาน YYYY-MM-DD  คืนค่าเป็น  1 มกราคม 2558 
	function dateConvert2($date)
	{
		//list($date, $time) = split('[ ]', $datetime);
		//list($hour, $min, $sec) = split('[:]', $time);
		$date=strtotime($date);
		global $thai_day_arr,$thai_month_arr;  
		//$a ="วัน".$thai_day_arr[date("w",$date)];  
		$b = date("j",$date);  
		$c = " ".$thai_month_arr[date("m",$date)];  
		$d = " ".(date("Y",$date)+543); 
	 
		//$timecovert= $hour.":".$min." น.";
		$datetimecovert=$b.$c.$d;
		return $datetimecovert;
	}

	//รับค่ามาตราฐาน YYYY-MM-DD HH:MM:SS คืนค่าเป็น  1/1/2558 8:00 น.
	function dateTimeConvertThai_short($datetime)
	{
		list($date, $time) = split('[ ]', $datetime);
		list($hour, $min, $sec) = split('[:]', $time);
		$date=strtotime($date);
		global $thai_day_arr,$thai_month_arr;  
		$b = date("j",$date);  
		$c = date("n",$date);  
		$d = date("Y",$date)+543; 
	 
		$timecovert= $hour.":".$min." น.";
		$datetimecovert=$b."/".$c."/".$d." ".$timecovert;
		return $datetimecovert;
	}


	//รับค่ามาตราฐาน YYYY-MM-DD HH:MM:SS คืนค่าเป็น  1/1/2015 8:00 น.
	function dateTimeConvert_short($datetime)
	{
		list($date, $time) = split('[ ]', $datetime);
		list($hour, $min, $sec) = split('[:]', $time);
		$date=strtotime($date);
		global $thai_day_arr,$thai_month_arr;  
		$b = date("j",$date);  
		$c = date("n",$date);  
		$d = date("Y",$date); 
	 
		$timecovert= $hour.":".$min." น.";
		$datetimecovert=$b."/".$c."/".$d." ".$timecovert;
		return $datetimecovert;
	}


	//รับค่ามาตราฐาน YYYY-MM-DD คืนค่าเป็น  DD/MM/YYYY
	function dateConvert_short($date)
	{
		$date=strtotime($date);
		global $thai_day_arr,$thai_month_arr;  
		$b = date("j",$date);  
		$c = date("n",$date);  
		$d = date("Y",$date); 
	 
		$datetimecovert=$b."/".$c."/".$d;
		return $datetimecovert;
	}


	//convert DD/MM/YYYY to YYYY-MM-DD
	function date_dmy2ymd($date)
	{
		list($d, $m, $y) = split('[/]', $date);
		$ymd=$y."-".$m."-".$d;
		return $ymd;
	}

	//convert DD/MM/YYYY to YYYY-MM-DD พศ เป็น คศ
	function date_dmyTH2ymd($date)
	{
		list($d, $m, $y) = split('[/]', $date);
		$ymd=($y-543)."-".$m."-".$d;
		return $ymd;
	}

	//convert YYYY-MM-DD to DD/MM/YYYY
	function date_ymd2dmy($date)
	{
		list($y, $m, $d) = split('[-]', $date);
		$dmy=$d."/".$m."/".$y;
		return $dmy;
	}
	
	
	 /*----------------------------------------------------*/
	 
	
    function display_province($con, $select_id, $fixID, $disabled){
        $sql = "SELECT  * FROM `th_provinces` "; 		
        $queryData = mysqli_query($con, $sql);
		
    ?> 
        <select name="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true"  <?php if($disabled!=$null){ echo "disabled"; } ?> required>
            <option value=""> -- กรุณาเลือก --</option>
            <?php while($datas = mysqli_fetch_array($queryData)){ 
            ?>
            <option value="<?php echo $datas["code"]; ?>" <?php if($datas["code"]==$fixID){ echo "selected"; } ?>> <?php echo $datas["name_th"] ; ?> </option>
     <?php } // End while ?>                      
        </select>
    <?php
    }
	
    function display_province_name($con, $province_id){
        $sql = "SELECT  * FROM `th_provinces` WHERE code = $province_id "; 		
        $queryData = mysqli_query($con, $sql);		
		$datas = mysqli_fetch_array($queryData);
		return $datas["name_th"];
    }
	
	
    function display_select_user($con, $select_id, $type){
        $users = get_user_type($con, $type);
    ?> 
        <select name="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true" >
            <option value="-1"> -- กรุณาเลือก --</option>
            <?php while($user = mysqli_fetch_array($users)){ 
            ?>
            <option value="<?php echo $user["user_id"]; ?> "> <?php echo $user["user_firstname"]." ".$user["user_lastname"]; ?> </option>
     <?php } // End while ?>                      
        </select>
    <?php
    }
    function display_select_institute($con, $select_id){
        $institutes = get_institute($con);
        ?> 
            <select name="institute" name ="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true" required>
                <option value=""> -- กรุณาเลือก --</option>
                    <?php while($ins = mysqli_fetch_array($institutes)){ 
                            $uni = $ins["ins_name_th"]; 
                            if($ins["ins_campus"] != '-'){
                                $uni = $uni." ".$ins["ins_campus"];
                            }
                    ?>
                <option value="<?php echo $ins["ins_id"]; ?> "> <?php echo $uni; ?> </option>
            <?php } // End while ?>
            </select>
        <?php
        }
        function display_select_training_institute($con, $select_id, $fixID, $disabled){
            $institutes = get_training_institute($con);
            ?> 
                <select  name ="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true"  <?php if($disabled!=$null){ echo "disabled"; } ?> required>
                    <option value="" selected> -- กรุณาเลือก --</option>
                        <?php while($ins = mysqli_fetch_array($institutes)){ 
                                $uni = $ins["ins_name_th"]; 
                                if($ins["ins_campus"] != '-'){
                                    $uni = $uni." ".$ins["ins_campus"];
                                }
								
								//เพิ่มชื่อผู้รับผิดชอบ
                                $uni = $uni." [ผู้รับผิดชอบ: ".$ins["user_firstname"]." ".$ins["user_lastname"]."] ";
								
                        ?>
                    <option value="<?php echo $ins["tins_id"]; ?>" <?php if($ins["tins_id"]==$fixID){ echo "selected"; } ?> > <?php echo $uni; ?> </option>
                <?php } // End while ?>
                </select>
            <?php
            }
            function get_target_industry($con){
                $sql = "SELECT * FROM eec_target_industry WHERE 1"; 
                $entries = mysqli_query($con, $sql); 
                return $entries; 
            }
            function display_select_target_industry($con, $select_id, $fixID, $disabled){
                $entries = get_target_industry($con);
                ?> 
				<!--  ในหน้า form_eb01_detail.php ถ้ามี class selectpicker จะไม่ส่งค่ามาทำให้แก้ไขไม่ได้
                    <select  name ="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true" <?php if($disabled!=$null){ echo "disabled"; } ?> >
				-->
                    <select  name ="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control " data-live-search="true" <?php if($disabled!=$null){ echo "disabled"; } ?> required>
                        <option value="" > -- กรุณาเลือก --</option>
                            <?php while($entry = mysqli_fetch_array($entries)){ 
                            ?>
                        <option value="<?php echo $entry["tar_id"]; ?>" <?php if($entry["tar_id"]==$fixID){ echo "selected"; } ?>> <?php echo $entry["tar_title"]; ?> </option>
                    <?php } // End while ?>
                    </select>
                <?php
                }
				
				
        function display_select_eb01_approve($con, $select_id, $fixID, $disabled){
            $dataquery = get_form_eb01($con,3);	//เลือก status ที่อนุมัติแล้ว
            ?> 
                <select  name ="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true"  OnChange="returnSelect(this.value);" <?php if($disabled!=$null){ echo "disabled"; } ?> required>
                    <option value=""> -- กรุณาเลือก --</option>
                        <?php while($ins = mysqli_fetch_array($dataquery)){ 
								
                                $uni = $ins["ins_name_th"]; 
                                if($ins["ins_campus"] != '-'){
                                    $uni = $uni." ".$ins["ins_campus"];
                                }
								
								
								//รหัสหลักสูตร
                                $text = " [รหัส: ".$ins["eb01_course_id"]."] ";
								
                                $text = $text.$ins["eb01_title"]; 
								
                        ?>
                    <option value="<?php echo $ins["eb01_id"]."|".$uni; ?>" <?php if($ins["eb01_id"]==$fixID){ echo "selected"; } ?> > <?php echo $text; ?> </option>
                <?php } // End while ?>
                </select>
            <?php
            }
				
        function display_select_eb02_approve($con, $select_id, $fixID, $disabled){
            //$dataquery = get_form_eb02($con,3);	//เลือก status ที่อนุมัติแล้ว
			$sql = "
			SELECT  * , eec_form_eb02.eb02_id AS 'eb02id'
			FROM `eec_form_eb02` 
			NATURAL JOIN `eec_form_eb01`
			LEFT JOIN `eec_training_institute` ON eec_form_eb01.tins_id = eec_training_institute.tins_id
			LEFT JOIN `eec_institute` ON eec_training_institute.ins_id = eec_institute.ins_id
			LEFT JOIN `eec_form_eb03` ON eec_form_eb03.eb02_id = eec_form_eb02.eb02_id
			WHERE `eb02_status` = 3"; 
			
			if($fixID == NULL){ $sql = $sql." AND `eb03_status` IS NULL"; }	//EB02 relate EB03 1-to-1 จึงต้องว่างถึงจะเห็น

			$dataquery = mysqli_query($con, $sql);
			
            ?> 
                <select  name ="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true"  OnChange="returnSelect(this.value);" <?php if($disabled!=$null){ echo "disabled"; } ?> required>
                    <option value=""> -- กรุณาเลือก --</option>
                        <?php while($ins = mysqli_fetch_array($dataquery)){ 
								
                                $uni = $ins["ins_name_th"]; 
                                if($ins["ins_campus"] != '-'){
                                    $uni = $uni." ".$ins["ins_campus"];
                                }
								
								
								//รหัสหลักสูตร
                                $text = " [รหัส: ".$ins["eb01_course_id"]."] ";
								
                                $text = $text.$ins["eb01_title"]; 
								
                        ?>
                    <option value="<?php echo $ins["eb02id"]."|".$uni."|".$ins["eb01_title"]; ?>" <?php if($ins["eb02_id"]==$fixID && $ins["eb03_status"] != NULL ){ echo "selected"; } ?> > <?php echo $text; ?> </option>
                <?php } // End while ?>
                </select>
            <?php
            }
				
        function display_select_eb03_approve($con, $select_id, $fixID, $disabled){
            //$dataquery = get_form_eb02($con,3);	//เลือก status ที่อนุมัติแล้ว
			$sql = "
			SELECT  * FROM `eec_form_eb02` 
			NATURAL JOIN `eec_form_eb01`
			LEFT JOIN `eec_training_institute` ON eec_form_eb01.tins_id = eec_training_institute.tins_id
			LEFT JOIN `eec_institute` ON eec_training_institute.ins_id = eec_institute.ins_id
			LEFT JOIN `eec_form_eb03` ON eec_form_eb03.eb02_id = eec_form_eb02.eb02_id
			WHERE `eb03_status` = 3"; 
			
			$dataquery = mysqli_query($con, $sql);
			
            ?> 
                <select  name ="<?php echo $select_id; ?>" id="<?php echo $select_id; ?>" class="form-control selectpicker" data-live-search="true"  OnChange="returnSelect(this.value);" <?php if($disabled!=$null){ echo "disabled"; } ?> required>
                    <option value=""> -- กรุณาเลือก --</option>
                        <?php while($ins = mysqli_fetch_array($dataquery)){ 
								
                                $uni = $ins["ins_name_th"]; 
                                if($ins["ins_campus"] != '-'){
                                    $uni = $uni." ".$ins["ins_campus"];
                                }
								
								
								//รหัสหลักสูตร
                                $text = " [รหัส: ".$ins["eb01_course_id"]."] ";
								
                                $text = $text.$ins["eb01_title"]; 
								
                        ?>
                    <option value="<?php echo $ins["eb03_id"]."|".$uni."|".$ins["eb01_title"]."|".$ins["train_date_start"]."|".$ins["train_date_end"]; ?>" <?php if($ins["eb03_id"]==$fixID ){ echo "selected"; } ?> > <?php echo $text; ?> </option>
                <?php } // End while ?>
                </select>
            <?php
            }
				
				

                function get_form_status($status){
                    $res = array();
                    switch ($status){
                        case 1:
                            array_push($res, "รอพิจารณา", "#ffd740", "warning", "fa fa-exclamation");
                            break;
                        case 2:
                            array_push($res, "รอแก้ไข", "#ef5350", "danger", "fa fa-close");
                            break; 
                        case 3:
                            array_push($res, "อนุมัติ", "#33b86c", "success", "fa fa-check");
                            break;
                        default:
                            array_push($res, "บันทึกแล้ว", "#29b6f6", "info", "fa fa-envelope-o"); 
                    }
                    return $res; 
                }
                function display_form_status($con,$status,$type){
					
					$sql = "SELECT  * FROM `eec_form_eb01` WHERE `eb01_status` = $status"; 
					$entries = mysqli_query($con, $sql);
					$rowcount=mysqli_num_rows($entries);
					
                    $res = get_form_status($status); 
                    if($type == 1){

                    ?> 
                         <div class="row">
                            <div class="col-md-12" style="background-color:<?php echo $res[1]; ?>;text-align:center;color:white;">
                                <span>
                                    <i class="<?php echo $res[3]; ?>"></i>
                                </span>
                                <label><?php echo $res[0];  ?></label>
                            </div>
                        </div>
                    <?php 
                    }
                    else if($type == 2) {
                        ?> 
                         
                            <div class="col-md-4">
                                <div class="status-card">
                                    <span class="status-card__icon status-card__icon--<?php echo $res[2]; ?>">
                                    <i class="<?php echo $res[3]; ?>"></i>
                                    </span>
                                    <div class="status-card__content">
                                        <div class="title"><?php echo $res[0]; ?></div>
                                        <div class="number"><?php echo $rowcount; ?><br></div>
                                        <div class="description"></div>
                                    </div>
                                </div>
                            </div>
                       
                    <?php 
                    }// End if 
                }
                function get_user_status($sta){
                    $status = ""; 
                    if($sta == 1){ $status = "ผู้ดูแลระบบ"; }
                    else if($sta == 2){ $status = "EEC-HDC"; }
                    else if($sta == 3){ $status = "ผู้ประสานงานสถาบัน"; }
                    else if($sta == 4){ $status = "ผู้ประสานงานศูนย์อบรม"; }
                    else if($sta == 5){ $status = "ผู้ใช้งานทั่วไป"; }
                    return $status; 

                }
  
?> 