<?php
                    $institutes = get_institute($con);  
                    $fid = $_GET["fid"];
                    $form = get_form_eb01_detail($con, $fid)
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
                           <form method="POST" action="./php/action-request-eb02.php" id="eb02">
						   
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> รหัสหลักสูตร (ตามประกาศ สกพอ.)</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" value="" class="form-control" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" value="" class="form-control" >
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> สถานศึกษาผู้รับผิดชอบหลักสูตร</b><label style="color:red;">*</label></label>
                                        <select name="coordinator" id="coordinator" class="form-control selectpicker" data-live-search="true" >
                                            <option vaule="-1"> -- กรุณาเลือก --</option>
                                           
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label><b> ชื่อผู้รับผิดชอบหลักสูตร</b><label style="color:red;">*</label></label>
                                        <select name="coordinator" id="coordinator" class="form-control selectpicker" data-live-search="true" >
                                            <option vaule="-1"> -- กรุณาเลือก --</option>
                                           
                                            
                                        </select>

                                    </div>

                                    <div class="col-md-4">
                                        <label><b> โทรศัพท์</b><label style="color:red;">*</label></label>
                                        <input type="text" name="telephone" id="telephone" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                        <label><b> อัตราค่าลงทะเบียนตลอดหลักสูตร (บาท/คน)</b><label style="color:red;">*</label></label>
                                        <input type="text" name="reg_per_gen" id="reg_per_gen" value="" class="form-control" >
                                    </div>
                            
                                </div>
                                <br> 
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> งบประมาณ (โปรดระบุงบประมาณรวมทั้งโครงการ)</b><label style="color:red;">*</label></label>
                                        <input type="text" name="budget_total" id="reg_per_gen" value="" class="form-control" >
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 align-center text-white">
                                        <h5><b>หมวดค่าใช้จ่าย</b> <label style="color:red;">*</label></h5>
                                    </div>
                                    <div class="col-md-4 align-center text-white">
                                        <h5><b>รายละเอียดตัวคูณ</b><label style="color:red;">*</label></h5>
                                    </div>
                                    <div class="col-md-4 align-center text-white">
                                        <h5><b>รวม</b><label style="color:red;">*</label></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>1. ค่าตอบแทนวิทยากร - วิทยากรหลัก </b></label>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>2. ค่าตอบแทนวิทยากร - ผู้ช่วยวิทยากร  </b>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br> 

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>3.ค่าที่พัก (วิทยากร)</b>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>4. ค่าวัสดุ/ค่าธรรมเนียม (เช่น license) </b>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                  <div class="row">
                                    <div class="col-md-4">
                                        <b>5. ค่าอาหารและเครื่องดื่ม </b>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>6. ค่าสถานที่และสาธารณูปโภค</b>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>7. ค่าตอบแทนการบริหารโครงการ</b>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>8. ค่าธรรมเนียมตามระเบียบของสถานศึกษา</b>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="Multiplier" id="Multiplier" value="" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total" id="total" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>รวมทั้งสิ้น</b><label style="color:red;">*</label>
                                       
                                    </div>
                                    <div class="col-md-4">
                                   
                                        <input type="text" name="total_all" id="total_all" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> วงเงินที่ขอรับการสนับสนุนจาก EEC-HDC (ไม่เกินร้อยละ 50 ของค่าใช้จ่ายจริง)</b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="budget_total" id="reg_per_gen" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> วงเงินที่ขอรับการสนับสนุนจาก EEC-HDC (ไม่เกินร้อยละ 50 ของค่าใช้จ่ายจริง)</b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="budget_limit" id="budget_limit" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>
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
                                        <input type="text" name="name" id="name" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>

                                 <div class="row">
                                    <div class="col-md-4">
                                        <label><b> ตำแหน่ง </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="position" id="position" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>
                        
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> วันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="start" name="trip-start"
                                            value="2018-07-22"
                                            min="2018-01-01" max="2018-12-31">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>ลายมือชื่อ / ตราประทับ (ถ้ามี)</b>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="/action_page.php">
                                            <input type="file" id="myFile" name="filename">
                                            
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><b> สำหรับเจ้าหน้าที่ EEC-HDC</b><label style="color:red;">*</label></h4>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" id="holder" name="holder">ตรวจสอบหลักสูตรแล้ว</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="2" id="holder" name="holder">งบประมาณเป็นไปตามเกณฑ์</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="3" id="holder" name="holder">งบประมาณเป็นไปตามเกณฑ์</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="4" id="holder" name="holder">ไม่สมควรอนุมัติ เนื่องจาก </label>
                                            <input type="text" name="reasoning" id="reasoning" value="" class="form-control" >
                                        </div>
                                    </div>
                               
                                </div>
                                

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>ลายมือชื่อ</b>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="aut_name" id="aut_name" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> วันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="start" name="trip-start"
                                            value="2018-07-22"
                                            min="2018-01-01" max="2018-12-31">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><b> คำสั่งการของผู้มีอำนาจอนุมัติ</b><label style="color:red;">*</label></h4>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="1" id="holder" name="holder">อนุมัติ</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="2" id="holder" name="holder">ไม่อนุมัติ</label>
                                        </div>
                                    </div>
                               
                                </div>
                                

                                <div class="row">
                                    <div class="col-md-4">
                                        <b>ลายมือชื่อ</b>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="aut_name" id="aut_name" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> วันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="start" name="trip-start"
                                            value="2018-07-22"
                                            min="2018-01-01" max="2018-12-31">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ข้อมูลสำหรับการกันเงินงบประมาณ </b><label style="color:red;">*</label></label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>เลขที่กันเงินงบประมาณ<b><label style="color:red;">*</label></label>
                                   
                                        <input type="text" name="budget_pro" id="budget_pro" value="" class="form-control" >
                                    </div>
                                </div>
                                
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>ลายมือชื่อ</b>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="aut_name" id="aut_name" value="" class="form-control" >
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b> วันที่ </b><label style="color:red;">*</label></label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="start" name="trip-start"
                                            value="2018-07-22"
                                            min="2018-01-01" max="2018-12-31">
                                    </div>
                                </div>
                                <br>


                            
                                </form>

                            </div>

    