<?php
session_start();
require ("config.php");
		$id = $_GET['id'];
		$select_status= 0;
		$sql = "SELECT  * FROM eec_form_eb01 NATURAL JOIN eec_training_institute NATURAL JOIN eec_institute  WHERE eb01_id = $id";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$eb01_id = $row['eb01_id'];
		$eb01_course_id = $row['eb01_course_id'];
		$eb01_title = $row['eb01_title'];
		$ins_name_th = $row['ins_name_th'];
		

		
		$sql2 = "UPDATE eec_form_eb01 SET select_status = $select_status WHERE eb01_id = $id";
		$result2 = mysqli_query($con, $sql2);



		if($result2){
			header("location:../?content=select_from_eb01"); 
		}




		// $course_id = $eb01_course_id;
		// $title = $eb01_title;
		// $ins_name = $ins_name_th;

	// echo $eb01_course_id ;
	// echo $eb01_title;
	// echo $ins_name_th;

?>