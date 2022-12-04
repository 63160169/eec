                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">รายการบัญชีผู้ใช้</h2>
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
                                    <a href="?content=create-user">
                                        <button class="btn btn-success btn-lg"> สร้างบัญชีผู้ใช้ <i class="fas fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                            <br>
                       
                                <table class="display" id="center_list"> 
                                      <thead>
                                          <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th>ชื่อ-นามสกุล</th> 
                                            <th>ประเภทบัญชี</th> 
                                            <th>สถานะ</th> 
                                            <th>รายละเอียด</th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php  
                                            $sql = "SELECT * FROM eec_user WHERE 1"; 
                                            $entries = mysqli_query($con, $sql); 
                                            $n = 1; 
                                            while($entry = mysqli_fetch_array($entries)){  
                                          ?> 

                                                <tr> 
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $entry["user_username"]; ?></td>
                                                    <td><?php echo $entry["user_firstname"]. " ". $entry["user_lastname"]; ?></td>
                                                    <td>
                                                        <?php echo $entry["type_id"]; ?></td>
                                                    <td><?php echo $entry["user_status"]; ?></td>
                                                    <td>
                                                        <a  href="?content=user-profile&uid=<?php echo $entry["user_id"]; ?>">
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