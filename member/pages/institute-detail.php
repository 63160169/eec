<?php
                $tins = $_GET["tins"];
                $title = get_institute_name($con, $tins); 
                $res = get_institute_by_id($con, $tins);
                $user = get_user_by_id($con, $res["user_id"]);
            


                ?> 
                <div class="row page-titles">
                    <div class="col-md-2 align-self-center">
                        <h1 class="text-themecolor">สร้างสถานศึกษาสำหรับศูนย์อบรม</h1>
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
                                        <h2>สถาบันการศึกษา</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                           <form method = "POST" action = "./php/action-create-training-institute.php" id="create_institute_form">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> สถานศึกษา</b><label style="color:red;">*</label></label>
                                        <input type="text" name="id" id="id" class="form-control" value="<?php echo $title; ?>"  readonly>
                                    </div>
                                   
                                </div>
                                <br> 
                                <div class="row">
                                <div class="col-md-12">
                                        <label><b> หมายเลข </b><label style="color:red;">*</label></label>
                                        <input type="text" name="id" id="id" class="form-control" value="<?php echo $res["tins_number"]; ?>"  readonly>
                                    </div>           
                                </div>
                                <br>
                                <div class="row">
                                <div class="col-md-12">
                                        <label><b> ผู้ดูแล/ประสานงานประจำสถาบันการศึกษา</b><label style="color:red;">*</label></label>
                                        <input type="text" name="id" id="id" class="form-control" value="<?php echo $user["user_firstname"].' '.$user["user_lastname"] ?>"  readonly>  
                                </div>
                                <br>
                                
                                        
                             
                                <br>
                               
                                               
                            </div><!-- End row --> 
                            </form>
                         </div>
                        
                    </div>
                    <!-- Column -->
                </div>


                

    