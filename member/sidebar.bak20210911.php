<aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span></span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i
                        class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                   
                    <?php  if($_SESSION["type"] == 5){ ?> 
                        <li> <a class="waves-effect waves-dark" href="?content=user-profile" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu"></span>ประวัติส่วนตัว</a></li>
                    <?php } // End general User?> 
                    <?php  if($_SESSION["type"] == 5){ ?> 
                        <li> <a class="waves-effect waves-dark" href="?content=user-course-enroll" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu"></span>การอบรม</a></li>
                    <?php } // End general User?>    
                    <?php  if($_SESSION["type"] == 1 || $_SESSION["type"] == 2){ ?>  
                        <li> <a class="waves-effect waves-dark" href="?content=list-user" aria-expanded="false"><i class="fa fa-address-book"></i><span class="hide-menu"></span>บัญชีผู้ใช้</a></li>
                    <?php } // End general User?>  
                    <?php  if($_SESSION["type"] == 2 || $_SESSION["type"] == 1){ ?> 
                        <li> <a class="waves-effect waves-dark" href="?content=list-institute-training" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>สถาบันการศึกษา</a></li>
                    <?php } // End general User?>
                    <?php  if($_SESSION["type"] == 3 || $_SESSION["type"] == 1 || $_SESSION["type"] == 2){ ?> 
                        <li> <a class="waves-effect waves-dark" href="?content=list-training-center" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>ศูนย์อบรม</a></li>
                    <?php } // End general User?>
                    <?php  if($_SESSION["type"] == 3 || $_SESSION["type"] == 2 || $_SESSION["type"] == 1){ ?> 
                        <li> <a class="waves-effect waves-dark" href="?content=training-course" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>คอร์สอบรม</a></li>
                    <?php } // End general User?>
                    <?php  if($_SESSION["type"] == 3 || $_SESSION["type"] == 2 || $_SESSION["type"] == 1){ ?> 
                        <li> <a class="waves-effect waves-dark" href="?content=user-request-course" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>ขอรับรองหลักสูตร (EB-01)</a></li>
                    <?php } // End general User?>
                    <?php  if($_SESSION["type"] == 3 || $_SESSION["type"] == 2 || $_SESSION["type"] == 1){ ?> 
                        <li> <a class="waves-effect waves-dark" href="?content=user-request-approve" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>ขออนุมัติจัดอบรมระยะสั้น (EB-02)</a></li>
                        <li> <a class="waves-effect waves-dark" href="?content=list-eb03" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>รายงานการจัดอบรม (EB-03)</a></li>
                        <li> <a class="waves-effect waves-dark" href="?content=list-eb04" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>เอกสารรับรองจากผู้ประกอบการ (EB-04)</a></li>
                        <li> <a class="waves-effect waves-dark" href="?content=report-primary" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>รายงานสถิติ</a></li>
                    <?php } // End general User?>
                    
                        <li> <a class="waves-effect waves-dark" href="./php/action-logout.php" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>ออกจากระบบ</a></li>
                        <!-- <li> <a class="waves-effect waves-dark" href="https://prepro.informatics.buu.ac.th/~manpower/medhub/?content=hospital-nearby-me" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>ศูนย์บริการใกล้ฉัน</a></li>
                        <li> <a class="waves-effect waves-dark" href="?content=hospital-list" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu"></span>รายชื่อศูนย์บริการทั้งหมด</a></li>
                        <li> <a class="waves-effect waves-dark" href="?content=update-hospital-patient" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu"></span>อัพเดตข้อมูลการใช้เตียง</a></li> -->


                        <!-- <li> <a class="waves-effect waves-dark" href="index.html" aria-expanded="false"><i
                                    class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.html" aria-expanded="false"><i
                                    class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="table-basic.html" aria-expanded="false"><i
                                    class="fa fa-table"></i><span class="hide-menu"></span>Tables</a></li>
                        <li> <a class="waves-effect waves-dark" href="icon-fontawesome.html" aria-expanded="false"><i
                                    class="fa fa-smile-o"></i><span class="hide-menu"></span>Icon</a></li>
                        <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i
                                    class="fa fa-globe"></i><span class="hide-menu"></span>Map</a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i
                                    class="fa fa-bookmark-o"></i><span class="hide-menu"></span>Blank</a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i
                                    class="fa fa-question-circle"></i><span class="hide-menu"></span>404</a></li> -->
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>