

<!-- Modal -->
<div class="modal fade" id="edit_personal_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h3 class="modal-title text-white" id="exampleModalLabel">แก้ไขข้อมูล</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST" action="./php/action-update-user-data.php" id="form_edit">
            <div class="row">
              <div class="col-md-2">
                
              </div>
              <div class="col-md-12">
                  <label class="text-right"><b>คำนำหน้าชื่อ<font color="red">*</font> </b></label>
                  <select name="prefix" id="prefix" class="form-control">
                      <option value="นาย" <?php if($user['user_prefix'] == "นาย"){ echo "selected";} ?>> นาย </option>
                      <option value="นาง" <?php if($user['user_prefix'] == "นาง"){ echo "selected";} ?>> นาง </option>
                      <option value="นางสาว" <?php if($user['user_prefix'] == "นางสาว"){ echo "selected";} ?>> นางสาว </option>
                  </select>
            </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>ชื่อจริง<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_firstname']; ?>" class="form-control" name="nameth" id="nameth" required>
              </div>   
              <div class="col-md-6">
                <label class="text-right"><b>นามสกุล<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_lastname']; ?>" class="form-control" name="lastnameth" id="lastnameth">
              </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>Firstname<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_firstname_en']; ?>" class="form-control" name="nameen" id="nameen">
              </div>   
              <div class="col-md-6">
                <label class="text-right"><b>Lastname<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_lastname_en']; ?>" class="form-control" name="lastnameen" id="lastnameen">
              </div>
          </div> <!-- End row --> 
          <br> 
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>สถานะสมรส<font color="red">*</font></b></label>
                  <select name="mariage" id="mariage" class="form-control" name="gender" id="gender">
                      <option value="โสด" <?php if($user['user_mariage'] == "โสด"){ echo "selected";} ?>> โสด </option>
                      <option value="แต่งงาน" <?php if($user['user_mariage'] == "แต่งงาน"){ echo "selected";} ?>> แต่ง </option>
                      <option value="ไม่ระบุ" <?php if($user['user_mariage'] == "ไม่ระบุ"){ echo "selected";} ?>> ไม่ระบุ </option>
                  </select>
              </div>   
              <div class="col-md-6">
                <label class="text-right"><b>บัตรประจำตัวประชาชน <font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_id_card']; ?>" class="form-control" name="idcard" id="idcard">
              </div>
          </div> <!-- End row --> 
          <br> 
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>เพศ<font color="red">*</font></b></label>
                  <select name="gender" id="gender" class="form-control" name="gender" id="gender">
                      <option value="ชาย" <?php if($user['user_gender'] == "ชาย"){ echo "selected";} ?>> ชาย </option>
                      <option value="หญิง" <?php if($user['user_gender'] == "หญิง"){ echo "selected";} ?>> หญิง </option>
                      <option value="ไม่ระบุ" <?php if($user['user_gender'] == "ไม่ระบุ"){ echo "selected";} ?>> ไม่ระบุ </option>
                  </select>
              </div>   
              <div class="col-md-6">
                <label class="text-right"><b>สัญชาติ <font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_nationality']; ?>" class="form-control" name="nationality" id="nationality">
              </div>
          </div> <!-- End row --> 
          <br> 
          <div class="row">
              <div class="col-md-12">
                <label class="text-right"><b>วันเกิด<font color="red">*</font></b></label>
                  <input id="my_date" value = "<?php echo $user['user_birth']; ?>"  class="form-control" name="birth" id="birth" />
              </div>   
          </div> <!-- End row --> 
          <br> 
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>เบอร์โทร<font color="red">*</font></b></label>
                  <input type="text" value = "<?php echo $user['user_tel']; ?>"   class="form-control"  name="tel" id="tel"/>
              </div>    
          </div> <!-- End row --> 
          <br> 
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>ตำบล / แขวง <font color="red">*</font></b></label>
                  <input type="text" value = "<?php echo $user['user_district']; ?>"   class="form-control"  name="district" id="district"/>
              </div>    
              <div class="col-md-6">
                <label class="text-right"><b>อำเภอ / เขต <font color="red">*</font></b></label>
                  <input type="text" value = "<?php echo $user['user_amphoe']; ?>"   class="form-control"  name="amphoe" id="amphoe"/>
              </div>    
          </div> <!-- End row --> 
          <br> 
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>จังหวัด <font color="red">*</font></b></label>
                  <input type="text" value = "<?php echo $user['user_province']; ?>"   class="form-control"  name="province" id="province"/>
              </div>    
              <div class="col-md-6">
                <label class="text-right"><b>รหัสไปรษณีย์<font color="red">*</font></b></label>
                  <input type="text" value = "<?php echo $user['user_amphoe']; ?>"   class="form-control"  name="zipcode" id="zipcode"/>
              </div>    
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-12">
                <label class="text-right"><b>ที่อยู่ <font color="red">*</font></b></label>
                  <input type="text"  value = "<?php  echo $user['user_address'];  ?>" class="form-control"  name="address" id="address"/>
              </div>   
          </div> <!-- End row --> 
          <br>
          
          <div class="row">
              <div class="col-md-12">
                <label class="text-right"><b>สถานที่ทำงาน<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_workplace']; ?>" class="form-control" name="workplace" id="workplace">
              </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-6">
                <label class="text-right"><b>ตำแหน่งงาน<font color="red">*</font></b></label>
                <input type="text" value = "<?php echo $user['user_position']; ?>" class="form-control" name="position" id="position">
              </div>   
              <div class="col-md-6">
                <label class="text-right"><b>ช่วงเงินเดือน <font color="red">*</font></b></label>
                <select name="salary" id="salary" class="form-control">
                  <option value="น้อยกว่า 10,000">น้อยกว่า 10,000</option>
                  <option value="10,000 - 14,999">10,000 - 14,999</option>
                  <option value="15,000 - 19,999">"15,000 - 19,999</option>
                  <option value="20,000 - 24,999">20,000 - 24,999</option>
                  <option value="25,000 - 29,999">25,000 - 29,999</option>
                  <option value="30,000 - 34,999">30,000 - 34,999</option>
                  <option value="35,000 - 39,999">35,000 - 39,999</option>
                  <option value="มากกว่่า 40,000">มากกว่่า 40,000</option>
              </select>
              </div>
          </div> <!-- End row --> 
        
      </div>
      <input type="hidden" value="<?php echo $user['user_id'] ?>" name="uid">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" onclick="confirm_form('form_edit', 'ยืนยันการแก้ไขข้อมูล')" class="btn btn-primary">บันทึก</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
       //กำหนดให้ textbox ที่มี id เท่ากับ my_date เป็นตัวเลือกแบบ ปฎิทิน
        picker_date(document.getElementById("my_date"),{year_range:"-45:+1"});
        /*{year_range:"-12:+10"} คือ กำหนดตัวเลือกปฎิทินให้ แสดงปี ย้อนหลัง 12 ปี และ ไปข้างหน้า 10 ปี*/
      
</script>
