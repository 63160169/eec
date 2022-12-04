<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h1 class="text-themecolor">รายงานสถิติ</h1>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                   
             
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-4 col-md-4">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-header bg-primary">
                                
                            </div>
                            <div class="card-body">
                                
                                <div class="row"> 
                                    <div class="col-lg-12">
                                    <?php 
                                        $sql = "SELECT tins_id, sum(budget_sum) FROM eec_form_eb02 NATURAL JOIN eec_form_eb01 WHERE 1 GROUP BY tins_id";  
                                        $entries = mysqli_query($con, $sql); 
                                        $entries2 = mysqli_query($con, $sql); 
                                        

                                       
                                
                                ?> 
                                    </div>      
                                    <div class="col-lg-12">
                                        <div id='pie1' style="width:100%;"><!-- Plotly chart will be drawn inside this DIV --></div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                     <!-- Column -->
                     <div class="col-lg-8 col-xlg-8 col-md-8">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-header bg-primary">
                          
                           </div>
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id='bar1' style="width:100%;"><!-- Plotly chart will be drawn inside this DIV --></div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>












                <script> 
                
                    var trace1 = {
                        x: [
                            <?php 
                                $i = 0;
                                while($entry = mysqli_fetch_array($entries)){
                                    if($i == 0){
                                        echo get_training_institute_name($con, $entry[0]);
                                    }
                                    else{
                                        echo ','.get_training_institute_name($con, $entry[0]);
                                    }
                                    $i++;
                                    
                            } 
                            ?>
                           
                        ],
                        y: [
                            <?php 
                             $i = 0;
                             while($entry = mysqli_fetch_array($entries2)){
                                 if($i == 0){
                                     echo $entry[1];
                                 }
                                 else{
                                     echo ','.$entry[1];
                                 }
                                 $i++;
                                 
                         } 
                            
                            ?>
                           ],
                        name: 'Budget',
                        type: 'bar'
                        };

                       

                        var data2 = [trace1];

                        var layout = {barmode: 'group'};

                        Plotly.newPlot('bar1', data2, layout);


                </script>
            