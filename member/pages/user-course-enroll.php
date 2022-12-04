<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h1 class="text-themecolor">ข้อมูลการอบรม</h1>
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
                                                <a class="nav-item nav-link active" id="nav-enroll-tab" data-toggle="tab" href="#nav-enroll" role="tab" aria-controls="nav-enroll" aria-selected="true">ลงทะเบียนอบรม</a>
                                                <a class="nav-item nav-link" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab" aria-controls="nav-history" aria-selected="false">ประวัติการอบรม</a>
                                                
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-enroll" role="tabpanel" aria-labelledby="nav-enroll-tab">
                                        <br>
                                        <form class="form-horizontal form-material" method="POST" action="./php/action-enroll-course.php" id="form_enroll">
                                            <div class="form-group">
                                                <label class="col-md-12"><b>ระบุรหัสการลงะเบียน (6 หลัก)</b></label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="key" id="key">
                                                    <input type="hidden" class="form-control form-control-line" name="uid" value="<?php echo $user["user_id"]; ?>">
                                                </div>
                                            </div>
                                            
                                        
                                            <div class="form-group">
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-lg" onclick="confirm_form('form_enroll', 'ยืนยันการลงทะเบียน')">
                                                        ลงทะเบียน
                                                    </button>
                                            </div>
                                        </form>
                                    </div>  <!-- End tab main profile -->
                                    <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                                        <?php include ("./pages/section-history.php");  ?>
                                    </div>  <!-- End tab main profile -->
                                    
                                </div>  <!-- End contents -->
                                </div>

                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>