
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
                           <form method="POST" action="./php/action-request-eb04.php" id="myForm"  enctype="multipart/form-data" novalidate="">
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
                                        <input type="text" name="comp_name" id="comp_name" value="" class="form-control" required>
                                        
                                    </div>
                                 
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-6">
                                        <label><b>ขอรับรองว่า ได้ส่งบุคลากรในสังกัดเข้ารับการอบรมระยะสั้น ตามแนวทางอีอีซีโมเดล </br>ในหลักสูตร </b><label style="color:red;">*</label></label>
                                        <?php display_select_eb03_approve($con, "eb03_id_select","",""); ?> 							
									  <input name="eb03_id" type="hidden" value=""> <!-- ซ่อนค่ารหัส eb03_id ส่งค่าเพื่อบันทึก-->
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> ชื่อหลักสูตร </b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_title" id="eb01_title" value="" class="form-control" disabled>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> จัดโดยสถานศึกษาชื่อ</b><label style="color:red;">*</label></label>
                                        <input type="text" name="eb01_ins_name" id="eb01_ins_name" value="" class="form-control" disabled>
                                    </div>
                                </div>
                                <br>								

                                <div class="row">
                                    <div class="col-md-2">
                                        <label><b>ระหว่างวันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="eb03_date_start" name="eb03_date_start" value="" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label><b>ถึง </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="eb03_date_end" name="eb03_date_end" value="" disabled>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label><b> มีจำนวนผู้เข้ารับการอบรมรวม</b><label style="color:red;">*</label></label>
                                        <input type="number" name="comp_trainee" id="comp_trainee" value="" class="form-control" required>
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

                                <div class="form-group row">
                                    <div class="col-md-6">
                                            <input type="file" id="myFile" name="fileupload" required>                    
                                    </div>                                    
                                </div>
                                <br>
								
								
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-lg btn-primary" id="btnSubmit">ส่งเอกสารรับรองจากสถานประกอบการ</button>
                                    </div>  
                                </div>              
                                </div>              
                                </form>
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