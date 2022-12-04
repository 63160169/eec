				
				<!-- <?php 
					// $err = $_GET['err'];
					$err_mess = ""; 
					if($err == '0'){
						$err_mess = "<font color='red'> ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</font>";
					} 
					else if($err == '1'){
						$err_mess = "<font color='red'> กรุณายืนยันอีเมล์ก่อนเข้าใช้งาน</font>";
					} 
				?>  -->
				<form class="login100-form validate-form" action="./php/action-member-login.php" method="POST">
					<span class="login100-form-title p-b-43">
						<label style="color:blue;">ลงชื่อเข้าใช้</label>
						<br>
						<!-- <?php 
							echo $err_mess;
						?> -->
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">เลขประจำตัวประชาชน</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">รหัสผ่าน</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
						<div>
							<a href="#" class="txt1">
								ลืมรหัสผ่าน?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							ลงชื่อเข้าใช้
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
                            <a href="?content=register" class="txt1">
							    สมัครสมาชิก
                            </a>
						</span>
					</div>

					
				</form> 