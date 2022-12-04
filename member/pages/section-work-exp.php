<?php
    $edu = get_user_exp($con, $user["user_id"]);
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
                        echo $row["exp_title"]."<br>";
                    ?> 
					<a class="float-right"><?php echo $row["exp_year"]; ?></a>
					<p>
                    <?php 
                         echo $row["exp_place"];
                        
                    ?> 
                    </p>
				</li>
			<?php 
                }
            ?> 
				
			</ul>
		</div>
	</div>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_exp_data">
        เพิ่มข้อมูลการทำงาน
    </button>
    <?php include ("./pages/modal-add-exp.php"); ?>
   