                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">รายการศูนย์อบรม</h2>
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
                                    <a href="?content=create-training-center">
                                        <button class="btn btn-success btn-lg"> สร้างศูนย์อบรม <i class="fas fa-plus"></i></button>
                                    </a>
                                </div>
                            </div>
                            <br>
                       
                                <table class="display" id="center_list"> 
                                      <thead>
                                          <tr>
                                            <th>ลำดับที่</th>
                                            <th>ศูนย์อบรม</th>
                                            <th>ผู้ดูแล</th> 
                                            <th>รายละเอียด  </th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php  
                                            $sql = "SELECT * FROM eec_training_center WHERE 1"; 
                                            $entries = mysqli_query($con, $sql); 
                                            $n = 1; 
                                            while($entry = mysqli_fetch_array($entries)){  
                                          ?> 

                                                <tr> 
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $entry["cen_name"]; ?></td>
                                                    <td><?php 
                                                    $user = get_user_by_id($con, $entry["cen_user_id"]);
                                                    echo $user["user_firstname"]." ".$user["user_lastname"]
                                                    
                                                    ?></td>
                                           
                                                  
                                                    <td>
                                                        <a href="?content=center-detail&cenid=<?php echo $entry["cen_id"]; ?>">
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