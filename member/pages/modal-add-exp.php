

<!-- Modal -->
<div class="modal fade" id="add_exp_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h3 class="modal-title text-white" id="exampleModalLabel">เพิ่มข้อมูลการทำงาน</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method = "POST" action="./php/action-add-exp-data.php" id="form_add_exp">
            <div class="row">
              
              <div class="col-md-12">
                  <label class="text-right"><b>อาชีพ<font color="red">*</font> </b></label>
                  <input type="text" class="form-control" name="job_title" id="job_title">
            </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-12">
                <label class="text-right"><b>สถานที่ทำงาน<font color="red">*</font> </b></label>
                <input type="text" class="form-control" name="work_place" id="work_place"> 
            </div>
          </div> <!-- End row --> 
          <br>
          <div class="row">
          <div class="col-md-12">
           <label class="text-right"><b>ช่วงเงินเดือน<font color="red">*</font> </b></label>
              <select name="salary" id="salary" class="form-control">
                <option value="น้อยกว่า 10,000">น้อยกว่า 10,000</option>
                <option value="10,000 - 14,999">10,000 - 14,999</option>
                <option value="15,000 - 19,999">"15,000 - 19,999</option>
                <option value="20,000 - 14,999">20,000 - 14,999</option>
                <option value="25,000 - 29,999">25,000 - 29,999</option>
                <option value="30,000 - 34,999">30,000 - 34,999</option>
                <option value="35,000 - 39,999">35,000 - 39,999</option>
                <option value="มากกว่่า 40,000">มากกว่่า 40,000</option>
              </select>
            </div> 
          </div> <!-- End row --> 
          <br>
          <div class="row">
              <div class="col-md-12">
                <label class="text-right"><b>ปีที่เข้าทำงาน<font color="red">*</font></b></label>
                <input id="work_date" class="form-control" name="work_date" required>
              </div>   
              
          </div> <!-- End row --> 
 
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
        picker_date(document.getElementById("work_date"),{year_range:"-45:+1"});
        /*{year_range:"-12:+10"} คือ กำหนดตัวเลือกปฎิทินให้ แสดงปี ย้อนหลัง 12 ปี และ ไปข้างหน้า 10 ปี*/
</script>
