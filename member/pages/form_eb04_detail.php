<?php
		$fid = $_GET["fid"]; 
		$readonly = ""; 
		$data = ""; 
		$flag = false;
		if(isset($fid) || !empty($fid)){
		   
			$data = get_form_eb04_detail($con, $fid);
			if($data["eb04_status"] != 2){
				$readonly = "readonly";
				$disabled = "disabled";
				$flag = true;
			}
		}
		
 ?> 
 
 
                <div class="row page-titles">
                    <div class="col-md-6 align-self-center">
                        <h1 class="text-themecolor">เอกสารรับรองจากสถานประกอบการฯ (EB-04)</h1>
                    </div>
                    
                </div>

                <!-- Row -->
                <div class="row">
                   
             
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-header bg-info">
                                <div class="row">
                                    <div class="col-md-12 align-center text-white">
                                        <h2>เอกสารรับรองจากสถานประกอบการที่เข้ารับการอบรมระยะสั้นตามแนวทางอีอีซีโมเดล</h2>
                                    </div>
                                </div>
                            </div>
                            <br>



                    <div class="card-body">
                           <form method="POST" action="./php/action-update-eb04.php" id="myForm"  enctype="multipart/form-data" novalidate="">
								<!-- script AJAX เปลี่ยนข้อความ input เมื่อเลือก dropdown -->
								<script language="JavaScript">
								function returnSelect(strCut)
								{
										myForm.eb03_id.value = strCut.split("|")[0];	//แยกข้อมูลที่เรียกมาด้วย | แล้วส่งกลับไปที่ id input
										myForm.eb01_ins_name.value = strCut.split("|")[1];
										myForm.eb01_title.value = strCut.split("|")[2];
										myForm.eb03_date_start.value = strCut.split("|")[3];
										myForm.eb03_date_end.value = strCut.split("|")[4];
								}
							</script>
                                  
                             
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b>บริษัท</b><label style="color:red;">*</label></label>
                                        <input type="text" name="comp_name" id="comp_name" value="<?php echo $data["comp_name"]; ?>" class="form-control" <?php echo $readonly; ?> required>
                                        
                                    </div>
                                 
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-6">
                                        <label><b>ขอรับรองว่า ได้ส่งบุคลากรในสังกัดเข้ารับการอบรมระยะสั้น ตามแนวทางอีอีซีโมเดล </br>ในหลักสูตร </b><label style="color:red;">*</label></label>
                                        <?php display_select_eb03_approve($con, "eb03_id_select", $data["eb03_id"], $disabled); ?> 							
									  <input name="eb03_id" type="hidden" value="<?php echo $data["eb03_id"]; ?>"> <!-- ซ่อนค่ารหัส eb03_id ส่งค่าเพื่อบันทึก-->
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> ชื่อหลักสูตร </b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_title" id="eb01_title" value="<?php echo $data["eb01_title"]; ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> จัดโดยสถานศึกษาชื่อ</b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_ins_name" id="eb01_ins_name" value="<?php echo get_institute_name($con, $data["tins_id"]); ?>" class="form-control" disabled>
                                    </div>
                                </div>
                                <br>								

                                <div class="row">
                                    <div class="col-md-2">
                                        <label><b>ระหว่างวันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="eb03_date_start" name="eb03_date_start" value="<?php echo $data["train_date_start"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>ถึง </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="eb03_date_end" name="eb03_date_end" value="<?php echo $data["train_date_end"]; ?>" disabled>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b> มีจำนวนผู้เข้ารับการอบรมรวม</b><label style="color:red;">*</label></label>
                                        <input type="number" name="comp_trainee" id="comp_trainee" value="<?php echo $data["comp_trainee"]; ?>" class="form-control" <?php echo $readonly; ?> required>
                                    </div>
                                </div>
                                <br>
								
							

<!-- Fileuploader script ---------------------------------- -->
<script type="text/javascript">
$(document).ready(function() {						
	// enable fileuploader plugin
	$('input[name="fileupload"]').fileuploader({
		addMore: false,		//true , false
		limit: 1 ,						// if null - has no limits
		maxSize: 10,				//ขนาดต่อไฟล์ MB
		fileMaxSize: 20,		//ขนาดไฟล์รวม MB
		extensions: null		// example: ['jpg', pdf', 'text/plain', 'audio/*']
	});
	
});
</script>
<!-- Fileuploader script ---------------------------------- -->
								
								

                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b>รายชื่อ(แนบไฟล์)</b><label style="color:red;">*</label></label>
                                    </div>                                    
                                </div>

							 <?php if($readonly==null){ //ถ้า edit ไม่ต้องแสดงให้ upload ?>
							 
                                <div class="form-group row">
                                    <div class="col-md-6">
                                            <input type="file" id="myFile" name="fileupload" >                    
											<input type="hidden" name="fileupload_ori" value="<?php echo $data["eb04_fileupload"]; ?>">             											
                                    </div>                                    
                                </div>
							 
							<?php 
								} //ถ้า edit ไม่ต้องแสดงให้ upload 
							?>	
							 
                                <div class="row">
                                    <div class="col-md-6">
                                            <a href="././php/uploads/<?php echo $data["eb04_fileupload"]; ?>" target="_blank"><?php echo $data["eb04_fileupload"]; ?></a>          
                                    </div>                                    
                                </div>
                                <br>							 
								
								
                                 <input type="hidden" name="fid" value="<?php echo $fid; ?>">               
								
                                <?php 
                                    if($_SESSION["type"] != 1 || $_SESSION["type"] != 2 ){
										if($flag==false){ 
								?>								
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-lg btn-primary" id="btnSubmit">ส่งเอกสารรับรองจากสถานประกอบการ</button>
                                    </div>         
                                </div>
                                <?php 
										} 
                                    }// End if 
                                ?> 
                            </form>					
								
								
                                <?php                                   
                                    if($_SESSION["type"] == 2 || $_SESSION["type"] == 1 ){
										if($flag==true){ 
                                ?> 
								
								<form  method="POST" action="./php/action-approve-form-eb04.php" id="appForm" novalidate=""  >
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">	
												<label><b> ผลการพิจารณา</b><label style="color:red;">*</label></label>
												<input type="hidden" name="fid" value="<?php echo $fid; ?>">
												<select name="app" id="app" class="form-control" required>
													<option value="">-- กรุณาเลือก -- </option>
													<option value="3">อนุมัติ</option>
													<option value="2">แก้ไข</option> 
												</select>
											</div> 
										</div>   
									</div>
									<button type="submit" class="btn btn-lg btn-info"  id="btnApp"> ยืนยันผลการพิจารณา </button>		
								</form>	
										
								<br>

								<?php 
										}
                                    }
                                ?>
									 
							 </div>                        
						</div>
					</div>
                </div>
				
				
				
				
<!-- Bootstrap form validation-->
<script type="text/javascript">
$(function(){
    var checkbox_required = false;
    $(":checkbox.required").on("click",function(){
        var is_checked = $(this).prop("checked");
        if(is_checked){
            $(":checkbox.required").prop('required',false);
            checkbox_required = true;
        }else{
            if($(":checkbox.required:checked").length==0){
                checkbox_required = false;
                $(":checkbox.required").prop('required',true);
            }
        }
         
    });
	
	$("#btnSubmit").click(function(event) {
		// Fetch form to apply custom Bootstrap validation
		var form = $("#myForm")
		if (form[0].checkValidity() === false ) {
		  event.preventDefault()
		  event.stopPropagation()
		}    
		form.addClass('was-validated');
		// Perform ajax submit here...    	
	});	
	$("#btnApp").click(function(event) {
		// Fetch form to apply custom Bootstrap validation
		var form2 = $("#appForm")
		if (form2[0].checkValidity() === false) {
		  event.preventDefault()
		  event.stopPropagation()
		}    
		form2.addClass('was-validated');
		// Perform ajax submit here...    
	});

	
	/*
     $("#eb02").on("submit",function(){
         var form = $(this)[0];
        if (form.checkValidity() === false || checkbox_required===false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');         
     });
	 */
	 
});
</script>
    