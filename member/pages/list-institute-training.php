                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">รายการสถานศึกษา</h2>
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
                                    <a href="?content=create-training-institute">
                                        <button class="btn btn-success btn-lg"> สร้างสถาบันการศึกษา <i class="fa fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                            <br>
                       
                                <table class="display" id="center_list"> 
                                      <thead>
                                          <tr>
                                            <th>ลำดับที่</th>
                                            <th>สถานศึกษา</th>
                                            <th>ผู้ดูแล</th> 
                                            <th>รายละเอียด</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php  
                                            
                                            $entries = get_training_institute($con); 
                                            $n = 1; 
                                            while($entry = mysqli_fetch_array($entries)){  
                                          ?> 

                                                <tr> 
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $entry["ins_name_th"]; ?></td>
                                                    <td><?php echo $entry["user_firstname"]." ".$entry["user_lastname"]; ?></td>
                                                    <td>
                                                        <a target = "ins-detail" href="?content=institute-detail&tins=<?php echo $entry["tins_id"];  ?>">
                                                            <button type="button" class="btn btn-info">รายละเอียด</button>
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
                        $('#center_list').DataTable();
                    } );
                </script>