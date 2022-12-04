

              
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
                           <form method="POST" action="./php/action-request-eb02.php" id="myForm" novalidate=""  >
						   
								<!-- script AJAX เปลี่ยนข้อความ input เมื่อเลือก dropdown -->
								<script language="JavaScript">
								function returnSelect(strCut)
								{
										myForm.eb01_id.value = strCut.split("|")[0];	//แยกข้อมูลที่เรียกมาด้วย | แล้วส่งกลับไปที่ id input
										myForm.eb01_ins_name.value = strCut.split("|")[1];
								}
							</script>
							
                                <div class="row">
                                    <div class="col-md-12">
										<div class="form-group">	
											<label><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>			
											<?php display_select_eb01_approve($con, "eb01_id_select","",""); ?> 							
										  <input name="eb01_id" type="hidden" value=""> <!-- ซ่อนค่ารหัส eb01_id ส่งค่าเพื่อบันทึก-->
                                    </div>
                                    </div>
                                </div>

                                <br>								
								
                                <div class="row">
									<div class="col-md-12">
										<div class="form-group">	
											<label><b> สถานศึกษาผู้รับผิดชอบหลักสูตร</b><label style="color:red;">*</label></label>
											<input type="text" name="eb01_ins_name" id="eb01_ins_name" value="" class="form-control" disabled > <!-- แสดงค่าที่เปลี่ยนตาม AJAX โดย disable ไว้ -->
                                    </div>
                                    </div>
                                </div>

                                <br>
								
                                <div class="row">
                                    <div class="col-md-6">
										<div class="form-group">	
											<label><b> สถานประกอบการที่เข้ารับการอบรม</b><label style="color:red;">*</label></label>
											<input type="text" name="trainee_comp" id="trainee_comp" value="" class="form-control" required>
										</div>
                                    </div>
									
									<div class="col-md-2">
										<div class="form-group">	
											<label><b> วันที่จัดอบรม </b><label style="color:red;">*</label></label>
											<br/>
											<input type="date" id="trainee_date" name="trainee_date" value="<?php echo date("Y-m-d"); ?>" required>
										</div>
									</div>
									
                                    <div class="col-md-4">
										<div class="form-group">	
											<label><b> จำนวนผู้เข้าอบรม </b><label style="color:red;">*</label></label>
											<input type="number" name="trainee_num" id="trainee_num" value="" class="form-control" required >
										</div>                            
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
								
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>ค่าตอบแทนวิทยากร</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="number" name="budget1" class="form-control budget" value="" required>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>ค่าเดินทางและที่พัก</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="number" name="budget2" class="form-control budget" value="" required>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>ค่าวัสดุ</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="number" name="budget3" class="form-control budget" value="" required>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>ค่าอาหารและเครื่องดื่ม</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="number" name="budget4" class="form-control budget" value="" required>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>ค่าสถานที่และสาธารณูปโภค</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="number" name="budget5" class="form-control budget" value="" required>
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b>ค่าธรรมเนียม</b></label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="number" name="budget6" class="form-control budget" value="" required>
                                    </div>
                                </div>
								
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <b>รวมทั้งสิ้น</b><label style="color:red;">*</label>                                       
                                    </div>
                                    <div class="col-md-4">                                   
                                        <input type="number" name="budget_sum" class="form-control budget_sum" value="" required>
                                    </div>
                                </div>
								
                                <br>
								

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b> ขอเบิกจาก สกพอ. ร้อยละ 50 ของงบประมาณที่ใช้ คิดเป็นเงิน  (บาท)</b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" name="budget_eec" id="budget_eec" value="" class="form-control" required >
                                    </div>
                                </div>
								
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <h4><b>ลงนามโดยผู้บริหารสถานศึกษาที่มีอำนาจลงนามผูกพันนิติบุคคลหรือผู้ที่ได้รับมอบอำนาจ</b><label style="color:red;">*</label></h4>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b> ชื่อ-สกุล (พิมพ์)</b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="sign_name" id="sign_name" value="" class="form-control" required >
                                    </div>
                                </div>
                                <br>

                                 <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b> ตำแหน่ง </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="sign_pos" id="sign_pos" value="" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                        
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label><b> วันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="sign_date" name="sign_date" value="<?php echo date("Y-m-d"); ?>" required>
                                    </div>
                                </div>
								
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-lg btn-primary" id="btnSubmit">ส่งคำขออนุมัติจัดอบรม</button>
                                    </div>                         
                                </div>              
								            
                        </form>
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
		if (form[0].checkValidity() === false) {
		  event.preventDefault()
		  event.stopPropagation()
		}    
		form.addClass('was-validated');
		// Perform ajax submit here...    
	});	
	 
});
</script>
    