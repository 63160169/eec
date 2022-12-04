<?php 
    function create_institute($con, $ins_id, $uid, $id){
        $sql = "INSERT INTO eec_training_institute(`ins_id`, `user_id`, `tins_number`) VALUES ('$ins_id', '$uid', '$id')"; 
        echo $sql; 
        $query = mysqli_query($con, $sql);
        if($query){
            return true; 
        }
        else{
            return false; 
            echo $sql;
           
        }
    }
    function get_training_institute($con){
        $sql = "
		SELECT * FROM eec_training_institute 
		LEFT JOIN eec_institute ON eec_training_institute.ins_id = eec_institute.ins_id
		LEFT JOIN eec_user ON eec_training_institute.user_id = eec_user.user_id"; 
        $entries = mysqli_query($con, $sql); 
        return $entries;
    }
    function get_institute_by_id($con, $tins){
        $sql = "SELECT * FROM eec_training_institute NATURAL JOIN eec_institute WHERE tins_id = $tins"; 
  
        $entries = mysqli_query($con, $sql); 
        $entry = mysqli_fetch_array($entries);
        return $entry;
    }
    function get_institute_name($con, $tins){
        $sql = "SELECT * FROM eec_training_institute NATURAL JOIN eec_institute WHERE tins_id = $tins"; 
  
        $entries = mysqli_query($con, $sql); 
        $entry = mysqli_fetch_array($entries);
		
		$returnData = $entry["ins_name_th"];		
         if($entry["ins_campus"] != '-'){ $returnData = $returnData." ".$entry["ins_campus"]; }
		
        return $returnData;
    }
    function get_institute_contact($con, $tins, $type){
        $sql = "SELECT * FROM eec_training_institute NATURAL JOIN eec_user WHERE tins_id = $tins"; 
  
        $entries = mysqli_query($con, $sql); 
        $entry = mysqli_fetch_array($entries);
		
		if($type == 'nt') {
			$returnData = $entry["user_prefix"].$entry["user_firstname"]." ".$entry["user_lastname"]." / โทร.".$entry["user_tel"];	
		}
		if($type == 'n') {
			$returnData = $entry["user_prefix"].$entry["user_firstname"]." ".$entry["user_lastname"];	
		}
		if($type == 't') {
			$returnData = $entry["user_tel"];	
		}
		if($type == 'm') {
			$returnData = $entry["user_username"];	
		}
		
		
        return $returnData;
    }
    function create_center($con, $tins_id, $uid, $cen_name){
        $sql = "INSERT INTO eec_training_center(`cen_user_id`, `tins_id`, `cen_name`) VALUES ('$uid', '$tins_id', '$cen_name')"; 
        echo $sql;
        $query = mysqli_query($con, $sql);
        if($query){
            return true; 
        }
        else{
            return false; 
           
           
        }
    }
	function get_training_institute_name($con, $tins_id){
        $sql = "SELECT DISTINCT ins_name_th FROM eec_training_institute NATURAL JOIN eec_institute WHERE tins_id = $tins_id"; 
        $entries = mysqli_query($con, $sql); 
        $entry = mysqli_fetch_array(entries);  
        echo $entry["ins_name_th"];
        return $entry["ins_name_th"];
    }
	
?> 