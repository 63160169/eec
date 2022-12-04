                <?php 
                    if(!empty($_GET["uid"])){
                        $user = get_user_by_id($con, $_GET["uid"]);
                    }
                ?> 
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h1 class="text-themecolor">ข้อมูลประวัติส่วนตัว</h1>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <?php include ("./pages/card-profile.php"); ?>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-header bg-primary">
                          
                           </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <nav>
                                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">ข้อมูลทั่วไป</a>
                                                <a class="nav-item nav-link" id="nav-education-tab" data-toggle="tab" href="#nav-education" role="tab" aria-controls="nav-education" aria-selected="false">การศึกษา</a>
                                                <a class="nav-item nav-link" id="nav-certification-tab" data-toggle="tab" href="#nav-certification" role="tab" aria-controls="nav-certification" aria-selected="false">ทักษะและประกาศนียบัตร</a> 
                                                <a class="nav-item nav-link" id="nav-experience-tab" data-toggle="tab" href="#nav-experience" role="tab" aria-controls="nav-experience" aria-selected="false">ประสบการณ์ทำงาน</a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <br>
                                        <form class="form-horizontal form-material">
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label ><b>ชื่อ-นามสกุล</b></label>
                                                    <input type="text" value="<?php echo $user["user_prefix"]." ".$user['user_firstname'] . " " . $user["user_lastname"]; ?>" class="form-control form-control-line" readonly>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                    <label for="example-email" ><b>หมายเลขบัตรประจำตัวประชาชน </b></label>
                                                    <input type="text" value="<?php echo $user['user_id_card']; ?>"class="form-control form-control-line"  readonly>
                                                </div>
                                            </div> 
                                            <br>
                                           
                                            <?php 
                                                $address = $user["user_address"]." ตำบล/แขวง ". $user["user_district"]." อำเภอ/เขต ".  $user["user_amphoe"]." จังหวัด ".$user["user_province"]." รหัสไปรษณีย์ ". $user["user_zipcode"]; 
                                            ?> 
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <label for="example-email" class="col-md-12"><b>ที่อยู่</b> </label>
                                                    <input type="text" value="<?php echo $address; ?>"class="form-control form-control-line" readonly>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                               
                                                <div class="col-md-6">
                                                    <label for="example-email" class="col-md-12"><b>วัน/เดือน/ปีเกิด </b></label>
                                                    <input type="text" value="<?php echo $user['user_birth']; ?>"class="form-control form-control-line"  readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="example-email" class="col-md-12"><b>เพศ </b></label>
                                                    <input type="text" value="<?php echo $user['user_gender']; ?>" class="form-control form-control-line"  readonly>
                                                </div>
                                            </div>
                                            <br>
                                          
                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <label for="example-email" class="col-md-12"><b>สัญชาติ </b></label>
                                                    <input type="text" value="<?php echo $user['user_nationality']; ?>" class="form-control form-control-line"  readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="example-email" class="col-md-12"><b>สถานะสมรส </b></label>
                                                    <input type="text" value="<?php echo $user['user_mariage']; ?>" class="form-control form-control-line"  readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="example-email" class="col-md-6"><b>หมายเลขโทรศัพท์ </b></label>
                                                    <input type="text" value="<?php echo $user['user_tel']; ?>" class="form-control form-control-line"  readonly>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                
                                                <div class="col-md-4">
                                                    <label for="example-email" class="col-md-6"><b>สถานที่ทำงาน </b></label>
                                                    <input type="text" value="<?php echo $user['user_workplace']; ?>" class="form-control form-control-line"  readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="example-email" class="col-md-12"><b>ตำแหน่งงาน </b></label>
                                                    <input type="text" value="<?php echo $user['user_position']; ?>" class="form-control form-control-line"  readonly>
                                                </div>
                                               
                                                <div class="col-md-4">
                                                    <label for="example-email" class="col-md-4"><b>ช่วงเงินเดือน </b></label>
                                                    <input type="text" value="<?php echo $user['user_salary']; ?>" class="form-control form-control-line"  readonly>
                                                </div>
                                            </div>
                                            <br>
                                            
                                          
                                          
                                            <div class="row">
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#edit_personal_data">
                                                        แก้ไขข้อมูล
                                                    </button>
                                            </div>
                                        </form>
                                    </div>  <!-- End tab main profile -->
                                    <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">
                                        <?php include ("./pages/section-education.php");  ?>
                                    </div>  <!-- End tab main profile -->
                                    <div class="tab-pane fade" id="nav-certification" role="tabpanel" aria-labelledby="nav-certification-tab">
                                    <?php include ("./pages/section-competency.php");  ?>
                                    </div>  <!-- End tab main profile -->
                                    <div class="tab-pane fade" id="nav-experience" role="tabpanel" aria-labelledby="nav-experience-tab">
                                        <?php include ("./pages/section-work-exp.php");  ?>
                                    </div>  <!-- End tab main profile -->
                                </div>  <!-- End contents -->

                                <?php
                                    include ("./pages/modal-edit-personal-data.php");  
                                    include ("./pages/modal-update-picture.php");  
                                    include ("./pages/modal-change-password.php");  
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                </div>