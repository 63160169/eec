          <form class="login100-form validate-form" >
					<?php
                        $uid = $_GET["uid"]; 
                        $conf = confirm_email_user($con, $uid);  
                    ?> 
                    <span class="login100-form-title p-b-43">
						ยืนยันอีเมล์เสร็จสมบูรณ์
					</span>
					
					<img src="https://i.pinimg.com/474x/5c/6a/db/5c6adbec93947a0be97272a5b44cfaf8.jpg">
					
			

					<div class="container-login100-form-btn">
                         <a href="?content=login">
						<button type="submit" class="login100-form-btn">
							ลงชื่อเช้าใช้
						</button>
                        </a>
					</div>
					
				
					
				</form>