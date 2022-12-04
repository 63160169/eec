                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-header bg-primary">
                          
                            </div>
                            <div class="card-body">
                                    <?php
                                        if($user["user_image"] == "" || $user["user_image"] == NULL){
                                            $user_image = "./images/avatar.png";
                                        } 
                                        else{
                                            $user_image = "./php/uploads/profile/".$user["user_image"];
                                        }
                                    ?> 
                                    <center class="m-t-30"> <img src="<?php echo $user_image; ?>" class="img-circle"width="150" />
                                        <h4 class="card-title m-t-10"><?php echo $user["user_firstname"]. " " .$user["user_lastname"]  ?></h4>
                                        <h6 class="card-subtitle"><?php echo $user["user_username"]; ?> </h6>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#update_picture">เปลี่ยนรูปประจำตัว</button> 
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#change_password">เปลี่ยนรหัสผ่าน</button> 
                                        
                                        
                                    </center>
                                </div>
                        </div>
                    </div>

                  