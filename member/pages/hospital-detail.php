 <?php
    $hos_id = $_GET["hosid"];
    $hsql = "SELECT * FROM med_hospital NATURAL JOIN med_hospital_type WHERE hos_id = $hos_id";
    $query = mysqli_query($con, $hsql);
    $res = mysqli_fetch_array($query);

    ?>
 <!-- ============================================================== -->
 <div class="row page-titles">
     <div class="col-md-5 align-self-center">
         <h4 class="text-themecolor">โรงพยาบาล <?php echo $res["hos_agency"]; ?> </h4>
     </div>

 </div>
 <!-- ============================================================== -->
 <!-- End Bread crumb and right sidebar toggle -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- Start Page Content -->
 <!-- ============================================================== -->
 <div class="row">
     <div class="col-lg-4">
         <div class="card bg-primary text-white">
             <div class="card-body">
                 <h1><?php echo $res["hos_capacity"]; ?> </h1>
                 <h3>จำนวนเตียงทั้งหมด</h3>
             </div>
         </div>
     </div>
     <div class="col-lg-4">
         <div class="card bg-success text-white">
             <div class="card-body">
                 <h1><?php echo $res["hos_capacity"] - $res["hos_operating"]; ?> </h1>
                 <h3>จำนวนเตียงว่าง</h3>
             </div>
         </div>
     </div>
     <div class="col-lg-4">
         <div class="card bg-warning text-white">
             <div class="card-body">
                 <h1><?php echo $res["hos_operating"]; ?> </h1>
                 <h3>จำนวนเตียงที่ถูกใช้อยู่</h3>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-6">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">รายละเอียด</h4>
                 <table class="table">
                     <tr>
                         <th style="text-align:right;"><b> ชื่อโรงพยาบาล : </b></th>
                         <td style="text-align:left;"> <?php echo $res["hos_agency"]; ?> </td>
                     </tr>
                     <tr>
                         <th style="text-align:right;"><b> หน่วยงาน : </b></th>
                         <td style="text-align:left;"> <?php echo $res["hos_department"]; ?> </td>
                     </tr>
                     <tr>
                         <th style="text-align:right;"><b> สังกัด : </b></th>
                         <td style="text-align:left;"> <?php echo $res["hos_ministry"]; ?> </td>
                     </tr>
                     <tr>
                         <th style="text-align:right;"><b> ประเภท : </b></th>
                         <td style="text-align:left;"> <?php echo $res["htype_name"]; ?> </td>
                     </tr>
                     <tr>
                         <th style="text-align:right;"><b> ที่อยู่ : </b></th>
                         <td style="text-align:left;"> <?php echo $res["hos_address"]; ?> </td>
                     </tr>
                 </table>

             </div>
         </div>
     </div>

     <div class="col-6">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">ภาพรวมจำนวนเตียงทั้งหมด</h4>
                 <center>
                     <div id='myDiv' style="width:100%;">

                     </div>
                 </center>
             </div>
         </div>
     </div>

 </div>
 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">ตำแหน่งที่ตั้ง</h4>
                 <div id="map" style=" min-height: 500px;width: 100%;height:100%"></div> 
               
             </div>
         </div>
         
     </div>
 </div>




 <script>
     let map;

    //  function initMap() {
    //      console.log('Load map')
    //      map = new google.maps.Map(document.getElementById("map"), {
    //          center: {
    //              lat: -34.397,
    //              lng: 150.644
    //          },
    //          zoom: 8,
    //      });
    //  }
 </script>
 <script>
     var data = [{
         values: [<?php echo $res["hos_operating"]; ?>, <?php echo $res["hos_capacity"] - $res["hos_operating"]; ?>],
         labels: ['กำลังถูกใช้อยู่', 'เตียงว่าง'],
         domain: {
             column: 0
         },
         name: 'จำนวนเตียง',
         hoverinfo: 'label+percent+name',
         hole: .6,
         type: 'pie'
     }];

     var layout = {

         annotations: [{
                 font: {
                     size: 20
                 },
                 showarrow: false,
                 text: ' ',
                 x: 0.17,
                 y: 0.5
             }

         ],

         showlegend: true,
         grid: {
             rows: 1,
             columns: 2
         }
     };

     Plotly.newPlot('myDiv', data, layout);
 </script>

 <!-- For map configuration  -->
 <script>
     // Initialize and add the map
     function initMap() {

     // The location of Uluru
     const loc = { lat: <?php echo $res["hos_lat"]; ?>, lng: <?php echo $res["hos_long"]; ?> };
     // The map, centered at Uluru
     const map = new google.maps.Map(document.getElementById("map"), {
         zoom: 15,
         center: loc,
     });
     // The marker, positioned at Uluru
     const marker = new google.maps.Marker({
         position: loc,
         map: map,
     });
     }
     // call map function
 </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADQJLBR2n_WOLPbxOmLLSvR6XN0AibN-0&callback=initMap&libraries=&v=weekly" async></script>