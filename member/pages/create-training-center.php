<?php
                    $sql = "SELECT * FROM eec_training_institute NATURAL JOIN eec_institute WHERE 1"; 
                    $institutes = mysqli_query($con, $sql); 
                    // $institutes = get_institute($con);  
                ?> 
                <div class="row page-titles">
                    <div class="col-md-2 align-self-center">
                        <h1 class="text-themecolor">สร้างศูนย์อบรม</h1>
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
                                        <h2>ศูนย์อบรม</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                           <form method = "POST" action="./php/action-create-training-center.php" id="cen-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อศูนย์อบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> สถานศึกษาผู้รับผิดชอบ</b><label style="color:red;">*</label></label>
                                        <select name="institute" id="institute" class="form-control selectpicker" data-live-search="true" >
                                            <option vaule="-1"> -- กรุณาเลือก --</option>
                                            <?php while($ins = mysqli_fetch_array($institutes)){ 
                                                $uni = $ins["ins_name_th"]; 
                                                if($ins["ins_campus"] != '-'){
                                                    $uni = $uni." ".$ins["ins_campus"];
                                                }
                                                ?>
                                            <option value="<?php echo $ins["tins_id"]; ?> "> <?php echo $uni; ?> </option>
                                            <?php } // End degree's while ?>
                                            
                                        </select>
                                    </div>
                                    <div class="row">
                                <div class="col-md-12">
                                        <label><b> ผู้ดูแล/ประสานงานประจำสถาบันการศึกษา</b><label style="color:red;">*</label></label>
                                        <select name="coordinator_type" id="coordinator_type" class="form-control" onchange="display_coordinator_type('coordinator_type', 'sec1', 'sec2')">
                                            <option value="-1"> -- กรุณาเลือก --</option>
                                            <option value="1"> -- มีบัญชีผู้ใช้แล้ว --</option>
                                            <option value="2"> -- ผู้ใช้ใหม่ --</option>
                                        </select>
                                    </div>           
                                </div>
                                <br>
                                
                                <div class="row" id="sec1" style="display:none;">
                                   <div class="col-md-12"> 
                                        <label><b> เลือกผู้ประสารงาน/ผู้ดูแล</b><label style="color:red;">*</label></label>
                                        <?php display_select_user($con,"coordinator",1); ?>
                                   </div>           
                                </div>
                                <div class="row" id="sec2" style="display:none;">
                                   <div class="col-md-12"> 
                                        <label><b> อีเมล์</b><label style="color:red;">*</label></label>
                                        <input type="text" class="form-control" name="co-email" id="co-email">
                                   </div>   
                                   <div class="col-md-12"> 
                                        <label><b>ชื่อ</b><label style="color:red;">*</label></label>
                                        <input type="text" class="form-control" name="co-name" id="co-name">
                                   </div>    
                                   <div class="col-md-12"> 
                                        <label><b>นามสกุล</b><label style="color:red;">*</label></label>
                                        <input type="text" class="form-control" name="co-lastname" id="co-lastname">
                                   </div>           
                                </div>
                                <br>
                                </div>
                                <br> 
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-lg btn-primary" type="button" onclick="confirm_form('cen-form','ยืนยันสร้างศูนย์อบรม')">สร้างศูนย์อบรม</button>
                                        
                                    </div>  
                                    <div class="col-md-3">
                                    
                                    </div>                                   
                                </div>
                                               
                            </div><!-- End row --> 
                            </form>
                         </div>
                        
                    </div>
                    <!-- Column -->
                </div>

    