<?php 
  $institutes = get_institute($con);
  $degree = get_degree($con);
?> 

<!-- Modal -->
<div class="modal fade" id="update_education_data<?php echo $row['edu_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h3 class="modal-title text-white" id="exampleModalLabel">เพิ่มข้อมูลการศึกษา</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST" action="./php/action-update-education-data.php" id="form_update<?php echo $row['edu_id']; ?>">
            <div class="row">
              <div class="col-md-2">
                
              </div>
              <div class="col-md-12">
                  <label class="text-right"><b>ระดับการศึกษา<font color="red">*</font> </b></label>
                  <select name="degree" id="degree" class="form-control">
                      <?php while($deg = mysqli_fetch_array($degree)){ ?>
                      <option value="<?php echo $deg["deg_id"]; ?> " <?php if($row['deg_id'] == $deg["deg_id"]){echo 'selected';} ?>> <?php echo $deg["deg_title"]; ?> </option>
                      <?php } // End degree's while ?>
                      
                  </select>
            </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-12">
                  <label class="text-right"><b>สถาบันการศึกษา<font color="red">*</font> </b></label>
                  <select name="institute" id="institute" class="form-control selectpicker" data-live-search="true" >
                      <?php while($ins = mysqli_fetch_array($institutes)){ 
                          $uni = $ins["ins_name_th"]; 
                          if($ins["ins_campus"] != '-'){
                            $uni = $uni." ".$ins["ins_campus"];
                          }
                        ?>
                      <option value="<?php echo $ins["ins_id"]; ?> " <?php if($row['ins_id'] == $ins["ins_id"]){echo 'selected';} ?>> <?php echo $uni; ?> </option>
                      <?php } // End degree's while ?>
                      
                  </select>
            </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>คณะ/สำนักวิชา<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $row["edu_faculty"]; ?>" class="form-control" name="faculty" id="faculty" required>
              </div>   
              <div class="col-md-6">
                <label class="text-right"><b>ภาควิชา/สาขาวิชา<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $row["edu_major"]; ?>" class="form-control" name="major" id="major">
              </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-12">
                <label class="text-right"><b>ปีที่จบการศึกษา<font color="red">*</font></b></label>
                <select name="grad_date" id="" class="form-control">
                  <?php 
                    $t = time(); 
                    $year = date('Y', $t); 
                    $year = $year + 543; 
                    $lower = $year - 45; 
                    while($year > $lower){
                    ?> 
                        <option value="<?php echo $year; ?>" <?php if($row['edu_grad'] == $year){echo 'selected';} ?>>  <?php echo $year; ?></option>
                    <?php 
                      $year--;
                    }
                  ?> 

                </select>
               
              </div>   
              
          </div> <!-- End row --> 
 
      </div>
      <input type="hidden" value="<?php echo $row['edu_id'] ?>" name="eid">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
       //กำหนดให้ textbox ที่มี id เท่ากับ my_date เป็นตัวเลือกแบบ ปฎิทิน
        //picker_date(document.getElementById("grad_date"),{year_range:"-45:+1"});
        /*{year_range:"-12:+10"} คือ กำหนดตัวเลือกปฎิทินให้ แสดงปี ย้อนหลัง 12 ปี และ ไปข้างหน้า 10 ปี*/
</script>
