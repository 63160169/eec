
                <div class="row page-titles">
                    <div class="col-md-6 align-self-center">
                        <h1 class="text-themecolor">รายงานผลการจัดอบรม(EB-03)</h1>
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
                           <form method="POST" action="./php/action-request-eb03.php" id="myForm"  enctype="multipart/form-data" novalidate="">
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
                                        <?php display_select_eb02_approve($con, "eb02_id_select","",""); ?> 							
									  <input name="eb02_id" type="hidden" value=""> <!-- ซ่อนค่ารหัส eb02_id ส่งค่าเพื่อบันทึก-->
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_title" id="eb01_title" value="" class="form-control" disabled > <!-- แสดงค่าที่เปลี่ยนตาม AJAX โดย disable ไว้ -->
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> สถานศึกษาผู้รับผิดชอบหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_ins_name" id="eb02_ins_name" value="" class="form-control" disabled > <!-- แสดงค่าที่เปลี่ยนตาม AJAX โดย disable ไว้ -->
                                        </select>
                                    </div>
                                    <div class="col-md-4">
											<div class="form-group">		
											<label><b> จังหวัด </b><label style="color:red;">*</label></label>
											<?php display_province($con, "province_id","",""); ?> 						                      
										</div>                            					                      
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
                                        <input type="text" name="contact_name" id="contact_name" value="" class="form-control" required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>สกุล </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="contact_surname" id="contact_surname" value="" class="form-control" required >                      
                                    </div>
                                </div>
                                <br> 

                                <div class="row">
                                    <div class="col-md-1">
                                        <label><b>หน่วยงาน</b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-6">                                             
                                        <input type="text" name="contact_agency" id="contact_agency" value="" class="form-control" required >                                        
                                    </div>                       
                                </div>
                                <br> 

                                <div class="row">
                                    <div class="col-md-1">
                                        <label><b>อีเมล์  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="email" name="contact_email" id="contact_email" value="" placeholder="name@example.com" class="form-control" required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>เบอร์โทร  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="contact_phone" id="contact_phone" value="" class="form-control" required >                                                                        
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
                                        <input type="text" name="train_institute_1" id="train_institute_1" value="" class="form-control" required >                                        
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
										<input type="text" name="a1" id="a1"  class="form-control" >
                                    </div>  
                                    <div class="col-md-2">
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
                                        <input type="date" id="train_date_start" name="train_date_start" value="<?php echo date("Y-m-d"); ?>" required>
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>สิ้นสุด </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" id="train_date_end" name="train_date_end" value="<?php echo date("Y-m-d"); ?>" required>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-2">
                                        <label><b>จำนวนวันอบรมรวม(วัน) </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="train_days" id="train_days" value="" class="form-control" required >                                        
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>จำนวนชั่วโมงอบรมรวม  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="train_hours" id="train_hours" value="" class="form-control" required >                                                                        
                                    </div>
                                </div>
                                <br>

                               
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b> จำนวนผู้เข้ารับการอบรมรวม</b><label style="color:red;">*</label></label>
                                        <input type="number" name="train_trainee" id="train_trainee" value="" class="form-control" required >
                                    </div>
                                </div>                              
                                <br>

                               
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>จำนวนวิทยากรรวม </b><label style="color:red;">*</label></label>
                                        <input type="number" name="train_lecturer" id="train_lecturer" value="" class="form-control" required >
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
                                    <div class="col-md-2">                                        
                                        <input type="number" name="expenses_total" id="expenses_total" value="" class="form-control" required >                                        
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label><b>คิดเป็นร้อยละ 100  </b></label>                                       
                                    </div>                                 
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ค่าลงทะเบียนที่ได้รับจากสถานประกอบการ  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_regis" id="expenses_regis" value="" class="form-control" required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>คิดเป็นร้อยละ  </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_regis_perc" id="expenses_regis_perc" value="" class="form-control" required >                                        
                                    </div>                                 
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>ขอรับเงินสนับสนุนจาก สกพอ. (ไม่เกินร้อยละ 50)  </b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_eec" id="expenses_eec" value="" class="form-control" required >                                        
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>คิดเป็นร้อยละ  </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-2">                                        
                                        <input type="number" name="expenses_eec_perc" id="expenses_eec_perc" value="" class="form-control" required >                                        
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
                                        <input type="number" name="expenses_support" id="expenses_support" value="" class="form-control" required >                                        
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>ตัวหนังสือ  </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-3">                                        
                                        <input type="text" name="expenses_support_text" id="expenses_support_text" value="" class="form-control" >                                        
                                    </div>
                                      <div class="col-md-2">
                                        <label><b>บาทถ้วน  </b></label>                                       
                                    </div>                                 
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label><b>ชื่อ/หน่วยงาน ผู้รับเงิน </b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_name" id="payee_name" value="" class="form-control" required >
                                    </div>                                    
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label><b>ที่อยู่ </b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_address" id="payee_address" value="" class="form-control" required >
                                    </div>                                    
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b>หมายเลขประจำตัวผู้เสียภาษี</b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_tex" id="payee_tex" value="" class="form-control" required >
                                    </div>                                    
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b>ชื่อบัญชี</b><label style="color:red;">*</label></label>
                                        <input type="text" name="payee_bookbank" id="payee_bookbank" value="" class="form-control" required >
                                    </div>                                    
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-2">
                                        <label><b>หมายเลขบัญชี</b><label style="color:red;">*</label></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="payee_bookbank_id" id="payee_bookbank_id" value="" class="form-control" required >                                        
                                    </div>
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-2">
                                        <label><b>ธนาคาร </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="payee_bookbank_bank" id="payee_bookbank_bank" value="" class="form-control"  >                                        
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>สาขา </b></label>                                       
                                    </div>
                                    <div class="form-group col-md-4">                                        
                                        <input type="text" name="payee_bookbank_branch" id="payee_bookbank_branch" value="" class="form-control"  >                                        
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

                                <div class="form-group row">
                                    <div class="col-md-6">
                                            <input type="file" id="myFile" name="fileupload" required>                                  
                                    </div>                                    
                                </div>
                                <br>
								
								
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-lg btn-primary" id="btnSubmit">ส่งรายงานการจัดอบรม</button>
                                    </div>  
                                </div>              
								
                                </div>      
                            </form>
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
		if (form[0].checkValidity() === false) {
		  event.preventDefault()
		  event.stopPropagation()
		}    
		form.addClass('was-validated');
		// Perform ajax submit here...    
	});	
	 
});
</script>