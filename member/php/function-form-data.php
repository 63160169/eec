<?php      
      function create_form_select_test($con,$eb01_id_2 ,$course_id,$title ,$ins_name){
        $sql  = "INSERT INTO `select_test`( `eb01_id_2`,`course_id`, `title`, `ins_name`) VALUES ('$course_id','$title' ,'$ins_name')"; 
        $query = mysqli_query($con, $sql); 
      //   echo $sql;
        if($query){
            return true;
        }
        else{
            return false;
        }
     }
     function create_form_eb01($con, $title,$institute ,$target_industry,$per_total ,$per_gen, $gen,$train_schedule ,$train_period ,$budget_per_gen,$budget_total ,$target ,$intro ,$outcome ,$impact,$detail, $holder,$status,$rec_user){
        $sql  = "INSERT INTO `eec_form_eb01`( `eb01_title`, `tins_id`, `eb01_target`, `eb01_trainee_total`, `eb01_trainee_per_gen`, `eb01_trainee_gen`, `eb01_schedule`, `eb01_period`, `eb01_budget_per_gen`, `eb01_budget`, `eb01_target_trainee`, `eb01_intro`, `eb01_outcome`, `eb01_impact`, `eb01_detail`, `eb01_status`, `priv_id`, `rec_user`) VALUES ('$title','$institute' ,'$target_industry','$per_total' ,'$per_gen', '$gen','$train_schedule' ,'$train_period' ,'$budget_per_gen','$budget_total' ,'$target' ,'$intro' ,'$outcome' ,'$impact','$detail', '$status', '$holder', '$rec_user')"; 
        $query = mysqli_query($con, $sql); 
      //   echo $sql;
        if($query){
            return true;
        }
        else{
            return false;
        }
     }
     function get_form_eb01($con, $status){
        $sql = "SELECT  * FROM `eec_form_eb01` NATURAL JOIN `eec_training_institute` NATURAL JOIN `eec_institute`  WHERE `eb01_status` = $status"; 
        $entries = mysqli_query($con, $sql);
        return $entries;
     }
     function get_form_eb01_detail($con, $fid){
        //$sql = "SELECT  * FROM `eec_form_eb01` NATURAL JOIN `eec_training_institute` NATURAL JOIN `eec_institute` NATURAL JOIN `eec_user`  WHERE `eb01_id` = $fid"; 
        $sql = "
		SELECT  * FROM `eec_form_eb01` 
		LEFT JOIN `eec_training_institute` ON eec_form_eb01.tins_id = eec_training_institute.tins_id
		WHERE `eb01_id` = $fid"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;
     }
     function update_form_eb01($con, $fid, $title,$institute ,$target_industry,$per_total ,$per_gen, $gen,$train_schedule ,$train_period ,$budget_per_gen,$budget_total ,$target ,$intro ,$outcome ,$impact, $detail, $holder,$status){
		 
      $sql = "UPDATE `eec_form_eb01` SET 
	 `eb01_title` = '$title',
	 `tins_id` = '$institute',
	 `eb01_target` = '$target_industry',
	 `eb01_trainee_total` = '$per_total' ,
	 `eb01_trainee_per_gen` = '$per_gen', 
	 `eb01_trainee_gen` = '$gen',
	 `eb01_schedule` = '$train_schedule' ,
	 `eb01_period` = '$train_period' ,
	 `eb01_budget_per_gen` = '$budget_per_gen',
	 `eb01_budget` = '$budget_total' ,
	 `eb01_target_trainee` = '$target' ,
	 `eb01_intro` = '$intro' ,
	 `eb01_outcome` = '$outcome' ,
	 `eb01_impact` =  '$impact', 
	 `eb01_detail` =  '$detail', 
	 `priv_id` = '$holder',	 
	  eb01_status = '$status' 	  
	  WHERE eb01_id = '$fid' "; 
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   
     function update_form_eb01_status($con, $fid, $status){
      $sql = "UPDATE `eec_form_eb01` SET eb01_status = '$status' WHERE eb01_id = $fid"; 
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   
   
   function get_form_eb01_all($con){
      $sql = "SELECT  * FROM `eec_form_eb01` NATURAL JOIN `eec_training_institute` NATURAL JOIN `eec_institute`  WHERE 1";
      $entries = mysqli_query($con, $sql);
      return $entries;
   }
   function get_form_eb01_all2($con){
      $sql2 = "SELECT  * FROM `select_test` WHERE 1";
      $entries3 = mysqli_query($con, $sql2);
      return $entries3;
   }
   function get_form_eb01_count($con, $status){
      $sql = "SELECT  * FROM `eec_form_eb01` NATURAL JOIN `eec_training_institute` NATURAL JOIN `eec_institute`  WHERE eb01_status = $status";
      $entries = mysqli_query($con, $sql);
      $res = mysqli_num_rows($entries);
      return $res;
   }
   function generate_course_id($con, $fid){
      $sql1 = "SELECT * FROM eec_form_eb01 NATURAL JOIN eec_training_institute WHERE eb01_id = $fid"; 
      $entry1 = mysqli_query($con, $sql1); 
      $row1 = mysqli_fetch_array($entry1);
      $sql2 = "SELECT * FROM eec_course_order WHERE 1"; 
      $entry2 = mysqli_query($con, $sql2);
      $row2 = mysqli_fetch_array($entry2);
      $t = time();
      $fyear = date("Y",$t) + 543; 
      $year = substr($fyear, 2,2); 
      $num = "0".$row2["ord_num"];
      $course_id = $year."-".$num."-".$row1["eb01_target"]."-".$row1["priv_id"]."-".$row1["tins_number"];
      $new_num = $row2["ord_num"] + 1;
      $uSql = "UPDATE eec_course_order SET ord_num = $new_num"; 
      mysqli_query($con, $uSql); 
      $uSql2 = "UPDATE eec_form_eb01 SET eb01_course_id = '$course_id' WHERE eb01_id = $fid"; 
      mysqli_query($con, $uSql2);
      return $course_id;

   }
     
	 
	 /*----------------------------------------------------*/
	 
	 
     function create_form_eb02($con , $eb01_id , $trainee_comp , $trainee_date , $trainee_num , $budget1 , $budget2 , $budget3 , $budget4 ,$budget5 , $budget6 , $budget_sum , $budget_eec , $sign_name , $sign_pos , $sign_date , $eb02_status , $rec_user){
        $sql  = "
		INSERT INTO `eec_form_eb02` 
		( `eb01_id`, `trainee_comp`, `trainee_date`, `trainee_num`, `budget1`, `budget2`, `budget3`, `budget4`, `budget5`, `budget6`, `budget_sum`, `budget_eec`, `sign_name`, `sign_pos`, `sign_date`, `eb02_status`, `rec_user`) 
		VALUES 
		('$eb01_id' , '$trainee_comp' , '$trainee_date' , '$trainee_num' , '$budget1' , '$budget2' , '$budget3' , '$budget4' , '$budget5' , '$budget6' , '$budget_sum' , '$budget_eec' , '$sign_name' , '$sign_pos' , '$sign_date', '$eb02_status', '$rec_user')"; 
		
        $query = mysqli_query($con, $sql); 
        echo $sql;
        if($query){
            return true;
        }
        else{
            return false;
        }
     }	 
	 
     function get_form_eb02($con, $status){
        $sql = "
		SELECT  * FROM `eec_form_eb02` 
		 NATURAL JOIN `eec_form_eb01`
		LEFT JOIN `eec_training_institute` ON eec_form_eb01.tins_id = eec_training_institute.tins_id
		LEFT JOIN `eec_institute` ON eec_training_institute.ins_id = eec_institute.ins_id"; 
		// echo $sql;
		if($status!=null){ $sql=$sql." WHERE `eb02_status` = $status"; }
        $entries = mysqli_query($con, $sql);
        return $entries;
     }	 
	 
     function get_form_eb02_detail($con, $fid){
        $sql = "SELECT  * FROM `eec_form_eb02` 
		NATURAL JOIN `eec_form_eb01`  
		WHERE `eb02_id` = $fid"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;
	 }
	 
     function update_form_eb02($con , $fid , $eb01_id , $trainee_comp , $trainee_date , $trainee_num , $budget1 , $budget2 , $budget3 , $budget4 ,$budget5 , $budget6 , $budget_sum , $budget_eec , $sign_name , $sign_pos , $sign_date , $eb02_status){		 
      $sql = "
	  UPDATE `eec_form_eb02` SET 
	  
	  eb01_id = '$eb01_id' ,
	  trainee_comp = '$trainee_comp' ,
	  trainee_date = '$trainee_date' ,
	  trainee_num = '$trainee_num' ,
	  budget1 = '$budget1' ,
	  budget2 = '$budget2' ,
	  budget3 = '$budget3' ,
	  budget4 = '$budget4' ,
	  budget5 = '$budget5' ,
	  budget6 = '$budget6' ,
	  budget_sum = '$budget_sum' ,
	  budget_eec = '$budget_eec' ,
	  sign_name = '$sign_name' ,
	  sign_pos = '$sign_pos' ,
	  sign_date = '$sign_date' , 
	  eb02_status = '$eb02_status', 	  
	  WHERE eb02_id = $fid"; 
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   
	 
     function update_form_eb02_status($con, $fid, $status){
      $key = generateRandomString(6);
      $sql = "UPDATE `eec_form_eb02` SET eb02_status = '$status', eb02_enroll_key = '$key' WHERE eb02_id = $fid"; 
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   


	 /*----------------------------------------------------*/

	 
     function get_form_eb03($con, $status){
        $sql = "
		SELECT  * FROM `eec_form_eb03` 
        LEFT JOIN `eec_form_eb02` ON eec_form_eb03.eb02_id = eec_form_eb02.eb02_id
		LEFT JOIN `eec_form_eb01` ON eec_form_eb02.eb01_id = eec_form_eb01.eb01_id"; 
		if($status!=null){ $sql=$sql." WHERE `eb03_status` = $status"; }
        $entries = mysqli_query($con, $sql);
        return $entries;
     }	 
	 
     function get_form_eb03_detail($con, $fid){
        $sql = "SELECT  * FROM `eec_form_eb03` 
		NATURAL JOIN `eec_form_eb02`  
		NATURAL JOIN `eec_form_eb01`  
		WHERE `eb03_id` = $fid"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;
	 }

     function create_form_eb03($con , $eb02_id , $province_id , $contact_name , $contact_surname , $contact_agency , $contact_email , $contact_phone , $train_institute_1 , $train_institute_2 ,$train_date_start , $train_date_end , $train_days , $train_hours , $train_trainee , $train_lecturer , $expenses_total, $expenses_regis, $expenses_regis_perc, $expenses_eec, $expenses_eec_perc, $expenses_support, $expenses_support_text, $payee_name, $payee_address, $payee_tex, $payee_bookbank, $payee_bookbank_id, $payee_bookbank_bank, $payee_bookbank_branch, $eb03_fileupload, $eb03_status, $rec_user){
        $sql  = "
		INSERT INTO `eec_form_eb03` 
		( `eb02_id`, `province_id`, `contact_name`, `contact_surname`, `contact_agency`, `contact_email`, `contact_phone`, `train_institute_1`, `train_institute_2`, `train_date_start`, `train_date_end`, `train_days`, `train_hours`, `train_trainee`, `train_lecturer`, `expenses_total`, `expenses_regis`, `expenses_regis_perc`, `expenses_eec`, `expenses_eec_perc`, `expenses_support`, `expenses_support_text`, `payee_name`, `payee_address`, `payee_tex`, `payee_bookbank`, `payee_bookbank_id`, `payee_bookbank_bank`, `payee_bookbank_branch`, `eb03_fileupload`, `eb03_status`, `rec_user`) 
		VALUES 
		('$eb02_id' , '$province_id' , '$contact_name' , '$contact_surname' , '$contact_agency' , '$contact_email' , '$contact_phone' , '$train_institute_1' , '$train_institute_2' , '$train_date_start' , '$train_date_end' , '$train_days' , '$train_hours' , '$train_trainee' , '$train_lecturer', '$expenses_total', '$expenses_regis', '$expenses_regis_perc', '$expenses_eec', '$expenses_eec_perc', '$expenses_support', '$expenses_support_text', '$payee_name', '$payee_address', '$payee_tex', '$payee_bookbank', '$payee_bookbank_id', '$payee_bookbank_bank', '$payee_bookbank_branch', '$eb03_fileupload', '$eb03_status', '$rec_user')"; 
		
        $query = mysqli_query($con, $sql); 
      //   echo $sql;
        if($query){
            return true;
        }
        else{
            return false;
        }
     }	 

     function update_form_eb03($con , $fid, $eb02_id , $province_id , $contact_name , $contact_surname , $contact_agency , $contact_email , $contact_phone , $train_institute_1 , $train_institute_2 ,$train_date_start , $train_date_end , $train_days , $train_hours , $train_trainee , $train_lecturer , $expenses_total, $expenses_regis, $expenses_regis_perc, $expenses_eec, $expenses_eec_perc, $expenses_support, $expenses_support_text, $payee_name, $payee_address, $payee_tex, $payee_bookbank, $payee_bookbank_id, $payee_bookbank_bank, $payee_bookbank_branch,  $eb03_fileupload, $eb03_status){		 
      
	  echo $sql = "
	  UPDATE `eec_form_eb03` SET 
	  
	  eb02_id = '$eb02_id' ,
	  province_id = '$province_id' ,
	  contact_name = '$contact_name' ,
	  contact_surname = '$contact_surname' ,
	  contact_agency = '$contact_agency' ,
	  contact_email = '$contact_email' ,
	  contact_phone = '$contact_phone' ,
	  train_institute_1 = '$train_institute_1' ,
	  train_institute_2 = '$train_institute_2' ,
	  train_date_start = '$train_date_start' ,
	  train_date_end = '$train_date_end' ,
	  train_days = '$train_days' ,
	  train_hours = '$train_hours' ,
	  train_trainee = '$train_trainee' ,
	  train_lecturer = '$train_lecturer' , 
	  expenses_total = '$expenses_total' , 
	  expenses_regis = '$expenses_regis' , 
	  expenses_regis_perc = '$expenses_regis_perc' , 
	  expenses_eec = '$expenses_eec' , 
	  expenses_eec_perc = '$expenses_eec_perc' , 
	  expenses_support = '$expenses_support' , 
	  expenses_support_text = '$expenses_support_text' , 
	  payee_name = '$payee_name' , 
	  payee_address = '$payee_address' , 
	  payee_tex = '$payee_tex' , 
	  payee_bookbank = '$payee_bookbank' , 
	  payee_bookbank_id = '$payee_bookbank_id' , 
	  payee_bookbank_bank = '$payee_bookbank_bank' , 
	  payee_bookbank_branch = '$payee_bookbank_branch' , 	  
	  eb03_fileupload = '$eb03_fileupload' ,	  	  
	  eb03_status = '$eb03_status' 	  	  
	  WHERE eb03_id = '$fid' "; 
	  
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   
	 
     function update_form_eb03_status($con, $fid, $status){
      $sql = "UPDATE `eec_form_eb03` SET eb03_status = '$status' WHERE eb03_id = $fid"; 
      // echo $sql;
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   


	 /*----------------------------------------------------*/
	 
		 
     function get_form_eb04($con, $status){
        $sql = "
		SELECT  * FROM `eec_form_eb04` 
        LEFT JOIN `eec_form_eb03` ON eec_form_eb04.eb03_id = eec_form_eb03.eb03_id
        LEFT JOIN `eec_form_eb02` ON eec_form_eb03.eb02_id = eec_form_eb02.eb02_id
		LEFT JOIN `eec_form_eb01` ON eec_form_eb02.eb01_id = eec_form_eb01.eb01_id"; 
		
		if($status!=null){ $sql=$sql." WHERE `eb04_status` = $status"; }
        $entries = mysqli_query($con, $sql);
        return $entries;
     }	 
	 
     function get_form_eb04_detail($con, $fid){
        $sql = "SELECT  * FROM `eec_form_eb04` 
        LEFT JOIN `eec_form_eb03` ON eec_form_eb04.eb03_id = eec_form_eb03.eb03_id
        LEFT JOIN `eec_form_eb02` ON eec_form_eb03.eb02_id = eec_form_eb02.eb02_id
		LEFT JOIN `eec_form_eb01` ON eec_form_eb02.eb01_id = eec_form_eb01.eb01_id
		WHERE `eb04_id` = $fid"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;
	 }


     function create_form_eb04($con , $eb03_id , $comp_name , $comp_trainee , $eb04_fileupload, $eb04_status, $rec_user){
        $sql  = "
		INSERT INTO `eec_form_eb04` 
		( `eb03_id`, `comp_name`, `comp_trainee`, `eb04_fileupload`, `eb04_status`, `rec_user`) 
		VALUES 
		('$eb03_id' , '$comp_name' , '$comp_trainee' , '$eb04_fileupload' , '$eb04_status' , '$rec_user')"; 
		
        $query = mysqli_query($con, $sql); 
      //   echo $sql;
        if($query){
            return true;
        }
        else{
            return false;
        }
     }	 	 
	 
	 
     function update_form_eb04($con , $fid , $eb03_id , $comp_name , $comp_trainee , $eb04_fileupload , $eb04_status){		 
      $sql = "
	  UPDATE `eec_form_eb04` SET 
	  
	  eb03_id = '$eb03_id' ,
	  comp_name = '$comp_name' ,
	  comp_trainee = '$comp_trainee' ,
	  eb04_fileupload = '$eb04_fileupload' ,
	  eb04_status = '$eb04_status' 	  
	  WHERE eb04_id = $fid"; 
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   
	 
     function update_form_eb04_status($con, $fid, $status){
      $sql = "UPDATE `eec_form_eb04` SET eb04_status = '$status' WHERE eb04_id = $fid"; 
      $query = mysqli_query($con, $sql);
      if($query){
         return true;
      }
      else{
         return false;
      }      
   }   

	 
	 
	 
	 
	 

?> 