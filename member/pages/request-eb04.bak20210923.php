
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
                           <form method="POST" action="./php/action-request-form.php" id="eb04">
                                  
                             
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>บริษัท</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" value="" class="form-control" >
                                        
                                    </div>
                                 
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-6">
                                        <label><b>ขอรับรองว่า ได้ส่งบุคลากรในสังกัดเข้ารับการอบรมระยะสั้น ตามแนวทางอีอีซีโมเดล ในหลักสูตร </b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> รหัสหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> จัดโดยสถานศึกษาชื่อ </b><label style="color:red;">*</label></label>
                                        <input type="text" name="organize_name" id="organize_name" value="" class="form-control" >
                                    </div>
                                </div>

                                <br>
                                

                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>ในระหว่างวันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" id="start" name="trip-start"
                                            value="2018-07-22"
                                            min="2018-01-01" max="2018-12-31">
                                    </div>
                                    
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>มีจำนวนผู้เข้ารับการอบรมรวม</b><label style="color:red;">*</label></label>
                                       
                                    </div>
                                    <div class="col-md-2">
                                        
                                        <input type="text" name="count_pre" id="count_pre" value="" class="form-control" >
                                        
                                    </div>
                                                                     
                                </div>
                                <br>

                               
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>รายชื่อ(แนบไฟล์)</b><label style="color:red;">*</label></label>
                                        
                                    </div>

                                </div>
                             

                                <form action="myform.cgi"> <input type="file" name="fileupload" value="fileupload" id="fileupload"> <label for="fileupload"> Select a file to upload</label> <input type="submit" value="submit"> </form>                       
                                </form>

                            </div>