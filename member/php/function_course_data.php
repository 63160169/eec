<?php 
    function get_course_data($con){
        $sql = "SELECT * FROM `eec_training_course` WHERE 1"; 
        echo $sql;
        $entries = mysqli_query($con, $sql); 
        return $entries; 
    }
    function get_course_data_by_cid($con, $cid){
        $sql = "SELECT * FROM `eec_training_course` WHERE course_course_id = '$cid'"; 
        $entries = mysqli_query($con, $sql); 
        $entry = mysqli_fetch_array($entries);
        return $entry; 
    }
    function get_target_industry_id($con, $indus){
        $sql = "SELECT * FROM `eec_target_industry` WHERE tar_title = '$indus'"; 
        $entries = mysqli_query($con, $sql); 
        $entry = mysqli_fetch_array($entries); 
        return $entry["tar_id"];
    }
    function get_course_data_by_id($con, $id){
        $sql = "SELECT * FROM `eec_training_course` WHERE course_id = '$id'"; 
        $entries = mysqli_query($con, $sql); 
        $entry = mysqli_fetch_array($entries);
        return $entry; 
    }
    function get_general_data($con, $table, $where=1){
        $sql = "SELECT * FROM $table WHERE $where"; 
        // echo $sql;
        $entries = mysqli_query($con, $sql); 
        return $entries; 
    }
?> 