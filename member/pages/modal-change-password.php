 

<!-- Modal -->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h3 class="modal-title text-white" id="exampleModalLabel">เปลี่ยนรหัสผ่าน</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST" action="./php/action-change-password.php" id="form-pass" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                  <label class="text-right"><b>รหัสผ่านเดิม<font color="red">*</font> </b></label>
                  <input type="password" name="old" id="old" class="form-control" required> 
               
                </div> <!-- End row -->    
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                  <label class="text-right"><b>รหัสผ่านใหม่<font color="red">*</font> </b></label>
                 
                  <input type="password" name="new" id="new" class="form-control" required> 
                
                </div> <!-- End row -->    
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                  <label class="text-right"><b>ยืนยันรหัสผ่านใหม่<font color="red">*</font> </b></label>
               
                  <input type="password" name="new2" id="new2" class="form-control" required> 
                  <input type="hidden" value="<?php echo $user["user_id"]; ?>" name="uid">
                </div> <!-- End row -->    
            </div>
            <br>

        </div>
   
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
        picker_date(document.getElementById("grad_date"),{year_range:"-45:+1"});
        /*{year_range:"-12:+10"} คือ กำหนดตัวเลือกปฎิทินให้ แสดงปี ย้อนหลัง 12 ปี และ ไปข้างหน้า 10 ปี*/
</script>
