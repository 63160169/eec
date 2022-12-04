                    
                <?php
                     
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
                        <div class="card" onload="getLocation()">
                            <div class="card-body">
                                <h4 class="card-title">รายการ</h4>
                             
                            <form id="posForm" method="POST" action="?content=show-hospital-nearby-me">
                               <input type="text" value="" id="lat" name="lat">
                               <input type="text" value="" id="long" name="long">
                            </form>  
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    //var x = document.getElementById("demo");
                    function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition);
                        } 
                        else {
                            x.innerHTML = "Geolocation is not supported by this browser.";
                        }
                    }

                    function showPosition(position) {
                        //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
                        document.getElementById("lat").value = position.coords.latitude; 
                        document.getElementById("long").value = position.coords.longitude; 
                        document.getElementById("posForm").submit();
                    }
                </script>

              