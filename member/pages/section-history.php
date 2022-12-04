<?php
    function get_enrolled_course($con, $uid){
        $sql = "SELECT * FROM eec_enrollment_eb01_user NATURAL JOIN eec_form_eb01 WHERE `user_id` = '$uid'"; 
        $queries = mysqli_query($con, $sql); 
        return $queries;
    }

    function display_enroll_status($status){
        $color = "";
        $text = "";
        if($status == 1){
            $color = "cyan";
            $text = "ลงทะเบียนแล้ว"; 
        }
        else if($status == 2){
            $color = "green";
            $text = "ผ่านการอบรม"; 
        }
        else if($status == 3){
            $color = "red";
            $text = "ไม่ผ่านการอบรม"; 
        }
        ?> 
        <div class="row">
            <div class="col-lg-12" style="background-color:<?php echo $color; ?>">
                <?php echo $text; ?>
            </div>
        </div>
        <?php
        
    }
?> 

    <div class="row">
		<div class="col-md-12">
	
        <table class="display" id="center_list"> 
                                      <thead>
                                          <tr>
                                            <th>ลำดับที่</th>
                                            <th>ชื่อหลักสูตร</th>
                                            <th>ศูนย์อบรม</th> 
                                            <th>สถานะ</th> 
                                          
                                           
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php  
                                            $entries = get_enrolled_course($con, $user["user_id"]);
                                            $n = 1; 
                                            while($entry = mysqli_fetch_array($entries)){
                                             $tins = get_institute_by_id($con, $entry["tins_id"]);
                                          ?> 

                                                <tr> 
                                                    <td><?php echo $n; ?></td>
                                                    <td><?php echo $entry["eb01_title"]; ?></td>
                                                    <td><?php echo $tins[""]; ?></td>
                                                    <td><?php display_enroll_status($entry["enr_status"]); ?></td>
                                                    
                                                   
                                                </tr>

                                          <?php
                                            $n++; //Iteration count 
                                            } 
                                         ?> 
                                      </tbody>
                                </table>
                                <script> 
                                    $(document).ready( function () {
                                        $('#center_list').DataTable();
                                    } );
                                </script>
				
		
		</div>
	</>
  
   