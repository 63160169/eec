            <?php 
                $uid = $_GET["uid"];
                $user = get_user_by_id($con, $uid);
            ?> 
            <form id="reg_form" class="login100-form validate-form" action="./php/action-confirm-coordinator.php" method="POST">
					<span class="login100-form-title p-b-43">
						กำหนดรหัสผ่าน
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" value="<?php echo $user["user_username"]; ?>" name="username" readonly>
						<span class="focus-input100"></span>
						
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text"  name="national" >
						<span class="focus-input100"></span>
						<span class="label-input100">ID Card</span>
						
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="re-password" id="re-password">
						<span class="focus-input100"></span>
						<span class="label-input100">RE-Type Password</span>
					</div>
					
					<input type="hidden" name="uid" value="<?php echo $uid; ?>">

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" data-toggle="modal" data-target="#myModal">
							ยืนยัน
						</button>
					</div>
					
					
					
					
				</form>
				<!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
					
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">
							นโยบายคุ้มครองข้อมูลส่วนบุคคล
</h4>
						</div>
						<div class="modal-body">
						<p>
						ในการให้บริการเว็บไซต์แก่ท่าน EEC จะทำการเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน ดังนี้
						<ul>
						<li>
							1. ผู้ใช้งานที่ไม่ได้ทำการลงทะเบียนในเว็บไซต์ อาทิ ข้อมูลเกี่ยวกับการเข้า และเยี่ยมชมเว็บไซต์ของผู้ใช้งาน หน้าเพจที่ผู้ใช้งานได้เข้าเยี่ยมชม การค้นข้อมูลบนเว็บไซต์ของผู้ใช้งาน และการเข้าสู่ระบบบัญชีผู้ใช้งาน อันได้แก่ ชื่อโดเมน เซิร์ฟเวอร์ แอดเดรส รวมทั้งจัดเก็บ “คุกกี้” หมายเลขไอพีแอดเดรส ชนิดและรูปแบบเบราว์เซอร์ หน้าเพจอ้างอิง/ออก ระบบปฏิบัติการ การประทับวันที่/เวลา และ ข้อมูลเส้นทางการคลิก (clickstream data) ในบันทึกข้อมูลจราจรคอมพิวเตอร์ (log files) (“ข้อมูลส่วนบุคคลที่เก็บโดยอัตโนมัติ”)
							<br> 
						</li>
						<li>
							2. ผู้ใช้งานที่ลงทะเบียน นอกเหนือไปจากข้อมูลส่วนบุคคลตามที่ได้ระบุไว้ในข้อ 1 ข้างต้นแล้วนั้น EEC จะเก็บรวบรวมข้อมูลส่วนบุคคลที่ใช้ระบุตัวตนของท่านซึ่งรวมถึงชื่อ นามสกุล อายุ เพศ วันเดือนปีเกิด สัญชาติ เลขประจำตัวประชาชน เลขหนังสือเดินทาง ที่อยู่ ประเทศที่อาศัยอยู่ในปัจจุบัน อีเมล หมายเลขโทรศัพท์ หมายเลขโทรศัพท์มือถือ ระดับการศึกษา ประวัติการศึกษา ประสบการณ์การทำงาน เงินเดือน รูปถ่าย ชื่อบัญชีผู้ใช้งาน (Username) รหัสผ่าน (Password) รวมถึงข้อมูลส่วนบุคคลอื่นใดที่ท่านอาจได้ให้ไว้ในเรซูเม่ และ/หรือ EEC โปรไฟล์ของท่าน
							<br>
						</li>
						<li>
							3. ข้อมูลส่วนบุคคลที่มีความอ่อนไหว EEC มิได้มีเจตนาที่จะประมวลผล หรือเก็บรักษาข้อมูลส่วนบุคคลที่มีความอ่อนไหวของท่านแต่อย่างใด หากท่านไม่ประสงค์จะเปิดเผยข้อมูลดังกล่าวแก่บุคคลอื่นใด รวมถึงผู้ลงโฆษณา โปรดตรวจสอบข้อมูลที่ท่านจะอัปโหลดเข้าสู่ระบบเว็บไซต์ของ EEC ให้ถี่ถ้วน กรณีที่ท่านประสงค์จะอัปโหลด หรือเปิดเผยข้อมูลส่วนบุคคลที่มีความอ่อนไหวในระบบเว็บไซต์ และ/หรือโปรไฟล์ของท่าน EEC จะเก็บข้อมูลดังกล่าวเฉพาะเมื่อท่านได้ให้ความยินยอมโดยชัดแจ้ง (ตามวิธีที่กำหนดไว้ในพ.ร.บ.คุ้มครองข้อมูลส่วนบุคคล) ในการเปิดเผยข้อมูลดังกล่าวแล้ว เว้นแต่กำหนดไว้ในกฎหมายข้อมูลส่วนบุคคลไว้เป็นอย่างอื่น
							<br>
						</li>
						</ul>
						
						</p>
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-primary" onclick = "agree()" >ยอมรับ</button>
						</div>
					</div>
					
					</div>
				</div>
				<script> 
					function agree(){
						var frm = document.getElementById("reg_form"); 
						frm.submit(); 
					}
			    </script>