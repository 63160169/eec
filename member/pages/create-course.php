 
                
                <div class="row page-titles">
                    <div class="col-md-2 align-self-center">
                        <h1 class="text-themecolor">เพิ่มคอร์สอบรม</h1>
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
                           <form method="POST" action="./php/action-create-course.php" id="course">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title"  class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> อุตสาหกรรมเป้าหมาย</b><label style="color:red;">*</label></label>
                                        <select name="indus" id="indus" class="form-control">
                                            <?php
                                                $sql = "SELECT * FROM eec_target_industry WHERE 1"; 
                                                $obj = mysqli_query($con, $sql); 
                                                while($row = mysqli_fetch_array($obj)){
                                            ?> 
                                                <option value = "<?php echo $row["tar_title"]; ?>"><?php echo $row["tar_title"]; ?></option> 
                                            <?php } // End whilw ?> 
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b> ปีงบประมาณ</b><label style="color:red;">*</label></label>
                                        <select name="year" id="year" class="form-control">
                                            <option value="2563">2563</option> 
                                            <option value="2564">2564</option> 
                                            <option value="2565">2565</option> 
                                            <option value="2566">2566</option> 
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> สถาบันที่จัดอบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="institute" id="institute"  class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label><b> ศูนย์อบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="center" id="center"  class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> จำนวนชั่วโมง</b><label style="color:red;">*</label></label>
                                        <input type="text" name="credit" id="credit"  class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label><b> รหัสคอร์สอบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="course_id" id="course_id"  class="form-control">
                                    </div>
                                </div>
                                <br> 
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-lg btn-success"  onclick="confirm_form('course','ยืนยันการสร้างคอร์สอบรม')"> สร้างคอร์สอบรม </button>
                                    </div>
                                </div>
                             
                               
                            
                                
                                               
                           
                            </form>
                         </div>
                        
                    </div>
                    <!-- Column -->
                </div>
               
             </div>

    