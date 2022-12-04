<?php 
    function create_user($con, $username, $pid, $password, $id, $type){
        $time = time();
        $nPass = md5($password);  
        $sql = "INSERT INTO eec_user(`user_id`,`user_username`, `user_pass`, `user_time`, `user_status`, `type_id`, `user_id_card`) VALUES('$id', '$username', '$nPass', '$time', '0',  $type,'$pid')";
        echo $sql;
        $query = mysqli_query($con, $sql); 
        if($query){
            return true;
        }
        else{
            return false; 
        } 
    }
    function create_user_proxy($con, $username, $id, $type){
        $time = time();
        $sql = "INSERT INTO eec_user(`user_id`,`user_username`, `user_time`, `user_status`, `type_id`) VALUES('$id', '$username', '$time', '0',  $type)";
        echo $sql;
        $query = mysqli_query($con, $sql); 
        if($query){
            return true;
        }
        else{
            return false; 
        } 
    }
    function create_user_proxy_from_file($con, $username, $id, $name, $surname, $work, $nid, $type){
        $time = time();
        $sql = "INSERT INTO eec_user(`user_id`,`user_username`, `user_time`, `user_status`, `type_id`, `user_firstname`, `user_lastname`, `user_workplace`, `user_id_card`) VALUES ('$id', '$username', '$time', '0',  $type, '$name', '$surname', '$work', '$nid')";
        echo $sql;
        $query = mysqli_query($con, $sql); 
        if($query){
            return true;
        }
        else{
            return false; 
        } 
    }
    function create_coordinator($con, $username, $name, $lastname, $id, $type){
        $time = time();
        $sql = "INSERT INTO eec_user(`user_id`,`user_username`, `user_firstname`, `user_lastname`, `user_time`, `user_status`, `type_id`) VALUES('$id', '$username', '$name', '$lastname', '$time', '0',  $type)";
        //echo $sql; 
        $query = mysqli_query($con, $sql); 
        if($query){
            return true;
        }
        else{
            return false; 
        } 
    }
    
    function get_user($con, $username){
        $sql = "SELECT * FROM eec_user WHERE user_username = '$username'"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;   
    } 
    function get_user_by_id($con, $uid){
        $sql = "SELECT * FROM eec_user WHERE `user_id` = '$uid'"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;   
    } 
    function get_user_by_nat_id($con, $nid){
        $sql = "SELECT * FROM eec_user WHERE `user_id_card` = '$nid'"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;   
    } 
    function get_user_type($con, $type){
        $sql = "SELECT * FROM eec_user WHERE type_id = '$type'"; 
        $entries = mysqli_query($con, $sql);
        return $entries;   
    }  
    function confirm_email_user($con, $uid){
        $time = time();
        
        $sql = "UPDATE eec_user SET user_status = 1 WHERE `user_id` = '$uid'";
        
        $query = mysqli_query($con, $sql); 
        if($query){
            return true;
        }
        else{
            return false; 
        } 
    }
    function user_login($con, $user, $pass){
        $sql = "SELECT * FROM eec_user WHERE  user_id_card = '$user' AND user_pass = '$pass'"; 
        $entries = mysqli_query($con, $sql);
        $entry = mysqli_fetch_array($entries);
        return $entry;
    }
    function update_user_data($con, $uid, $prefix, $nameth, $lastnameth, $nameen, $lastnameen,  $gender,  $nationality,  $birth,  $tel , $mariage, $idcard, $address, $district, $amphoe, $province, $zipcode, $workplace, $position, $salary){
        $sql = "UPDATE `eec_user` SET `user_prefix`= '$prefix',`user_firstname`='$nameth',`user_lastname`='$lastnameth',`user_firstname_en`='$nameen',`user_lastname_en`='$lastnameen',`user_gender`='$gender',`user_nationality`='$nationality',`user_birth`='$birth',`user_tel`='$tel',`user_id_card`='$idcard',`user_mariage`='$mariage',`user_district`='$district',`user_amphoe`='$amphoe',`user_province`='$province',`user_zipcode`='$zipcode',`user_address`='$address', `user_workplace` = '$workplace', `user_position` = '$position', `user_salary` = '$salary'  WHERE `user_id`  = '$uid'"; 

        $query = mysqli_query($con, $sql);
        if($query){
            return true; 
        } 
        else{
            echo $sql;
        }
       
    }
    function get_user_exp($con, $uid){
        $sql = "SELECT * FROM eec_user_work_exp WHERE `user_id` = '$uid'"; 
        $entries = mysqli_query($con, $sql);
        return $entries;
    }
    function  add_user_exp($con, $uid, $job, $workplace, $salary, $date){
        $sql = "INSERT INTO `eec_user_work_exp`( `user_id`, `exp_title`, `exp_place`, `exp_salary`, `exp_year`) VALUES ('$uid', '$job', '$workplace', '$salary', '$date')"; 
        $query = mysqli_query($con, $sql);
        if($query){
            return true;
        }
        else{
            echo $sql;
        }
    }
    function update_user_pictre($con, $uid, $filename){
        $sql = "UPDATE `eec_user` SET `user_image`= '$filename' WHERE `user_id`  = '$uid'"; 

        $query = mysqli_query($con, $sql);
        if($query){
            return true; 
        } 
        else{
            echo $sql;
        }
       
    }
    
?> 