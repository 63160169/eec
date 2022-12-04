 
                <?php 
                    $cid = $_GET["cid"];
                    $data = mysqli_fetch_array(get_general_data($con,'`eec_form_eb01` Natural join `eec_training_institute` Natural join `eec_institute` Natural join `eec_form_eb02`', "eb01_id=$cid")); 
                ?> 
                <div class="row page-titles">
                    <div class="col-md-2 align-self-center">
                        <h1 class="text-themecolor">รายละเอียด</h1>
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
                                        <h2><?php echo $data["eb01_title"]; ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                           <form method="POST" action="./php/action-update-course.php" id="course">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> ชื่อหลักสูตร</b><label style="color:red;">*</label></label>
                                        <input type="text" name="title" id="title"  class="form-control" value="<?php echo $data['eb01_title'] ?>" disabled>
                                    </div>
                                </div>
                                <hr class="secBreak">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> อุตสาหกรรมเป้าหมาย</b><label style="color:red;">*</label></label>
                                        <?php 
                                            $tarall = array();
                                            $tarobj = get_general_data($con,'`eec_target_industry`');
                                            while($lrow = mysqli_fetch_array($tarobj)){
                                                $tarall[$lrow['tar_id']] = $lrow['tar_title'];
                                            }
                                        ?>
                                        <input type="text" name="title" id="title"  class="form-control" value="<?php echo $tarall[$data['eb01_target']]; ?>" disabled>

                                        <!-- <select name="indus" id="indus" class="form-control" disabled>
                                            <?php
                                                $sql = "SELECT * FROM eec_target_industry WHERE 1"; 
                                                $obj = mysqli_query($con, $sql); 
                                                while($row = mysqli_fetch_array($obj)){
                                            ?> 
                                                <option value = "<?php echo $row["tar_title"]; ?>" <?php if($row["tar_title"] == $data['eb01_target']){ echo "selected";} ?>><?php echo $row["tar_title"]; ?></option> 
                                            <?php } // End whilw ?> 
                                        </select> -->
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>Enroll Key</b><label style="color:red;">*</label></label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="text" name="enrollkey" id="enrollkey"  class="form-control"  value="<?php echo $data['eb02_enroll_key'] ?>" disabled>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" class="form-control btn btn-secondary" Value="Copy" onclick="myCopy(document.getElementById('enrollkey'))" readonly>
                                            </div>
                                            <script>   
                                                function myCopy(elem) {
                                                    var copyText = elem;
                                                    copyText.select();
                                                    copyText.setSelectionRange(0, 99999); 
                                                    navigator.clipboard.writeText(copyText.value);
                                                    alert("Copied Enroll Key: " + copyText.value);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label><b> ปีงบประมาณ</b><label style="color:red;">*</label></label>
                                        <select name="year" id="year" class="form-control">
                                            <option value="2563" <?php if($data["course_year"] == '2563'){ echo "selected";}?> >2563</option> 
                                            <option value="2564" <?php if($data["course_year"] == '2564'){ echo "selected";}?>>2564</option> 
                                            <option value="2565" <?php if($data["course_year"] == '2565'){ echo "selected";}?>>2565</option> 
                                            <option value="2566" <?php if($data["course_year"] == '2566'){ echo "selected";}?>>2566</option> 
                                        </select>
                                    </div> -->
                                </div>
                                <hr class="secBreak">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label><b> สถาบันที่จัดอบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="institute" id="institute"  class="form-control"  value="<?php echo $data['ins_name_th'] ?>" disabled>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label><b> ศูนย์อบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="center" id="center"  class="form-control"  value="<?php echo $data['cen_name'] ?>" disabled>
                                    </div> -->
                                </div>
                                <hr class="secBreak">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b> ระยะเวลา</b><label style="color:red;">*</label></label>
                                        <input type="text" name="credit" id="credit"  class="form-control"  value="<?php echo $data['eb01_period'] ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b> รหัสคอร์สอบรม</b><label style="color:red;">*</label></label>
                                        <input type="text" name="course_id" id="course_id"  class="form-control"  value="<?php echo $data['eb01_course_id'] ?>" disabled>
                                    </div>
                                </div>
                                <hr class="secBreak">
                             
                               
                            
                                
                                               
                           
                            </form>
                         </div>
                        
                    </div>
                    <!-- Column -->
                </div>
                                                </div>                              

                <div class="row">
                   
             
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-header bg-info">
                                <div class="row">
                                    <div class="col-md-12 align-center text-white">
                                        <h2>รายชื่อผู้เข้าอบรม</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <table class="display" id="participant_list"> 
                                        <thead>
                                            <tr>
                                                <th>ลำดับที่</th>
                                                <th>ชื่อ</th>
                                                <th>นามสกุล</th> 
                                                <th>สถานที่ทำงาน</th> 
                                                <th>สภานะการเข้าอบรม</th>
                                                <th>คะแนน</th>
                                                <th>บันทึก</th>
                                                
                                            
                                            </tr>
                                        </thead>
                                    <form action = "./php/action-update-score.php" method="POST" id="score_form" name="score_form">    
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM eec_enrollment_eb01_user NATURAL JOIN eec_user NATURAL JOIN eec_form_eb01 WHERE eb01_id = $cid ORDER BY enr_time ASC"; 
                                                $obj = mysqli_query($con, $sql); 
                                                $savetoggle = 0;
                                                $n = 1;
                                                while($row = mysqli_fetch_array($obj)){
                                                    // print_r($row);
                                            ?> 
                                                <tr>
                                                    <!-- <input form="score_form" type="text" name="enrid[<?php echo $n;?>][]" id="score" class="form-control" min="0" max="100" step="1" value="100">  -->
                                                    <td><?php echo $n; ?></td> 
                                                    <td><?php echo $row["user_firstname"]; ?></td>
                                                    <td><?php echo $row["user_lastname"]; ?></td>
                                                    <td><?php echo $row["user_workplace"]; ?></td>
                                                    <td>
                                                        <input form="score_form" type="radio" name="data[<?php echo $row["enr_id"];?>][enr_status]" id="status" value="2" <?php if($row["enr_status"]==2||$row["enr_status"]==1)echo 'checked';?> onchange="statonchange(<?php echo $n;?>);"> ผ่าน
                                                        <input form="score_form" type="radio" name="data[<?php echo $row["enr_id"];?>][enr_status]" id="status" value="3" <?php if($row["enr_status"]==3)echo 'checked';?> onchange="statonchange(<?php echo $n;?>);"> ไม่ผ่าน
                                                    </td>
                                                    <td>
                                                        <input form="score_form" type="number" name="data[<?php echo $row["enr_id"];?>][enr_score]" id="score" class="form-control" min="0" max="100" step="1" value="<?php if(is_null($row["enr_score"])){echo "100";}else{echo $row["enr_score"];}?>" onchange="statonchange(<?php echo $n;?>);"> 
                                                    </td>
                                                    <td id="save_stat<?php echo $n;?>"><i class="fa fa-exclamation-circle" style="font-size:18px;color:red" <?php if(!is_null($row["enr_score"])){echo "hidden";}?>></i><i class="fa fa-check-circle-o" style="font-size:18px;color:green" <?php if(is_null($row["enr_score"])){$savetoggle = 1;echo "hidden";}?>></i></td>
                                                </tr> 
                                            <?php  $n++; } ?> 
                                        </tbody> 
                                        </form>
                                    </table>
                                    <script>
                                        function statonchange(id){
                                            document.getElementById('save_stat'+id).childNodes[0].hidden=false;
                                            document.getElementById('save_stat'+id).childNodes[1].hidden=true;
                                            document.getElementById('btnSubmit').disabled=false;
                                        }
                                    </script>
                                <div class="row">
                                    <button type="submit" class="btn btn-lg btn-primary" id="btnSubmit" form="score_form" <?php if($savetoggle == 0){echo "disabled";}?>>บันทึกผลการอบรม</button>
                                </div>
                            </div>
                        
                    </div>
                    <!-- Column -->
                </div>
               
             </div>

             <script> 
                    $(document).ready( function () {
                        $('#participant_list').DataTable();
                    } );
                </script>