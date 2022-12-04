                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">ขออนุมัติจัดอบรมระยะสั้นตามแนวทางอีอีซีโมเดล (EB-02)</h2>
                    </div>
                   
                </div>
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
                                    <a href="?content=request-eb02">
                                        <!-- <button class="btn btn-success btn-lg"> ขออนุมัติจัดอบรมระยะสั้นตามแนวทางอีอีซีโมเดล (EB-02) <i class="fa fa-plus"></i></button> -->
                                        <button class="btn btn-success btn-lg"> ขออนุมัติจัดอบรมระยะสั้น (EB-02) <i class="fa fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                            <br>
                       
                                <table class="display" id="course_list"> 
                                      <thead>
                                          <tr>
                                            <th>ลำดับที่</th>
                                            <th>ขื่อหลักสูตร</th>
                                            <th>สถานประกอบการที่เข้ารับการอบรม</th> 
                                            <th>วันที่จัดอบรม</th>
                                            <th>สถานะ</th>
                                            <th>รหัสเข้าอบรม</th>
                                            <th>รายละเอียด  </th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php  
                                            $entries = get_form_eb02($con, '');
                                         
                                            $n = 1; 
                                            while($entry = mysqli_fetch_array($entries)){  
                                          ?> 

                                                <tr> 
                                                
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $entry["eb01_title"]; ?></td>
                                                    <td><?php echo $entry["trainee_comp"]; ?></td>
                                                    <td><?php echo $entry["trainee_date"]; ?></td>
                                                    <td>

                                                        <?php 
                                                        display_form_status($con,$entry["eb02_status"],1); 
                                                        ?>
                                                    </td>
                                                    <td><?php echo $entry["eb02_enroll_key"]; ?></td> 
                                                    <td>
                                                        <a href="?content=form_eb02_detail&fid=<?php echo $entry["eb02_id"]; ?>">
                                                            <button type="button" class="btn btn-info btn-lg">รายละเอียด</button>
                                                        </a>
														<?php if($entry["eb02_status"]==3) { ?>
                                                        <a href="./php/print_eb02.php?fid=<?php echo $entry["eb02_id"]; ?>" target="_blank">
                                                            <button type="button" class="btn btn-primary btn-lg">พิมพ์</button>
                                                        </a>
														<?php } ?>
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