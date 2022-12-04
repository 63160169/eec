<?php
		$fid = $_GET["fid"]; 
		$readonly = ""; 
		$data = ""; 
		$flag = false;
		if(isset($fid) || !empty($fid)){
		   
			$data = get_form_eb02_detail($con, $fid);
			if($data["eb02_status"] != 2){
				$readonly = "readonly";
				$disabled = "disabled";
				$flag = true;
			}
		}
		
 ?> 

              
                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                        <h1 class="text-themecolor">ขอรับรองหลักสูตร (EB-02)</h1>
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
                                        <h2>แบบขออนุมัติจัดอบรมระยะสั้นตามแนวทางอีอีซีโมเดล</h2>
                                    </div>
                                </div>
                            </div>



                    <div class="card-body">
                           <form method="POST" action="./php/action-update-eb02.php" id="eb02" >
								<!-- script AJAX เปลี่ยนข้อความ input เมื่อเลือก dropdown -->
								<script language="JavaScript">
								function returnSelect(strCut)
								{
										eb02.eb01_id.value = strCut.split("|")[0];	//แยกข้อมูลที่เรียกมาด้วย | แล้วส่งกลับไปที่ id input
										eb02.eb01_ins_name.value = strCut.split("|")[1];
								}
							</script>
							
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>			
                                        <?php display_select_eb01_approve($con, "eb01_id_select", $data["eb01_id"] , $disabled); ?> 							
									  <input name="eb01_id" type="hidden" value="<?php echo $data["eb01_id"]; ?>"> <!-- ซ่อนค่ารหัส eb01_id ส่งค่าเพื่อบันทึก-->
                                    </div>
                                </div>

                                <br>
								
								
                                <div class="row">
									<div class="col-md-12">
                                        <label><b> สถานศึกษาผู้รับผิดชอบหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_ins_name" id="eb01_ins_name" value="<?php echo get_institute_name($con, $data["tins_id"]); ?>" class="form-control" disabled > <!-- แสดงค่าที่เปลี่ยนตาม AJAX โดย disable ไว้ -->
                                    </div>
                                </div>

                                <br>
								
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> สถานประกอบการที่เข้ารับการอบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="trainee_comp" id="trainee_comp" value="<?php echo $data["trainee_comp"]; ?>" class="form-control"  <?php echo $readonly; ?>>
                                    </div>
									<div class="col-md-2">
										<label><b> วันที่จัดอบรม </b><label style="color:red;">*</label></label>
										<br/>
										<input type="date" id="trainee_date" name="trainee_date" value="<?php echo $data["trainee_date"]; ?>" <?php echo $readonly; ?>>
									</div>
                                    <div class="col-md-4">
                                        <label><b> จำนวนผู้เข้าอบรม </b><label style="color:red;">*</label></label>
                                        <input type="text" name="trainee_num" id="trainee_num" value="<?php echo $data["trainee_num"]; ?>" class="form-control"  <?php echo $readonly; ?>>
                                    </div>                            
                                </div>
								
                                <br> 
								
								<!-- Budget sum -->
								<script>
								 $(document).on("change", ".budget", function() {
									var sum = 0;
									$(".budget").each(function(){
										sum += +$(this).val();
									});
									$(".budget_sum").val(sum);
								});
								</script>
								
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> งบประมาณที่ใช้</b><label style="color:red;">*</label></label>
                                    </div>
                                 </div>
									
                                <div class="row">
                                    <div class="col-md-4 align-center text-white">
                                        <h5><b>หมวดค่าใช้จ่าย</b> <label style="color:red;">*</label></h5>
                                    </div>
                                    <div class="col-md-4 align-center text-white">
                                        <h5><b>งบประมาณ (บาท)</b><label style="color:red;">*</label></h5>
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าตอบแทนวิทยากร</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="text" name="budget1" class="form-control budget" value="<?php echo $data["budget1"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าเดินทางและที่พัก</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="text" name="budget2" class="form-control budget" value="<?php echo $data["budget2"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าวัสดุ</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="text" name="budget3" class="form-control budget" value="<?php echo $data["budget3"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าอาหารและเครื่องดื่ม</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="text" name="budget4" class="form-control budget" value="<?php echo $data["budget4"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าสถานที่และสาธารณูปโภค</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="text" name="budget5" class="form-control budget" value="<?php echo $data["budget5"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าธรรมเนียม</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="text" name="budget6" class="form-control budget" value="<?php echo $data["budget6"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>รวมทั้งสิ้น</b><label style="color:red;">*</label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="text" name="budget_sum" class="form-control budget_sum" value="<?php echo $data["budget_sum"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <br>
								

                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> ขอเบิกจาก สกพอ. ร้อยละ 50 ของงบประมาณที่ใช้ คิดเป็นเงิน  (บาท)</b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="budget_eec" id="budget_eec" value="<?php echo $data["budget_eec"]; ?>" class="form-control"  <?php echo $readonly; ?>>
                                    </div>
                                </div>
								
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><b>ลงนามโดยผู้บริหารสถานศึกษาที่มีอำนาจลงนามผูกพันนิติบุคคลหรือผู้ที่ได้รับมอบอำนาจ</b><label style="color:red;">*</label></h4>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> ชื่อ-สกุล (พิมพ์)</b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="sign_name" id="sign_name" value="<?php echo $data["sign_name"]; ?>" class="form-control"  <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-4">
                                        <label><b> ตำแหน่ง </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="sign_pos" id="sign_pos" value="<?php echo $data["sign_pos"]; ?>" class="form-control"  <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <br>
                        
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> วันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="sign_date" name="sign_date" value="<?php echo $data["sign_date"]; ?>" <?php echo $readonly; ?>>
                                    </div>
                                </div>
                                <br>								
								
                                 <input type="hidden" name="fid" value="<?php echo $fid; ?>">                                              
								
                                </div>                            
                                </form>
								
								
                                <br>
                                <?php 
                                  
                                    if($_SESSION["type"] == 2 || $_SESSION["type"] == 1 ){
                                    ?> 
                                    <form action="./php/action-approve-form-eb02.php" method="POST" id="app_form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><b> ผลการพิจารณา</b><label style="color:red;">*</label></label>
                                            <input type="hidden" name="fid" value="<?php echo $fid; ?>">
                                            <select name="app" id="app" class="form-control">
                                                <option value="-1">-- กรุณาเลือก -- </option>
                                                <option value="3">อนุมัติ</option>
                                                <option value="2">แก้ไข</option> 

                                            </select>
                                        </div>  
                                                              
                                    </div>
                                    </form>
                                    <br>
                                    <button type="button" class="btn btn-lg btn-info" onclick="confirm_form('app_form', 'ยืนยันผลการพิจารณา')"> ยืนยันผลการพิจารณา </button>
                                <br>

                                    <?php 
                                    }
                                    else{

                                    
                                ?> 
                                <?php if(!$flag){ ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-lg btn-primary" onclick="confirm_form('eb02','ยืนยันการส่งแบบฟอร์ม EB-02')">ส่งคำขออนุมัติหลักสูตร</button>
                                        <!-- <button class="btn btn-lg btn-warning">บันทึกคำขอ</button> -->
                                    </div>  
                                <?php } ?>
                                    <div class="col-md-3">
                                    
                                    </div>                                   
                                </div>
                                <?php
                                    }// End if 
                                ?> 

                            </div>

    