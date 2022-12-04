
 
                <div class="row page-titles">
                    <div class="col-md-6 align-self-center">
                        <h1 class="text-themecolor">รายงานผลการจัดอบรม(EB-03) test
                        <?php
		$fid = $_GET["fid"]; 
		$readonly = ""; 
		$data = ""; 
		$flag = false;
		if(isset($fid) || !empty($fid)){
			$data = get_form_eb03_detail($con, $fid);
			if($data["eb03_status"] != 2){
				$readonly = "readonly";
				$disabled = "disabled";
				$flag = true;
			}
		}
		
 ?> 


                        </h1>
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
                                        <h2>แบบรายงานผลการจัดอบรมระยะสั้นตามแนวทางอีอีซีโมเดล</h2>
                                    </div>
                                </div>
                            </div>



                    <div class="card-body">
                           <form method="POST" action="./php/action-update-eb03.php" id="myForm" novalidate="" enctype="multipart/form-data">
								<!-- script AJAX เปลี่ยนข้อความ input เมื่อเลือก dropdown -->
								<script language="JavaScript">
								function returnSelect(strCut)
								{
										myForm.eb02_id.value = strCut.split("|")[0];	//แยกข้อมูลที่เรียกมาด้วย | แล้วส่งกลับไปที่ id input
										myForm.eb01_ins_name.value = strCut.split("|")[1];
										myForm.eb01_title.value = strCut.split("|")[2];
								}
							</script>
							
                                <div class="row">
                                    <div class="col-md-12 align-center text-white">
                                        <h3>หลักสูตร</h3>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b> รหัสหลักสูตร (ตามประกาศ สกพอ.)</b><label style="color:red;">*</label></label>
                                        <?php display_select_eb02_approve($con, "eb02_id_select", $data["eb02_id"], $disabled); ?> 							
									  <input name="eb02_id" type="hidden" value="<?php echo $data["eb02_id"]; ?>"> <!-- ซ่อนค่ารหัส eb02_id ส่งค่าเพื่อบันทึก-->
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_title" id="eb01_title" value="<?php echo $data["eb01_title"]; ?>" class="form-control" disabled > <!-- แสดงค่าที่เปลี่ยนตาม AJAX โดย disable ไว้ -->
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> สถานศึกษาผู้รับผิดชอบหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_ins_name" id="eb02_ins_name" value="<?php echo get_institute_name($con, $data["tins_id"]); ?>" class="form-control" disabled > <!-- แสดงค่าที่เปลี่ยนตาม AJAX โดย disable ไว้ -->
                                           
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b> จังหวัด </b><label style="color:red;">*</label></label>
                                        <?php display_province($con, "province_id",$data["province_id"], $disabled); ?> 						                      
                                    </div>                            
                                </div>
                                <br> 
                                <br> 

                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ผู้ประสานงานหลักสูตร </b><label style="color:red;">*</label></label>                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-1">
                                        <label><b>ชื่อ </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="contact_name" id="contact_name" value="<?php echo $data["contact_name"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>สกุล </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="contact_surname" id="contact_surname" value="<?php echo $data["contact_surname"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                      
                                    </div>
                                </div>
                                <br> 

                                <div class="row">
                                    <div class="col-md-1">
                                        <label><b>หน่วยงาน</b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-6">                                             
                                        <input type="text" name="contact_agency" id="contact_agency" value="<?php echo $data["contact_agency"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>                       
                                </div>
                                <br> 

                                <div class="row">
                                    <div class="col-md-1">
                                        <label><b>อีเมล์  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="email" name="contact_email" id="contact_email" value="<?php echo $data["contact_email"]; ?>" placeholder="name@example.com" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>เบอร์โทร  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="contact_phone" id="contact_phone" value="<?php echo $data["contact_phone"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                                                        
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b>สถานประกอบการหลักที่ร่วมขอรับรองหลักสูตร </b><label style="color:red;">*</label></label>                                       
                                    </div>                        
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">                                             
                                        <input type="text" name="train_institute_1" id="train_institute_1" value="<?php echo $data["train_institute_1"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>                                 
                                </div>
                                <br> 

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> รายชื่อสถานประกอบการที่ร่วมส่งบุคลากรเข้ารับการอบรม (หากมี)</b></label></label>              
                                    </div>  
                                    <div class="col-md-2">
                                        <label><b> </b></label>
                                    </div>                                   
                                </div>
                                <div class="row" id="dynamic_form">
                                    <div class="col-md-6">
										<input type="text" name="a1" id="a1"  class="form-control" <?php echo $readonly; ?>>
                                    </div>  
                                    <div class="col-md-2"  <?php if($readonly!=null){ echo "style=\"display:none\"";} ?>>
										<a href="javascript:void(0)" class="btn btn-primary" id="plus5">เพิ่ม</a>
										<a href="javascript:void(0)" class="btn btn-danger" id="minus5">ลบ</a>
                                    </div>                                   
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>วันที่จัดอบรม (วัน/เดือน/ ปีพ.ศ.) เริ่ม </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" id="train_date_start" name="train_date_start" value="<?php echo $data["train_date_start"]; ?>"  <?php echo $readonly; ?> required>
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>สิ้นสุด </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" id="train_date_end" name="train_date_end" value="<?php echo $data["train_date_end"]; ?>"  <?php echo $readonly; ?> required>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2">
                                        <label><b>จำนวนวันอบรมรวม(วัน) </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="train_days" id="train_days" value="<?php echo $data["train_days"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>จำนวนชั่วโมงอบรมรวม  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="train_hours" id="train_hours" value="<?php echo $data["train_hours"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                                                        
                                    </div>
                                </div>
                                <br>

                               
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b> จำนวนผู้เข้ารับการอบรมรวม</b><label style="color:red;">*</label></label>
                                        <input type="number" name="train_trainee" id="train_trainee" value="<?php echo $data["train_trainee"]; ?>" class="form-control"  <?php echo $readonly; ?> required >
                                    </div>
                                </div>                              
                                <br>

                               
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>จำนวนวิทยากรรวม </b><label style="color:red;">*</label></label>
                                        <input type="number" name="train_lecturer" id="train_lecturer" value="<?php echo $data["train_lecturer"]; ?>" class="form-control"  <?php echo $readonly; ?> required >
                                    </div>                                  
                                </div>
                                <br>
                       
                                <div class="row">
                                    <div class="col-md-12 align-center text-white">
                                        <h3>หมวดค่าใช้จ่าย</h3>
                                    </div>
                                </div>
                                <br>                              

                                <div class="row">
                                    <div class="col-md-2">
                                        <label><b>ค่าใช้จ่ายตามจริง รวม </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_total" id="expenses_total" value="<?php echo $data["expenses_total"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>คิดเป็นร้อยละ 100  </b></label>                                       
                                    </div>                                 
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าลงทะเบียนที่ได้รับจากสถานประกอบการ  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_regis" id="expenses_regis" value="<?php echo $data["expenses_regis"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>คิดเป็นร้อยละ  </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_regis_perc" id="expenses_regis_perc" value="<?php echo $data["expenses_regis_perc"]; ?>" class="form-control"  <?php echo $readonly; ?> >                                        
                                    </div>                                 
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ขอรับเงินสนับสนุนจาก สกพอ. (ไม่เกินร้อยละ 50)  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_eec" id="expenses_eec" value="<?php echo $data["expenses_eec"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>คิดเป็นร้อยละ  </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_eec_perc" id="expenses_eec_perc" value="<?php echo $data["expenses_eec_perc"]; ?>" class="form-control"  <?php echo $readonly; ?> >                                        
                                    </div>                                 
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12 align-center text-white">
                                        <h3>การเบิกจ่ายเงินสนับสนุน</h3>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>ขอรับเงินสนับสนุน จำนวน(บาท)  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_support" id="expenses_support" value="<?php echo $data["expenses_support"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>ตัวหนังสือ  </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-3">                                        
                                        <input type="text" name="expenses_support_text" id="expenses_support_text" value="<?php echo $data["expenses_support_text"]; ?>" class="form-control"  <?php echo $readonly; ?> >                                        
                                    </div>
                                      <div class="col-md-2">
                                        <label><b>บาทถ้วน  </b></label>                                       
                                    </div>                                 
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label><b>ชื่อ/หน่วยงาน ผู้รับเงิน </b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_name" id="payee_name" value="<?php echo $data["payee_name"]; ?>" class="form-control"  <?php echo $readonly; ?> required >
                                    </div>                                    
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label><b>ที่อยู่ </b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_address" id="payee_address" value="<?php echo $data["payee_address"]; ?>" class="form-control"  <?php echo $readonly; ?> required >
                                    </div>                                    
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b>หมายเลขประจำตัวผู้เสียภาษี</b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_tex" id="payee_tex" value="<?php echo $data["payee_tex"]; ?>" class="form-control"  <?php echo $readonly; ?> required >
                                    </div>                                    
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b>ชื่อบัญชี</b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_bookbank" id="payee_bookbank" value="<?php echo $data["payee_bookbank"]; ?>" class="form-control"  <?php echo $readonly; ?> required >
                                    </div>                                    
                                </div>
                                <br>

                                 <div class="form-group row">
                                    <div class="col-md-2">
                                        <label><b>หมายเลขบัญชี</b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="col-md-4">                                        
                                        <input type="text" name="payee_bookbank_id" id="payee_bookbank_id" value="<?php echo $data["payee_bookbank_id"]; ?>" class="form-control"  <?php echo $readonly; ?> required >                                        
                                    </div>
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-2">
                                        <label><b>ธนาคาร </b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                        
                                        <input type="text" name="payee_bookbank_bank" id="payee_bookbank_bank" value="<?php echo $data["payee_bookbank_bank"]; ?>" class="form-control"  <?php echo $readonly; ?> >                                        
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>สาขา </b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                        
                                        <input type="text" name="payee_bookbank_branch" id="payee_bookbank_branch" value="<?php echo $data["payee_bookbank_branch"]; ?>" class="form-control"  <?php echo $readonly; ?> >                                        
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
                                        <label><b>เอกสารแนบ</b><label style="color:red;">*</label></label>
                                    </div>                                    
                                </div>

							 <?php if($readonly==null){ //ถ้า edit ไม่ต้องแสดงให้ upload ?>
							 
                                <div class="form-group row">
                                    <div class="col-md-6">
                                            <input type="file" id="myFile" name="fileupload" >     
											<input type="hidden" name="fileupload_ori" value="<?php echo $data["eb03_fileupload"]; ?>">             											
                                    </div>                                    
                                </div>
							 
							<?php 
								} //ถ้า edit ไม่ต้องแสดงให้ upload 
							?>	
							 
                                <div class="row">
                                    <div class="col-md-6">
                                            <a href="././php/uploads/<?php echo $data["eb03_fileupload"]; ?>" target="_blank"><?php echo $data["eb03_fileupload"]; ?></a>          
                                    </div>                                    
                                </div>
                                <br>							
								
								
                                 <input type="hidden" name="fid" value="<?php echo $fid; ?>"> 
								 
                                <br>          
								
                                <?php 
                                    if($_SESSION["type"] != 1 || $_SESSION["type"] != 2 ){
										if($flag==false){ 
								?>								
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-lg btn-primary" id="btnSubmit">ส่งรายงานการจัดอบรม</button>
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
								
								<form  method="POST" action="./php/action-approve-form-eb03.php" id="appForm" novalidate=""  >
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

    						
    <script>
        $(document).ready(function() {
        	var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus5", "#minus5", {
		        limit:30,
		        formPrefix : "dynamic_form",
		        normalizeFullForm : false
		    });

        	/*
        	dynamic_form.inject([
				{p_name: 'Hemant1',quantity: '123',remarks: 'testing remark1'},
				{p_name: 'Harshal2',quantity: '123',remarks: 'testing remark2'},
				{p_name: 'Hemant3',quantity: '123',remarks: 'testing remark3'},
				{p_name: 'Harshal4',quantity: '123',remarks: 'testing remark4'}
			]);
			*/			
        	//dynamic_form.inject([	{a1: 'a',a2: '1',a3: 'A'},	{a1: 'b',a2: '2',a3: 'B'},{a1: 'c',a2: '3',a3: 'C'},	{a1: 'd',a2: '4',a3: 'D'}]);
        	dynamic_form.inject([	<?php echo str_replace("\'","'",$data["train_institute_2"]); ?> ]);  //แปลงข้อมูลจาก \' เป็น ' 
			

		    $("#dynamic_form #minus5").on('click', function(){
		    	var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
		    	if (initDynamicId === 0) {
		    		$(this).closest('#dynamic_form').next().find('#minus5').hide();
		    	}
		    	$(this).closest('#dynamic_form').remove();
		    });

		    $('form').on('submit', function(event){
	        	var values = {};
				$.each($('form').serializeArray(), function(i, field) {
				    values[field.name] = field.value;
				});
				console.log(values)
        		//event.preventDefault();
        	})
        });
    </script>
	
	
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
    