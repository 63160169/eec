<?php
require ("config.php");
$sql="SELECT * FROM select_test where course_id = $course_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$course_id = $row['course_id'];
$title = $row['title'];
$ins_name = $row['ins_name'];



// echo  "<script>
//         alert('hello');
//        ;
//         </script>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script>


</script>


</head>
<!-- <style>
#icon {
    font-size: 50px;
    color: #FF0000;
    background-color: #1B90D8 ;
}
</style> -->

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-12 align-self-center">
        <h2 class="text-themecolor">รายการหลักสูตรที่เลือก</h2>
    </div>

</div>

<!-- <?php if($_SESSION["type"] == 5 || $_SESSION["type"] == 1 ){ ?>
                <div class="row">
                    <?php display_form_status($con,1,2) ?>
                    <?php display_form_status($con,2,2) ?>
                    <?php display_form_status($con,3,2) ?>
                </div>
                <?php } ?> -->

<div align = "right">
      
        <a href ="?content=list-test"style="font-size:36px"><i class="fa fa-reply" aria-hidden="true" style= "font-size:36px;color:#1E8FD5">กลับ</i></a>


</div>
             
<br>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>รายการ</h2>
            </div>
            <form action="?content=list-test" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <!-- <a href="?content=request-eb01">
                                        <button class="btn btn-success btn-lg"> ยื่นขอรับรองหลักสูตร (EB-01) <i class="fa fa-plus"></i></button>
                                    </a> -->
                    </div>
                </div>
                <br>

                <table class="display" id="course_list">
                    <thead>
                        <tr align="center">
                            <th>ลำดับที่</th>
                            <th>รหัสโครงการ</th>
                            <th>ชื่อหลักสูตร</th>
                            <th>ศูนย์อบรม</th>
                            <th></th>
                            <!-- <th>รายละเอียด  </th> -->


                    </thead>
                    <tbody>
                        <?php  
                            $entries = get_form_eb01_all($con); 
                            $n = 1;
                            $s = 1; 
                            while($entry = mysqli_fetch_array($entries)){  
                            if ($entry["select_status"] == 1){?>
                        <tr align="center">
                            <td >
                                <?php echo $s; ?>
                            </td>
                            <td>
                                <?php $course_id1 = $entry["eb01_course_id"];?>
                                <?php echo $course_id1; ?>
                            </td>
                            <td>
                                
                                <?php $title1 = $entry["eb01_title"];?>
                                <?php echo $title1; ?>
                            </td>
                            <td>
                                <?php $ins_name1 = $entry["ins_name_th"];?>
                                <?php echo $entry["ins_name_th"]; ?>
                            </td>
                            <td>
                            <a href="./pages/delete_select.php?id=<?php echo $entry["eb01_id"];?>" type="submit"  class="btn-basic" name="select"  id="select">
                               <i aria-hidden="true" style="background-color:#E33F34; color:white;  border: 2px solid black;border-radius: 10px; padding: 3px; ">&ensp;ลบ&ensp;</i>
                            </a>
                            </td>
                            
                            
                        </tr>
                        <?php
                            $s++;
                                                            
                            // display_form_status($con,$entry["eb01_status"],1);
                            }
                            // display_form_status($con,$entry["eb01_status"],1); 
                                                        //echo generate_course_id($con,$entry["eb01_id"]); 
                            ?>                                
                        </tr>
                        </td>
                        <!-- <td>
                        <a href="?content=form_eb01_detail&fid=<?php echo $entry["eb01_id"]; ?>">
                        <button type="button" class="btn btn-info btn-lg">รายละเอียด</button>
                        </a>
						<?php if($entry["eb01_status"]==3) { ?>
                        <a href="./php/print_eb01.php?fid=<?php echo $entry["eb01_id"]; ?>" target="_blank">
                        <button type="button" class="btn btn-primary btn-lg">พิมพ์</button>
                        </a>
						<?php } ?>
                         </td> -->
                        </tr>

                        <?php
                            $n++; //Iteration count 
                            } 

                        ?>
                    </tbody>
                </table>
                <br>
                <div align="right"><button type="submit" style="background-color:#32A3E8;" >ยืนยัน</button></div>
            </div>
                        </form>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

<script>
    $(document).ready(function () {
        $('#course_list').DataTable();
        
    });
</script>