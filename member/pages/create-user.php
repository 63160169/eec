<?php
                    $institutes = get_institute($con);  
                ?> 
                <div class="row page-titles">
                    <div class="col-md-2 align-self-center">
                        <h1 class="text-themecolor">สร้างบัญชีผู้ใช้</h1>
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
                                        <h2>บัญชีผู้ใช้</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                           <form action = "./php/action-create-user.php" method="POST" id="create_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> อีเมล์</b><label style="color:red;">*</label></label>
                                        <input type="text" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ประเภทบัญชี</b><label style="color:red;">*</label></label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="-1"> -- กรุณาระบุ -- </option>
                                            <option value="5"> ผู้ใช้ทั่วไป </option>
                                            <option value="1"> ผู้ดูแลระบ </option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                
                                
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-lg btn-primary" onclick="confirm_form('create_form','ยืนยันสร้างบัญชีผู้ใช้')">สร้างบัญชี</button>
                                    </div>  
                                    <div class="col-md-3">
                                    
                                    </div>                                   
                                </div>
                                               
                            </div><!-- End row --> 
                            </form>
                         </div>
                        
                    </div>
                    <!-- Column -->
                </div>

    