                <?php
                    $fid = $_GET["fid"]; 
                    $readonly = ""; 
                    $data = ""; 
                    $flag = false;
                    if(isset($fid) || !empty($fid)){
                       
                        $data = get_form_eb01_detail($con, $fid);
                        if($data["eb01_status"] != 2){
                            $readonly = "readonly";
                            $flag = true;
                        }
                    }
                    $institutes = get_institute($con);  
                ?> 
                <div class="row page-titles">
                    <div class="col-md-2 align-self-center">
                        <h1 class="text-themecolor">ขอรับรองหลักสูตร (EB-01)</h1>
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
                                        <h2>หลักสูตรการอบรมระยะสั้นตามแนวทางอีอีซีโมเดล</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                           <form method="POST" action="./php/action-request-form.php" id="myForm" novalidate=""  >
							   					
								<div class="row">			   						
										<div class="col-md-12">
											<div class="form-group">		
												<label for="title" class="control-label"><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>
												<input type="text" name="title" id="title" class="form-control" <?php echo $readonly; ?> autocomplete="on" required>
											</div>
										</div>
								</div>
								
                                <br> 
								
								<div class="row">								
									<div class="col-md-6">
										<div class="form-group">		
											<label  class="control-label"><b> สถานศึกษาผู้รับผิดชอบ</b><label style="color:red;">*</label></label>
											<?php display_select_training_institute($con, "institute", "", ""); ?> 		
										</div>
									</div>
								</div>
								
                                <br> 								
                                
                                <div class=" row">														
									<div class="col-md-6">		
										<div class="form-group">
											<label for="holder" class="control-label"><b> ผู้ประกอบการที่ประสงค์เข้ารับการอบรม</b><label style="color:red;">*</label></label>
										
												<div class="form-check">	
													<input  class="form-check-input required" type="radio" value="1" id="holder" name="holder"  required>
													<label class="form-check-label" > อุตสาหกรรมในพื้นที่อีอีซีที่ไม่ได้รับบีโอไอ (1)</label>
												</div> 
												<div class="form-check">	
													<input  class="form-check-input required" type="radio" value="2" id="holder" name="holder"  required>
													<label class="form-check-label"> อุตสาหกรรมนอกพื้นที่อีอีซีที่ไม่ได้รับบีโอไอ (2)</label>
												</div> 
												<div class="form-check">	
													<input  class="form-check-input required" type="radio" value="3" id="holder" name="holder"  required>
													<label class="form-check-label" > อุตสาหกรรมในพื้นที่อีอีซีที่ยังได้รับการยกเว้นภาษีเงินได้นิติบุคคลจากบีโอไอ (3)</label>
												</div> 
												<div class="form-check">	
													<input  class="form-check-input required" type="radio" value="4" id="holder" name="holder"  required>
													<label class="form-check-label"> อุตสาหกรรมนอกพื้นที่อีอีซีที่ยังได้รับการยกเว้นภาษีเงินได้นิติบุคคลจากบีโอไอ (4)</label>
												</div> 
											
											</div>
										</div>
										
									<div class="col-md-6">
										<div class="form-group">			
											<label for="target_industry" class="control-label"><b>ตอบสนองต่ออุตสาหกรรมเป้าหมาย</b><label style="color:red;">*</label></label>
											<?php display_select_target_industry($con, "target_industry", "" ,""); ?>                                        
										</div>										
									</div>									
                                </div>
								
                                <br> 
                            
                                <div class="row">								
									<div class="col-md-4">
										<div class="form-group">	
											<label for="gen" class="control-label"><b> จำนวนรุ่นผู้เข้าอบรม</b><label style="color:red;">*</label></label>
											<input type="number" name="gen" id="gen"  value="<?php echo $data["eb01_trainee_gen"]; ?>" class="form-control" required <?php echo $readonly; ?> >
											<div class="help-block with-errors"></div>
										</div>
									</div>									
									<div class="col-md-4">
										<div class="form-group">	
											<label for="per_gen" class="control-label"><b> รุ่นละ</b><label style="color:red;">*</label></label>
											<input type="number" name="per_gen" id="per_gen" value="<?php echo $data["eb01_trainee_per_gen"]; ?>" class="form-control" required <?php echo $readonly; ?> >
											<div class="help-block with-errors"></div>
										</div>
									</div>										
									<div class="col-md-4">
										<div class="form-group">	
											<label for="per_total" class="control-label"><b> รวมทั้งสิ้น</b><label style="color:red;">*</label></label>
											<input type="number" name="per_total" value="<?php echo $data["eb01_trainee_total"]; ?>" id="per_total" class="form-control" required <?php echo $readonly;  ?>>
											<div class="help-block with-errors"></div>
										</div>
									</div>									
                                </div>
								
                                <br> 
								
                                <div class="row">
                                    <div class="col-md-6">
										<div class="form-group">	
											<label><b> กำหนดการฝึกอบรม</b><label style="color:red;">*</label></label>
											<input type="text" name="train_schedule" id="train_schedule" class="form-control" required >
											<!-- value="<?php echo $data["eb01_schedule"]; ?>" <?php echo $readonly; ?> -->
										</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group">	
											<label><b> ระยะเวลาในการฝึกอบรม</b><label style="color:red;">*</label></label>
											<input type="text" name="train_period" id="train_period" class="form-control" required  >
											<!-- value="<?php echo $data["eb01_period"]; ?>" <?php echo $readonly; ?> -->
										</div>                                    
                                    </div>                                    
                                </div>
								
                                <br> 
								
                                <div class="row">
                                    <div class="col-md-6">
										<div class="form-group">	
											<label><b> งบประมาณต่อรุ่น </b><label style="color:red;">*</label></label>
											<input type="number" name="budget_per_gen" id="budget_per_gen" class="form-control" required>
										</div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group">	
											<label><b> งบประมาณทั้งหมด</b><label style="color:red;">*</label></label>
											<input type="number" name="budget_total" id="budget_total" class="form-control" required>
										</div>
                                    </div>                                    
                                </div>
								
                                <br> 
								
                                <div class="row">
                                    <div class="col-md-12">
										<div class="form-group">	
											<label><b> กลุ่มเป้าหมาย</b><label style="color:red;">*</label></label>
											<input type="text" name="target" id="target" class="form-control" required>
										</div>                                   
                                    </div>                                   
                                </div>
								
                                <br> 
								
                                <div class="row">
                                    <div class="col-md-12">
										<div class="form-group">	
											<label><b> ที่มาและความสำคัญ</b><label style="color:red;">*</label></label>
											<textarea name="intro" id="intro" class="form-control" required></textarea>                                        
										</div>                                   
									</div>
                                </div>
								
                                <br> 
								
                                <div class="row">
                                    <div class="col-md-12">
										<div class="form-group">	
											<label><b> ผลลัพธ์การเรียนรู้ของหลักสูตร (Learning Outcomes)</b><label style="color:red;">*</label></label>
											<textarea name="outcome" id="outcome" class="form-control" required></textarea>                                        
										</div>                                                    
                                    </div>                                   
                                </div>
								
                                <br>
								
                                <div class="row">
                                    <div class="col-md-12">
										<div class="form-group">	
											<label><b> ผลกระทบและประโยชน์ที่คาดว่าจะได้รับ (Impact)</b><label style="color:red;">*</label></label>
											<textarea name="impact" id="impact" class="form-control" required></textarea>                                        
										</div>                                                                 
                                    </div>                                   
                                </div>
								
                                <br>								
								
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> รายละเอียดการฝึกอบรม</b><label style="color:red;">*</label></label>
                                    </div>                                  
                                </div>
                                <div class="row" id="dynamic_form">
                                    <div class="col-md-4">
										<input type="text" name="a1" id="a1"  class="form-control" placeholder="หัวข้อ" required>
                                    </div>  
                                    <div class="col-md-4">
										<input type="text" name="a2" id="a2" class="form-control" placeholder="Outcomes ที่เกี่ยวข้อง" required>
                                    </div>          
                                    <div class="col-md-2">
										<input type="text" name="a3" id="a3" class="form-control" placeholder="ระยะเวลา (ชั่วโมง)" required>
                                    </div>       
                                    <div class="col-md-2">
										<a href="javascript:void(0)" class="btn btn-primary" id="plus5">เพิ่ม</a>
										<a href="javascript:void(0)" class="btn btn-danger" id="minus5">ลบ</a>
                                    </div>                                   
                                </div>
								
                                <br>
								
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-lg btn-primary" id="btnSubmit">ส่งคำขออนุมัติหลักสูตร</button>
                                    </div>  
                                </div>
								
								
                            </div><!-- End row --> 
                            </form>
                         </div>
                        
                    </div>
                    <!-- Column -->
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
    


