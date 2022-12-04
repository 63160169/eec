<?php 
    function get_degree($con){
        $sql = "SELECT * FROM eec_degree WHERE 1"; 
        $entries = mysqli_query($con, $sql); 
        return $entries;
    } 
    function get_institute($con){
        $sql = "SELECT * FROM eec_institute WHERE 1"; 
        $entries = mysqli_query($con, $sql); 
        return $entries;
    } 
    function add_user_education($con, $uid, $ins_id, $deg_id, $faculty, $major, $date){
        $sql = "INSERT INTO `eec_user_education`( `user_id`, `ins_id`, `edu_faculty`, `edu_major`, `edu_grad`, `deg_id`) VALUES ('$uid', $ins_id, '$faculty', '$major', '$date', $deg_id)"; 
        $query = mysqli_query($con, $sql);
        if($query){
            return true;
        }
        else{
            echo $sql;
            return false;
        }
    }
    function update_user_education($con, $eid, $ins_id, $deg_id, $faculty, $major, $date){
        $sql = "UPDATE `eec_user_education` SET  `ins_id`=$ins_id, `edu_faculty` = '$faculty', `edu_major`='$major', `edu_grad`='$date', `deg_id`=$deg_id WHERE edu_id = $eid"; 
        $query = mysqli_query($con, $sql);
        if($query){
            return true;
        }
        else{
            echo $sql;
            return false;
        }
    }
    function get_user_education($con, $uid){
        $sql = "SELECT * FROM eec_user_education NATURAL JOIN eec_institute NATURAL JOIN eec_degree WHERE `user_id` = '$uid' ORDER BY edu_grad DESC"; 
        $entries = mysqli_query($con, $sql); 
        return $entries;
    }
        
?> 