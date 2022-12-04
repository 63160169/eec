    <?php 
        $id = $_GET["hosid"];
        $res = get_hospital_data_by_id($con, $id); 
     ?> 
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">อัปเดตข้อมูลการใช้เตียง</h4>
        </div>             
    </div>
    <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">รายละเอียด</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table"> 
                                            <tr> 
                                                <th style="text-align:right;"><b> ชื่อโรงพยาบาล : </b></th>
                                                <td style="text-align:left;"> <?php echo $res["hos_agency"]; ?> </td>
                                            </tr>
                                            <tr> 
                                                <th style="text-align:right;"><b> หน่วยงาน : </b></th>
                                                <td style="text-align:left;"> <?php echo $res["hos_department"]; ?> </td>
                                            </tr>
                                            <tr> 
                                                <th style="text-align:right;"><b> สังกัด : </b></th>
                                                <td style="text-align:left;"> <?php echo $res["hos_ministry"]; ?> </td>
                                            </tr>
                                            <tr> 
                                                <th style="text-align:right;"><b> ประเภท : </b></th>
                                                <td style="text-align:left;"> <?php echo $res["htype_name"]; ?> </td>
                                            </tr>
                                            <tr> 
                                                <th style="text-align:right;"><b> ที่อยู่ : </b></th>
                                                <td style="text-align:left;"> <?php echo $res["hos_address"]; ?> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-lg-12">
                                        <div class="card bg-primary text-white">
                                            <div class="card-body">
                                                <h1><?php echo $res["hos_capacity"];?> </h1>
                                                <h3>จำนวนเตียงทั้งหมด</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12"> 
                                        <div class="card bg-success text-white">
                                            <div class="card-body">
                                                <h1><?php echo $res["hos_capacity"] - $res["hos_operating"];?> </h1>
                                                <h3>จำนวนเตียงว่าง</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12"> 
                                        <div class="card bg-warning text-white">
                                            <div class="card-body">
                                                <h1><?php echo $res["hos_operating"];?> </h1>
                                                <h3>จำนวนเตียงที่ถูกใช้อยู่</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">จำนวนเตียงทั้งหมดของโรงพยาบาล</label>
                                        <div class="col-md-12">
                                            <input type="text" name="total" id="total" class="form-control" value="<?php echo $res["hos_capacity"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">จำนวนเตียงว่าง</label>
                                        <div class="col-md-12">
                                            <input type="text" name="available" total = "available" class="form-control" value="<?php echo $res["hos_capacity"] -  $res["hos_operating"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">จำนวนเตียงที่ใช้อยู่</label>
                                        <div class="col-md-12">
                                            <input type="text" name="operating" total = "operating" class="form-control" value="<?php echo $res["hos_operating"]; ?>">
                                        </div>
                                    </div>
                                    
                                </form>
                                <button class="btn btn-success">อัปเดต</button>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->