 
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
                           <form method="POST" action="./php/action-insert-data-from-file.php" id="course">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b>ไฟล์ข้อมูล</b><label style="color:red;">*</label></label>
                                        <input type="file" name="title" id="title"  class="form-control">
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

    