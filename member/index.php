<!DOCTYPE html>
<html lang="en">
<?php
session_start(); 
if(!isset($_SESSION["user"])){
    header("location:../"); 
} 
$username = $_SESSION["user"]; 
$type = $_SESSION["type"];


require ("./php/config.php");
require ("./php/function-user-data.php");
require ("./php/function-education-data.php");
require ("./php/function-institute-data.php");
require ("./php/function-form-data.php");
require ("./php/function-generic.php");
require ("./php/function-north.php");
require ("./php/function_course_data.php");
$user = get_user($con, $username);

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="อีอีซีมีงานทำ, อีอีซี, eec, hdc">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>อีอีซีมีงานทำ.com</title>

	<!-- Bootstrap 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	-->

    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/fav.jpg">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 plugins CSS -->
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom Libs -->
    <!-- Load plotly.js into the DOM -->
    <!-- <script src='https://cdn.plot.ly/plotly-latest.min.js'></script> -->

    <script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
   

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/tabs.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="./dist/js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <link rel="stylesheet" href="./dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="./dist/css/status-card.css">  
    <!-- Load plotly.js into the DOM -->
	<script src='https://cdn.plot.ly/plotly-2.2.0.min.js'></script>
	
	
    <!-- Dynamic Form Plugin -->
    <!--<script type="text/javascript" src="./dist/js/dynamic-form-master/jquery.min.js"></script>-->
    <!--<script type="text/javascript" src="./dist/js/dynamic-form-master/bootstrap.min.js"></script>-->
    <script type="text/javascript" src="./dist/js/dynamic-form-master/dynamic-form.js"></script>


	<!-- fileuploader -->
	<script src="./dist/js/fileuploader/jquery.fileuploader.min.js"  type="text/javascript"></script>	
    <link href="./dist/js/fileuploader/jquery.fileuploader.css" rel="stylesheet" type="text/css" />	





    <!-- Thai Date Picker --> 
    <!-- <script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
    <?php
    $content = $_GET["content"];
    if (!$content || empty($content) || $content == "" || !isset($content)) {
    ?>
        <script type="text/javascript">
            $(window).on('load', function() {
                // $('#myModal').modal('show');
            });
        </script>
    <?php } ?> -->

    <!-- End custom libs -->
    <style>
    b, strong {
        color: blue;
    }
    @font-face {
            font-family: 'myFont';
            src: url('./fonts/supermarket.woff');
            }

    body, input[type="text"], input[type="email"], input[type="password"], input[type="date"]  {
        font-family: 'myFont',Fallback, sans-serif;
        font-size: 20px; 
        }
    
    
    
    </style>
</head>
<!-- <?php
$getloc = "";
if ($_GET["content"] == "hospital-nearby-me") {
    $getloc = "onload='getLocation()'";
}
?> -->

<body class="skin-default-dark fixed-layout" <?php echo $getloc; ?>>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   <!--  <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">อีอีซีมีงานทำ.com</p>
        </div>
    </div>
--> 
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <?php include "topbar.php"; ?>

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <?php include "sidebar.php"; ?>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <img src="./images/welcome.jpg" style="width:100%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid pb-0">
<!-- 
                <?php
                //perform content here... 
                $content = $_GET["content"];
                if (!$content || empty($content) || $content == "" || !isset($content)) {
                    $content = "user-profile";
                }
                $content_path = "./pages/" . $content . ".php";
                if (!file_exists($content_path)) {
                    $content_path = "./pages/404.php";
                }

                // Retrieve page's content
                include $content_path;

                ?> -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            ©<?php echo date("Y"); ?> Knowledge and Smart Technology Research Lab & Faculty of Informatics, Burapha University Thailand.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    
    <script src="dist/js/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->


    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
    <script src="dist/js/sparklines/sparkline.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js" integrity="sha512-3Ofi0j25Ar6Hyqk2sdvfuoVCvvN6nE6Dh/eoMc8RQ/bnCvO8wpE+M5KyJz6T08T7pl/x82I/3Y5Amz9n3T9Esw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <!-- <script src="dist/js/dashboard1.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.js" integrity="sha512-7Fh4YXugCSzbfLXgGvD/4mUJQty68IFFwB65VQwdAf1vnJSG02RjjSCslDPK0TnGRthFI8/bSecJl6vlUHklaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="dist/chart.js"></script> -->
    <!-- <script>
        const myChart = new Chart(ctx, {...});
    </script> -->
    <!-- Custom Libs -->
    <!-- dependencies for zip mode -->
    <script type="text/javascript" src="./dist/js/jquery.Thailand.js/dependencies/zip.js/zip.js"></script>
                    <!-- / dependencies for zip mode -->

                    <script type="text/javascript" src="./dist/js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
                    <script type="text/javascript" src="./dist/js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
                    
                    <script type="text/javascript" src="./dist/js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
                    
                    <script type="text/javascript">

                        $.Thailand({
                            database: './dist/js/jquery.Thailand.js/database/db.json', 

                            $district: $('#form_edit [name="district"]'),
                            $amphoe: $('#form_edit [name="amphoe"]'),
                            $province: $('#form_edit [name="province"]'),
                            $zipcode: $('#form_edit [name="zipcode"]'),

                            onDataFill: function(data){
                                console.info('Data Filled', data);
                            },

                            onLoad: function(){
                                console.info('Autocomplete is ready!');
                                
                            }
                        });

                        // watch on change

                        $('#form_edit [name="district"]').change(function(){
                            console.log('ตำบล', this.value);
                        });
                        $('#form_edit [name="amphoe"]').change(function(){
                            console.log('อำเภอ', this.value);
                        });
                        $('#form_edit [name="province"]').change(function(){
                            console.log('จังหวัด', this.value);
                        });
                        $('#form_edit [name="zipcode"]').change(function(){
                            console.log('รหัสไปรษณีย์', this.value);
                        });
                    </script>
                     <script src="./dist/js/bootstrap-select.js"></script>
                     <script> 
                        function display_coordinator_type(t, section1, section2){
                            
                            var type = document.getElementById(t).value; 
                            var sec1 = document.getElementById(section1);
                            var sec2 = document.getElementById(section2);
                            
                            if(type == 1){
                                sec1.style.display = "block"; 
                                sec2.style.display = "none"; 
                            }
                            else if(type == 2){
                                sec1.style.display = "none"; 
                                sec2.style.display = "block";
                            }
                            else{
                                sec1.style.display = "none"; 
                                sec2.style.display = "none";
                            }
                        }
                        function confirm_form(id, text){
                            var inputs = document.getElementById(id).elements; 
                            var flag = false; 
                            for (i = 0; i < inputs.length; i++) {
                                if (inputs[i].nodeName === "INPUT" && inputs[i].type === "text") {
                                    // Update text input
                                    console.log(inputs[i].value);
                                    if(inputs[i].value == ""){
                                        flag = true;
                                        break;
                                    }
                                }
                            }
                            if(!flag){
                                if(confirm(text)){
                                    document.getElementById(id).submit();
                                }
                            }
                            else{
                                /*
                                alert("กรุณากรอกข้อมูลให้ครบถ้วน");
                                return false;
                                */ 
                                if(confirm(text)){
                                    document.getElementById(id).submit();
                                }
                            }
                           
                        }
                        function confirm_redirect(loc, text){
                            if(confirm(text)){
                                window.location.href = loc; 
                            }
                        }
                    </script>

</body>

</html>