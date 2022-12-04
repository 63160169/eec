<?php
                    $cen_id = $_GET["cenid"];
                    $sql = "SELECT * FROM eec_training_center NATURAL JOIN eec_training_institute NATURAL JOIN eec_institute WHERE cen_id = '$cen_id'";  
                    $obj = mysqli_query($con, $sql);
                    $res = mysqli_fetch_array($obj); 

                    $user = get_user_by_id($con, $res["cen_user_id"]);
                ?> 
                <div class="row page-titles">
                    <div class="col-md-2 align-self-center">
                        <h1 class="text-themecolor">รายละเอียดศูนย์อบรม</h1>
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
                                        <h2>ศูนย์อบรม</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                           <form method = "POST" action="./php/action-create-training-center.php" id="cen-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อศูนย์อบรม</b><label style="color:red;">*</label></label>
                                       
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> สถานศึกษาผู้รับผิดชอบ</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $res["ins_name_th"]; ?>" readonly>
                                    </div>
                                    <div class="row">
                                <div class="col-md-12">
                                        <label><b> ผู้ดูแล/ประสานงานประจำสถาบันการศึกษา</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $user["user_firstname"]." ".$user["user_lastname"]; ?>" readonly>
                                    </div>           
                                </div>
                                <br>
                                
                               
                                <br>
                                </div>
                                <br> 
                                
                                
                               
                                               
                            </div><!-- End row --> 
                            </form>
                         </div>
                        
                    </div>
                    <!-- Column -->
                </div>

    