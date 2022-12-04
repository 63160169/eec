

<!-- Modal -->
<div class="modal fade" id="add_language" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h3 class="modal-title text-white" id="exampleModalLabel">เพิ่มข้อมูลทักษะด้านภาษา</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST" action="./php/action-add-language.php" id="form_add">
            <div class="row">
              <div class="col-md-2">
                
              </div>
              <div class="col-md-12">
                  <label class="text-right"><b>ภาษา<font color="red">*</font> </b></label>
                  <input type="text" class="form-control" name="skill" id="skill" required> 
            </div>
          </div> <!-- End row --> 
          <br>
          
 
      </div>
      <input type="hidden" value="<?php echo $user['user_id'] ?>" name="uid">
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
