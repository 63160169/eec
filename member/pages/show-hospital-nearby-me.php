                    
                <?php
                     $lat = $_POST["lat"];
                     $long = $_POST["long"];
                ?> 
                     <div class="row page-titles">
                         <div class="col-md-5 align-self-center">
                             <h4 class="text-themecolor">ศูนย์บริการใกล้ฉัน</h4>
                         </div>
                        
                     </div>
                     <!-- ============================================================== -->
                     <!-- End Bread crumb and right sidebar toggle -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- Start Page Content -->
                     <!-- ============================================================== -->
                     <div class="row">
                         <div class="col-12">
                             <div class="card">
                                 <div class="card-body">
                                     <h4 class="card-title">รายการ</h4>
                                     <table class="display" id="hospital_list"> 
                                      <thead>
                                          <tr>
                                           
                                            <th>ชื่อโรงพยาบาล</th>
                                            <th>ระยะทาง</th> 
                                            <th>จำนวนเตียงทั้งหมด</th>
                                            <th>จำนวนเตียงคงเหลือ  </th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                     <?php 
                                        $list_of_agency = array();
                                        $list_of_lat = array();
                                        $list_of_lon = array();
                                        $list_of_address = array();
                                        $list_of_capacity = array();
                                        $list_of_operated = array();
                                        $myarray = array();
                                        $entries = gethospital($con); 
                                        while($entry = mysqli_fetch_array($entries)){
                                            $dist = distance($lat, $long, $entry["hos_lat"], $entry["hos_long"], "K");
                                            if($dist < 40){
                                                $hosname = $entry["hos_agency"];
                                                $hoslat = $entry["hos_lat"];
                                                $hoslon = $entry["hos_long"];
                                                $hosadd = $entry["hos_address"];
                                                $hoscap = $entry["hos_capacity"];
                                                $hosopd = $entry["hos_operating"];
                                                array_push($list_of_agency, $hosname);
                                                array_push($list_of_lat, $hoslat);
                                                array_push($list_of_lon, $hoslon);
                                                array_push($list_of_address, $hosadd);
                                                array_push($list_of_capacity, $hoscap);
                                                array_push($list_of_operated, $hosopd);
                                               ?> 
                                                 <tr> 
                                                    
                                                    <td><?php echo $entry["hos_agency"]; ?></td>
                                                    <td><?php echo number_format($dist, 2, '.', ''). " km."; ?></td>
                                                    <td><?php echo $entry["hos_capacity"]; ?></td>
                                                    <td><?php echo $entry["hos_capacity"] - $entry["hos_operating"]; ?></td>
                                                    <td>
                                                        <a target = "hospital-detail" href="?content=hospital-detail&hosid=<?php echo $entry["hos_id"]; ?>">
                                                            <button type="button" class="btn btn-info">รายละเอียด</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                               <?php 
                                               $n++;  
                                            }  
                                              
                                        }
                                        $myarray["hos_agency"][] =  $list_of_agency;
                                        $myarray['hos_lat'][] = $list_of_lat;
                                        $myarray["hos_long"][] =  $list_of_lon;
                                        $myarray['hos_address'][] = $list_of_address;
                                        $myarray["hos_capacity"][] =  $list_of_capacity;
                                        $myarray['hos_operating'][] = $list_of_operated;
                                     ?>
                                     </tbody> 
                                    </table> 
                                   
                                 </div>
                             </div>
                         </div>
                     </div>
                     <script> 
                        $(document).ready( function () {
                            $('#hospital_list').DataTable({"order": [[ 1, "asc" ]]});
                            
                        } );
                    </script>

                        <div class="row">
                         <div class="col-12">
                             <div class="card">
                                 <div class="card-body">
                                     <h4 class="card-title">แผนที่</h4>
                                     <div id='myDiv'>
                                        <!-- Plotly chart will be drawn inside this DIV -->
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <script>
                        var hosname = <?php echo '["' . implode('", "', $myarray['hos_agency'][0]) . '"]'; ?>;
                        var hoslat = <?php echo '["' . implode('", "', $myarray['hos_lat'][0]) . '"]'; ?>;
                        var hoslon = <?php echo '["' . implode('", "', $myarray['hos_long'][0]) . '"]'; ?>;
                        var hosadd = <?php echo '["' . implode('", "', $myarray['hos_address'][0]) . '"]'; ?>;
                        var hoscap = <?php echo '["' . implode('", "', $myarray['hos_capacity'][0]) . '"]'; ?>;
                        var hosopd = <?php echo '["' . implode('", "', $myarray['hos_operating'][0]) . '"]'; ?>;

                        console.log(hosname);

                        var data = [{
                            type: 'scattermapbox',
                            lat: hoslat,
                            lon: hoslon,
                            mode: 'markers',
                            marker: {
                                // color: 'rgb(17, 157, 255)',
                                size: 6,
                                // symbol: 'marker',
                                // color: ''
                            },
                            // type: 'scatter',
                            text: hosname 
                        }]

                        var layout = {
                            autosize: true,
                            // hovermode: 'x',
                            hoverinfo: "text",
                            height: 1000,
                            mapbox: {
                                bearing: 0,
                                center: {
                                    lat: 13.736717,
                                    lon: 100.523186
                                },
                                pitch: 0,
                                zoom: 7
                            },
                        }

                        // var addcontrol = addControl(
                        //     new mapboxgl.GeolocateControl({
                        //         positionOptions: {
                        //             enableHighAccuracy: true
                        //         },
                        //         trackUserLocation: true
                        //     })
                        // );

                        Plotly.setPlotConfig({
                            id: 'medhub-test',
                            mapboxAccessToken: "pk.eyJ1IjoidGFuYXRwb24iLCJhIjoiY2tvMHIwMGlhMDJ5aTJ4b3ZiaWR1eDUwYyJ9.IAcwVI_p9PgLMM5HcEnJDg"
                        })

                        Plotly.newPlot('myDiv', data, layout)
                    </script>
                
     
                   