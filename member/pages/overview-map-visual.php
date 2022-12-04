<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<?php


?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">ภาพรวมกำลังการรับผู้ป่วยของโรงพยาบาลในประเทศไทย</h4>
    </div>

</div>

<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h1><?php echo $sum_capacity; ?> </h1>
                    <h3>จำนวนเตียงทั้งหมด</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h1><?php echo $sum_capacity - $sum_operating; ?> </h1>
                    <h3>จำนวนเตียงว่าง</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h1><?php echo $sum_operating; ?> </h1>
                    <h3>จำนวนเตียงที่ถูกใช้อยู่</h3>
                </div>
            </div>
        </div>
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
                <h4 class="card-title">ภาพรวมตำแหน่งที่ตั้งโรงพยาบาลในประเทศไทย</h4>
                <div class="row">
                    <div class="col-lg-3">
                        <table class="table"> 
                            <tr>
                                <td><input type="checkbox" class="form-control" name="filter1" id="filter1" checked > </td> <td><label style="font-size:25px" > โรงพยาบาล</label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-3">
                        <table class="table"> 
                            <tr>
                                <td><input type="checkbox" class="form-control" name="filter2" id="filter2" checked> </td> <td><label style="font-size:25px" >รพ.สต.</label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-3">
                        <table class="table"> 
                            <tr>
                                <td><input type="checkbox" class="form-control" name="filter3" id="filter3" checked> </td> <td><label style="font-size:25px" >สถานีอนามัย</label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-3">
                        <table class="table"> 
                            <tr>
                                <td><input type="checkbox" class="form-control" name="filter4" id="filter4" checked> </td> <td><label style="font-size:25px">อื่นๆ</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id='myDiv'> </div>
                    </div>
                </div>
               
                
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->





<script>
    var hosname = <?php echo '["' . implode('", "', $hosdata['hos_agency'][0]) . '"]'; ?>;
    var hoslat = <?php echo '["' . implode('", "', $hosdata['hos_lat'][0]) . '"]'; ?>;
    var hoslon = <?php echo '["' . implode('", "', $hosdata['hos_long'][0]) . '"]'; ?>;
    var hosadd = <?php echo '["' . implode('", "', $hosdata['hos_address'][0]) . '"]'; ?>;
    var hoscap = <?php echo '["' . implode('", "', $hosdata['hos_capacity'][0]) . '"]'; ?>;
    var hosopd = <?php echo '["' . implode('", "', $hosdata['hos_operating'][0]) . '"]'; ?>;

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