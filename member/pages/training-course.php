                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                        <h2 class="text-themecolor">รายการคอร์สอบรม</h2>
                    </div>
                   
                </div>
                <?php if($_SESSION["type"] == 1){ ?>
                <div class="row">
                    <?php display_form_status($con,1,2) ?>
                    <?php display_form_status($con,2,2) ?>
                    <?php display_form_status($con,3,2) ?>
                </div>
                <?php } ?>
                <br>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h2>รายการ</h2>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <!-- <a href="?content=create-course">
                                        <button class="btn btn-success btn-lg"> เพิ่มคอร์สอบรม <i class="fa fa-plus"></i></button>
                                    </a> -->
                                    <a href="?content=create-course-file">
                                        <button class="btn btn-warning btn-lg"> เพิ่มคอร์สอบรม (Excel) <i class="fa fa-plus"></i></button>
                                    </a>
                                </div>
                                
                            </div>
                            <br>
                       
                                <table class="display" id="course_list"> 
                                      <thead>
                                          <tr>
                                            <th>ลำดับที่</th>
                                            <th>ขื่อหลักสูตร</th>
                                            <!-- <th>ศูนย์อบรม</th>  -->
                                            <th>สถาบันอบรม</th> 
                                            <th>รหัสโครงการ</th> 
                                            <th>Enroll Key</th> 
                                            <th>สถานะ</th>
                                            <th>รายละเอียด  </th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php  
                                           
                                            $entries = get_general_data($con,'`eec_form_eb01` Natural join `eec_training_institute` Natural join `eec_institute` Natural join `eec_form_eb02`',"`eb02_status` = 3"); 
                                            $n = 1; 
                                            while($entry = mysqli_fetch_array($entries)){  
                                          ?> 

                                                <tr> 
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $entry["eb01_title"]; ?></td>
                                                    <!-- <td><?php echo $entry["cen_name"]; ?></td> -->
                                                    <td><?php echo $entry["ins_name_th"]; ?></td>
                                                    <td><?php echo $entry["eb01_course_id"]; ?></td>
                                                    <td><?php echo $entry["eb02_enroll_key"]; ?></td>
                                                    <td>

                                                        <?php 
                                                        display_form_status($con,$entry["eb02_status"],1); 
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="?content=course-detail&cid=<?php echo $entry["eb01_id"]; ?>">
                                                            <button type="button" class="btn btn-info btn-lg">รายละเอียด</button>
                                                        </a>
                                                    </td>
                                                </tr>

                                          <?php
                                            $n++; //Iteration count 
                                            } 
                                         ?> 
                                      </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

                <script> 
                    $(document).ready( function () {
                        $('#course_list').DataTable();
                    } );
                </script>