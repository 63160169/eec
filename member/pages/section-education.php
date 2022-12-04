<?php
    $edu = get_user_education($con, $user["user_id"]);
?> 
<style type="text/css">
        ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
    </style>

    <div class="row">
		<div class="col-md-6 offset-md-3">
		<BR>
			<ul class="timeline">
            <?php
                while($row = mysqli_fetch_array($edu)){ 
            ?> 
				<li>
					<?php 
                        echo $row["edu_grad"]."<br>"; 
                    ?> 
                    <button class="btn btn-danger float-right" onclick="confirm_redirect('./php/action-remove-education.php?eid=<?php echo $row['edu_id']; ?>', 'ยืนยันการลบประวัติการศึกษา')">ลบ</button>
                    <button class="btn btn-warning float-right" data-toggle="modal" data-target="#update_education_data<?php echo $row['edu_id']; ?>">แก้ไข</button>
                    
                    <?php 
                        echo $row["deg_title"]."<br>"; 
                        echo $row["ins_name_th"]."<br>";
                    ?> 
					
					<p>
                    <?php 
                         echo "คณะ".$row["edu_faculty"]." สาขา".$row["edu_major"];
                        
                    ?> 
                    </p>
				</li>
			<?php 
                include ("./pages/modal-update-education.php");
                }
            ?> 
				
			</ul>
		</div>
	</div>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_education_data">
        เพิ่มข้อมูลการศึกษา
    </button>
    <?php include ("./pages/modal-add-education.php"); ?>
   