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
       <br>  
    <div class="row">
     
        <div class="col-lg-12">
            <label><b>ทักษะที่เกี่ยวข้อง</b></label>&nbsp<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_skill">เพิ่ม &nbsp<i class="fa fa-plus"></i></button>
            <br><br>
            <?php 
                $uid = $user["user_id"];
                $sql = "SELECT * FROM eec_user_skill WHERE `user_id` = '$uid'"; 
                $entries = mysqli_query($con, $sql);
                while($skill = mysqli_fetch_array($entries)){
                    ?> 
                        <button type="button" class="btn btn-danger" onclick="confirm_redirect('./php/action-remove-skill.php?sid=<?php echo $skill['sk_id']; ?>', 'ยืนยันการลบทักษะ')"><?php echo $skill["sk_title"]; ?> &nbsp<i class="fa fa-times-circle"></i></button>
                    <?php 
                }
            ?>
            <p> 

            </p>
            
        </div>
    </div>
    <br> 
    <div class="row">
     
        <div class="col-lg-12">
            <label><b>ทักษะทางด้านภาษา</b></label>&nbsp<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_language">เพิ่ม &nbsp<i class="fa fa-plus"></i></button>
            <br><br>
            <?php 
                $uid = $user["user_id"];
                $sql = "SELECT * FROM eec_user_language WHERE `user_id` = '$uid'"; 
                $entries = mysqli_query($con, $sql);
                while($skill = mysqli_fetch_array($entries)){
                    ?> 
                        <button type="button" class="btn btn-danger" onclick="confirm_redirect('./php/action-remove-language.php?lid=<?php echo $skill['lg_id']; ?>', 'ยืนยันการลบทักษะ')"><?php echo $skill["lg_title"]; ?> &nbsp<i class="fa fa-times-circle"></i></button>
                    <?php 
                }
            ?>
            <p> 

            </p>
            
        </div>
    </div>
    <br>
    <div class="row">
		<div class="col-md-6">
        <label><b>ใบประกาศณียบัตร</b></label>&nbsp<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_certificate">เพิ่ม &nbsp<i class="fa fa-plus"></i></button>
            <br>
		
			<ul class="timeline">
            <?php
                $sql = "SELECT * FROM eec_user_certificate WHERE `user_id` = '$uid' ORDER BY cer_date DESC";
                $cert = mysqli_query($con, $sql);
                while($row = mysqli_fetch_array($cert)){ 
            ?> 
				<li>
                <?php 
                        echo $row["cer_date"]."<br>"; 
                    ?> 
                    <button class="btn btn-danger float-right" onclick="confirm_redirect('./php/action-remove-certificate.php?cid=<?php echo $row['cer_id']; ?>', 'ยืนยันการลบใบประกาศณียบัตร')">ลบ</button>
                    <button class="btn btn-warning float-right" data-toggle="modal" data-target="#update_certificate<?php echo $row['cer_id']; ?>">แก้ไข</button>
                    
                    <?php 
                        echo $row["cer_title"]."<br>"; 
                        echo $row["cer_certified"]."<br>";
                    ?> 
				
				</li>
			<?php 
                include ("./pages/modal-update-certificate.php");
                }
            ?> 
				
			</ul>
		</div>
	</div>
    
    <?php include ("./pages/modal-add-skill.php"); ?>
    <?php include ("./pages/modal-add-language.php"); ?>
    <?php include ("./pages/modal-add-certifcate.php"); ?>
   