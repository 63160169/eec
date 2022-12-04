<!-- Content Header (Page header) -->
<?php
  // $year = $_GET['year'];
        $bgcolor = [
          'rgba(216, 27, 96, 1)',
          'rgba(3, 169, 244, 1)',
          'rgba(156, 39, 176, 1)',
          'rgba(29, 233, 182, 1)',
          'rgba(255, 152, 0, 1)',
          'rgba(84, 110, 122, 1)'
      ];
?>

<div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h2 class="text-themecolor">Dashboard
                        <?php   
                            // print_r('year');  
                            // print_r($year);  

                            // $obj = get_table_general($con, '`eec_form_eb01` NATURAL JOIN `eec_form_eb02` NATURAL JOIN `eec_form_eb03` NATURAL JOIN `eec_training_institute` NATURAL JOIN `eec_institute`', '1');      
                            $obj = get_table_general($con, '`eec_form_eb01` NATURAL JOIN `eec_form_eb02` NATURAL JOIN `eec_form_eb03` NATURAL JOIN `eec_training_institute` NATURAL JOIN `eec_institute`', 'eb01_status= 3 and eb02_status= 3 and eb03_status = 3');                           
                            // $obj = get_table_general($con, '`eec_form_eb01` NATURAL JOIN `eec_training_institute` NATURAL JOIN `eec_institute`', '1');                          
                            $n = 1; // Loop count
                            $datainstbudget = [];
                            $tempdata = [];
                            while($row = mysqli_fetch_array($obj)){
                              array_push($tempdata,$row);
                              $yearvalue = 0+strval(substr($row['eb01_course_id'], 0, 2));
                              // print_r($yearvalue.' '.$row['ins_id'].'<br>');
                              $datainstbudget[$yearvalue] = [ 'title'=>'25'.$yearvalue,
                                                              'budget'=>0,
                                                              'counteb'=>0,
                                                              'ins'=>[]];
                            } //End while loop
                            $n = 1; // Loop count
                            foreach($tempdata as $key => $value) {
                              $yearvalue = 0+strval(substr($value['eb01_course_id'], 0, 2));
                              $datainstbudget[$yearvalue]['budget'] += $value['eb01_budget'];
                              $datainstbudget[$yearvalue]['ins'][$value['ins_id']]=[ 'title'=>$value['ins_name_th'],
                                                                              'budget'=>0,
                                                                              'eb01'=>[]]; 
                            }
                            // print_r('<br>---------------------<br>');
                            foreach($tempdata as $key => $value) {
                              $yearvalue = 0+strval(substr($value['eb01_course_id'], 0, 2));
                              // print_r($value['eb01_id']);
                              // print_r(' '.$value['eb01_title'].' '.$value['eb01_budget'].'<br>');
                              $datainstbudget[$yearvalue]['ins'][$value['ins_id']]['budget'] += $value['eb01_budget'];
                              $datainstbudget[$yearvalue]['ins'][$value['ins_id']]['eb01'][$value['eb01_id']] = [ 'title'=>$value['eb01_title'],
                                                                                                                  'budget'=>0,
                                                                                                                  'parti_num'=>0];
                              $datainstbudget[$yearvalue]['counteb']+= 1;                                                                        
                            }
                            foreach($tempdata as $key => $value) {
                              $yearvalue = 0+strval(substr($value['eb01_course_id'], 0, 2));
                              // print_r($value['eb01_id'].' '.$value['eb01_title'].' '.$value['eb01_budget'].'<br>');
                              $datainstbudget[$yearvalue]['ins'][$value['ins_id']]['eb01'][$value['eb01_id']]['budget']+=$value['eb01_budget'];
                              $datainstbudget[$yearvalue]['ins'][$value['ins_id']]['eb01'][$value['eb01_id']]['parti_num']+=$value['train_trainee'];
                            }
                            
                            // echo $n;
                            // print_r($datainstbudget);
                            ksort($datainstbudget);
                            $barchartdata = ['barlabel'=>[],'budget'=>[],'count'=>[],'counteb'=>[]];
                            foreach($datainstbudget as $key => $value){
                              // print_r($value);
                              array_push($barchartdata['barlabel'],$value['title']);
                              array_push($barchartdata['budget'],$value['budget']);
                              array_push($barchartdata['count'],count($value['ins']));
                              array_push($barchartdata['counteb'],$value['counteb']);
                            }
                            // print_r($barchartdata);
                            //----bar 2 --old
                            // $barchartdata2 = ['barlabel'=>[],'budget'=>[]];
                            // foreach($datainstbudget as $key => $value){
                            //   // print_r($value);
                            //   $barchartdata2['budget'][$value['title']]=[];
                            //   foreach($value['ins'] as $key2 => $value2){
                            //     $barchartdata2['barlabel'][$key2] = $value2['title'];
                            //   }
                            //   foreach($barchartdata2['barlabel'] as $key2 => $value2){
                            //     $barchartdata2['budget'][$value['title']][$key2] =0;
                            //   }
                            //   foreach($value['ins'] as $key2 => $value2){
                            //     $barchartdata2['budget'][$value['title']][$key2] = $value2['budget'];
                            //   }

                            // }
                            //----bar 2 --
                            $barchartdata2 = [];
                            foreach($datainstbudget as $key => $value){
                              $barchartdata2['25'.$key]=[];
                            }
                            foreach($datainstbudget as $key => $value){
                              // $barchartdata2['25'.$key][]=;
                              foreach($value['ins'] as $key2 => $value2){
                                $barchartdata2['25'.$key][$value2['title']]=0;
                              }
                              foreach($value['ins'] as $key2 => $value2){
                                $barchartdata2['25'.$key][$value2['title']]+=$value2['budget'];
                              }
                            }
                            foreach($barchartdata2 as $key => $value){
                              // $barchartdata2[$key]
                              arsort($barchartdata2[$key]);
                            }
                            //----bar 3 จำนวนโครงการ--
                            
                            $barchartdata3 = [];
                            foreach($datainstbudget as $key => $value){
                              $barchartdata3['25'.$key]=[];
                            }
                            foreach($datainstbudget as $key => $value){
                              foreach($value['ins'] as $key2 => $value2){
                                $barchartdata3['25'.$key][$value2['title']]=0;
                              }
                              foreach($value['ins'] as $key2 => $value2){
                                // print_r(count($value2['eb01']));
                                // print_r($value2['eb01']);
                                // print_r('<br>');
                                $barchartdata3['25'.$key][$value2['title']]=count($value2['eb01']);
                              }
                            }
                            foreach($barchartdata3 as $key => $value){
                              arsort($barchartdata3[$key]);
                            }
                            //----
                            
                            // print_r($barchartdata2);
                            $obj = get_table_general($con, '`eec_form_eb01` NATURAL JOIN `eec_form_eb02` NATURAL JOIN `eec_form_eb03`', 'eb01_status= 3 and eb02_status= 3');   
                            $topperdata = [];     
                            $tempdata = [];
                            while($row = mysqli_fetch_array($obj)){
                              array_push($tempdata,$row);  
                              $yearvalue = 0+strval(substr($row['eb01_course_id'], 0, 2));
                              $topperdata[$yearvalue] = [ 'title'=>'25'.$yearvalue,
                                                              'approved_budget'=>0,
                                                              'eec_budget'=>0,
                                                              'target_kon'=>0,
                                                              'real_kon'=>0
                                                            ];
                            }     
                            // print_r($tempdata);    
                            foreach($tempdata as $key => $value) {  
                              $yearvalue = 0+strval(substr($value['eb01_course_id'], 0, 2));
                              // $topperdata['all']['approved_budget'] += $value['budget_sum'];
                              // $topperdata['all']['eec_budget'] += $value['budget_eec'];
                              $topperdata[$yearvalue]['approved_budget'] += $value['budget_sum'];
                              $topperdata[$yearvalue]['eec_budget'] += $value['budget_eec'];
                              $topperdata[$yearvalue]['target_kon'] += $value['eb01_trainee_total'];
                              $topperdata[$yearvalue]['real_kon'] += $value['train_trainee'];
                            }    
                            // print_r($topperdata);  
                            $tempyear = [];
                            foreach($topperdata as $key => $value){
                              $tempyear[$key]=$value['title'];
                            }
                            asort($tempyear);  
                            // $obj = get_table_general($con, '`eec_form_eb01` NATURAL JOIN `eec_form_eb02`', 'eb02_status= 2 or eb02_status= 1');    
                            // while($row = mysqli_fetch_array($obj)){
                            //   $yearvalue = 0+strval(substr($row['eb01_course_id'], 0, 2));
                            //   $topperdata[$yearvalue]['approved_budget'] += $row['eb01_budget'];
                            //   print_r($row);
                            // } 
                            
                        ?>
                        </h2>
                    </div>
                   
                </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          
          <section class="col-lg-12">
            <div class="card">
              <div class="card-header p-0" style="background-color:#edf1f5;">
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <?php 
                      $n = 0;
                      foreach($tempyear as $key => $value){
                        echo "<li class='nav-ite'>
                          <a class='nav-link ";if($n==0)echo "active"; echo"' href='#topper-$key' data-toggle='tab'>".$value."</a>
                        </li>";
                        $n++;
                      }
                    ?>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              
              <div class="tab-content p-0">
                <?php 
                  $n = 0;
                  foreach($topperdata as $key => $value){
                    echo "<div class='chart tab-pane ";if($n==0)echo "active"; echo"' id='topper-$key' style='position: relative;width:100%;'>
                    <div class='row' style='background-color:#edf1f5;'>
                      <div class='col-lg-3 p-1'>
                        <div class='card text-white bg-info' style='border-radius: 15px;'>
                          <div class='card-header'><p class='mb-0'>งบประมาณที่อนุมัติ</p></div>
                          <div class='card-body'>
                            <h5 class='card-title'>".number_format($value['approved_budget'])." บาท<i class='fa fa-check' style='float:right;float:bottom;font-size:50px;opacity: 0.5'></i></h5>
                          </div>
                        </div>
                      </div>
                      <div class='col-lg-3 p-1'>
                        <div class='card text-white ' style='border-radius: 15px;background-color:#dc9609;'>
                          <div class='card-header'><p class='mb-0'>งบประมาณจาก สกพอ.</p></div>
                          <div class='card-body'>
                            <h5 class='card-title'>".number_format($value['eec_budget'])." บาท<i class='fa fa-money' style='float:right;float:bottom;font-size:50px;opacity: 0.5'></i></h5>
                          </div>
                        </div>
                      </div>
                      <div class='col-lg-3 p-1'>
                        <div class='card text-white bg-primary' style='border-radius: 15px;'>
                          <div class='card-header'><p class='mb-0'>จำนวนผู้เข้าร่วมที่คาดหวัง</p></div>
                          <div class='card-body'>
                            <h5 class='card-title'>".number_format($value['target_kon'])." คน<i class='fa fa-address-book' style='float:right;float:bottom;font-size:50px;opacity: 0.5'></i></h5>
                          </div>
                        </div>
                      </div>
                      <div class='col-lg-3 p-1'>
                        <div class='card text-white bg-success' style='border-radius: 15px;'>
                          <div class='card-header'><p class='mb-0'>จำนวนผู้เข้าร่วมจริง</p></div>
                          <div class='card-body'>
                            <h5 class='card-title'>".number_format($value['real_kon'])." คน<i class='fa fa-users' style='float:right;float:bottom;font-size:50px;opacity: 0.5'></i></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>";
                  $n++;
                  }
                ?>
                
                
                <div class='chart tab-pane' id='topper-64' style='position: relative;width:100%;'>
                          <a>say hi</a>
                </div>
              </div>              
            </div>            
          </section>
          <!-- ./col -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" style="border: 1px solid #ced9e4;border-radius: 15px;">
              <div class="card-header" style="border-radius: 15px;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  งบประมาณ
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart1" data-toggle="tab">รายปี</a>
                    </li>
                    <?php 
                      foreach($barchartdata2 as $key => $value){
                        echo "<li class='nav-ite'>
                          <a class='nav-link' href='#revenue-chart-$key' data-toggle='tab'>$key</a>
                        </li>";
                      }
                    ?>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart1"
                       style="position: relative; height: 500px;">
                      <canvas id="revenue-chart1-canvas" height="500" style="height: 500px;"></canvas>
                   </div>
                   
                   <?php 
                      foreach($barchartdata2 as $key => $value){
                        echo "<div class='chart tab-pane' id='revenue-chart-$key'
                        style='position: relative; height: 500px;'>
                       <canvas id='revenue-chart-canvas-$key' height='500' style='height: 500px;'></canvas>
                    </div>";
                      }
                    ?>
                   
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!----------------card pie-------------------------------->
            <div class="card" style="border: 1px solid #ced9e4;border-radius: 15px;">
              <div class="card-header" style="border-radius: 15px;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  งบประมาณ (Pie Chart)
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart-pie" data-toggle="tab">รายปี</a>
                    </li>
                    <?php 
                      foreach($barchartdata2 as $key => $value){
                        echo "<li class='nav-ite'>
                          <a class='nav-link' href='#revenue-chart-pie-$key' data-toggle='tab'>$key</a>
                        </li>";
                      }
                    ?>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart-pie"
                       style="position: relative; height: 500px;">
                      <canvas id="revenue-chart1-canvas-pie" height="500" style="height: 500px;"></canvas>
                   </div>
                   
                   <?php 
                      foreach($barchartdata2 as $key => $value){
                        echo "<div class='chart tab-pane' id='revenue-chart-pie-$key'
                        style='position: relative; height: 500px;'>
                       <canvas id='revenue-chart-canvas-pie-$key' height='500' style='height: 500px;'></canvas>
                    </div>";
                      }
                    ?>
                   
                </div>
              </div><!-- /.card-body -->
            </div>
            <!----------------/card pie-------------------------------->
            <!-- /.card -->
            
            
            <fieldset hidden>
              <!-- DIRECT CHAT -->
              <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                  <h3 class="card-title">Direct Chat</h3>

                  <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-primary">3</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                      <i class="fas fa-comments"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Working with AdminLTE on a great new app! Wanna join?
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        I would love to.
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date float-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Sarah Doe
                              <small class="contacts-list-date float-right">2/23/2015</small>
                            </span>
                            <span class="contacts-list-msg">I will be waiting for...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Nadia Jolie
                              <small class="contacts-list-date float-right">2/20/2015</small>
                            </span>
                            <span class="contacts-list-msg">I'll call you back at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Nora S. Vans
                              <small class="contacts-list-date float-right">2/10/2015</small>
                            </span>
                            <span class="contacts-list-msg">Where is your new...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              John K.
                              <small class="contacts-list-date float-right">1/27/2015</small>
                            </span>
                            <span class="contacts-list-msg">Can I take a look at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                          <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Kenneth M.
                              <small class="contacts-list-date float-right">1/4/2015</small>
                            </span>
                            <span class="contacts-list-msg">Never mind I found...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                    </ul>
                    <!-- /.contacts-list -->
                  </div>
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-append">
                        <button type="button" class="btn btn-primary">Send</button>
                      </span>
                    </div>
                  </form>
                </div>
                <!-- /.card-footer-->
              </div>
              <!--/.direct-chat -->

              <!-- TO DO List -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    To Do List
                  </h3>

                  <div class="card-tools">
                    <ul class="pagination pagination-sm">
                      <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                      <li class="page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <ul class="todo-list" data-widget="todo-list">
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <!-- checkbox -->
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo1" id="todoCheck1">
                        <label for="todoCheck1"></label>
                      </div>
                      <!-- todo text -->
                      <span class="text">Design a nice theme</span>
                      <!-- Emphasis label -->
                      <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                      <!-- General tools such as edit or delete-->
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                        <label for="todoCheck2"></label>
                      </div>
                      <span class="text">Make the theme responsive</span>
                      <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo3" id="todoCheck3">
                        <label for="todoCheck3"></label>
                      </div>
                      <span class="text">Let theme shine like a star</span>
                      <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo4" id="todoCheck4">
                        <label for="todoCheck4"></label>
                      </div>
                      <span class="text">Let theme shine like a star</span>
                      <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo5" id="todoCheck5">
                        <label for="todoCheck5"></label>
                      </div>
                      <span class="text">Check your messages and notifications</span>
                      <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <div  class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo6" id="todoCheck6">
                        <label for="todoCheck6"></label>
                      </div>
                      <span class="text">Let theme shine like a star</span>
                      <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                      <div class="tools">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-o"></i>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
                </div>
              </div>
            </fieldset >
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            
            <!-- จำนวน eb01 -->
            <div class="card" style="border: 1px solid #ced9e4;border-radius: 15px;">
              <div class="card-header" style="border-radius: 15px;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  จำนวน course อบรม
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#course-chart-num" data-toggle="tab">รายปี</a>
                    </li>
                    <?php 
                      foreach($datainstbudget as $key => $value){
                        echo "<li class='nav-ite'>
                          <a class='nav-link' href='#course-chart-num-$key' data-toggle='tab'>25$key</a>
                        </li>";
                      }
                    ?>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="course-chart-num"
                       style="position: relative; height: 500px;">
                      <canvas id="course-chart-num-canvas" height="500" style="height: 500px;"></canvas>
                   </div>
                    <?php 
                      $p=0;
                      foreach($datainstbudget as $key => $value){
                        echo "<div class='chart tab-pane' id='course-chart-num-$key'
                        style='position: relative; height: 500px;width:100%;'>
                        <select class='selectpicker' data-show-subtext='true' data-live-search='true' data-width='100%' onchange=\"$('#ins-".$key."').children().hide();$('#'+$(this)[0]['value']).show();\">";
                        echo '<option selected disabled> - เลือกสถาบัน - </option>';
                        foreach($value['ins'] as $key2 => $value2){
                          echo "<option data-subtext='".number_format(count($value2['eb01']))." course, ".number_format($value2['budget'])." บาท' value='ins-".$key."-".$key2."'>".$value2['title']."</option>";
                          $p++;
                        }
                        echo "</select>
                        <div id='ins-".$key."'>";
                        foreach($value['ins'] as $key2 => $value2){
                          echo "<div id='ins-".$key."-".$key2."' style='display:none;'>";
                          echo "<ul class='list-group'>";
                          $tempeb01 = [];
                          $tempeb01_2 = [];
                          foreach($value2['eb01'] as $key3 => $value3){
                            $tempeb01[$value3['title']]=$value3['budget'];
                          }
                          foreach($value2['eb01'] as $key3 => $value3){
                            $tempeb01_2[$value3['title']]=$value3['parti_num'];
                          }
                          arsort($tempeb01);
                          foreach($tempeb01 as $key3 => $value3){
                            echo "<li class='list-group-item'><a>".$key3."</a><a style='float:right;'>(เข้าร่วม ".number_format($tempeb01_2[$key3])." คน, ".number_format($value3)." บาท)</a></li>";
                          }
                          echo "</ul></div>";
                        }
                    echo "</div></div>";
                    // print_r($value2);
                      }
                    ?>
                   
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <!-- Custom tabs2 (Charts with tabs)-->
            <div class="card" style="border: 1px solid #ced9e4;border-radius: 15px;">
              <div class="card-header" style="border-radius: 15px;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  จำนวนสถาบันที่เข้าร่วม
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#insti-chart" data-toggle="tab">รายปี</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="insti-chart"
                       style="position: relative; height: 500px;">
                      <canvas id="insti-chart-canvas" height="500" style="height: 500px;"></canvas>
                   </div>
                   <div class="chart tab-pane" id="revenue-chart2"
                       style="position: relative; height: 500px;">
                      <canvas id="revenue-chart2-canvas" height="500" style="height: 500px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 500px;">
                    <canvas id="sales-chart-canvas" height="500" style="height: 500px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Map card -->
            <fieldset hidden>
              <div class="card bg-gradient-primary" >
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="fas fa-map-marker-alt mr-1"></i>
                    Visitors
                  </h3>
                  <!-- card tools -->
                  <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                      <i class="far fa-calendar-alt"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <div class="card-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div>
                <!-- /.card-body-->
                <div class="card-footer bg-transparent">
                  <div class="row">
                    <div class="col-4 text-center">
                      <div id="sparkline-1"></div>
                      <div class="text-white">Visitors</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-4 text-center">
                      <div id="sparkline-2"></div>
                      <div class="text-white">Online</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-4 text-center">
                      <div id="sparkline-3"></div>
                      <div class="text-white">Sales</div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
                </div>
              </div>
              <!-- /.card -->

              <!-- solid sales graph -->
              <div class="card bg-gradient-info">
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Sales Graph
                  </h3>

                  <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-transparent">
                  <div class="row">
                    <div class="col-4 text-center">
                      <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                            data-fgColor="#39CCCC">

                      <div class="text-white">Mail-Orders</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-4 text-center">
                      <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                            data-fgColor="#39CCCC">

                      <div class="text-white">Online</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-4 text-center">
                      <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                            data-fgColor="#39CCCC">

                      <div class="text-white">In-Store</div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->

              <!-- Calendar -->
              <div class="card bg-gradient-success">
                <div class="card-header border-0">

                  <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                  </h3>
                  <!-- tools card -->
                  <div class="card-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                      <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                        <i class="fas fa-bars"></i>
                      </button>
                      <div class="dropdown-menu" role="menu">
                        <a href="#" class="dropdown-item">Add new event</a>
                        <a href="#" class="dropdown-item">Clear events</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">View calendar</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
              </div>
            </fieldset>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<script>
  
$(function () {
  'use strict'

  // Make the dashboard widgets sortable Using jquery UI
  // $('.connectedSortable').sortable({
  //   // placeholder: 'sort-highlight',
  //   // connectWith: '.connectedSortable',
  //   // handle: '.card-header, .nav-tabs',
  //   // forcePlaceholderSize: true,
  //   // zIndex: 999999
  // })
  // $('.connectedSortable .card-header').css('cursor', 'move')

  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder: 'sort-highlight',
    handle: '.handle',
    forcePlaceholderSize: true,
    zIndex: 999999
  })

  // bootstrap WYSIHTML5 - text editor
  $('.textarea').summernote()

  // $('.daterange').daterangepicker({
  //   ranges: {
  //     Today: [moment(), moment()],
  //     Yesterday: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //     'Last 7 Days': [moment().subtract(6, 'days'), moment()],
  //     'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  //     'This Month': [moment().startOf('month'), moment().endOf('month')],
  //     'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //   },
  //   startDate: moment().subtract(29, 'days'),
  //   endDate: moment()
  // }, function (start, end) {
  //   // eslint-disable-next-line no-alert
  //   alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  // })

  /* jQueryKnob */
  $('.knob').knob()

  // jvectormap data
  var visitorsData = {
    US: 398, // USA
    SA: 400, // Saudi Arabia
    CA: 1000, // Canada
    DE: 500, // Germany
    FR: 760, // France
    CN: 300, // China
    AU: 700, // Australia
    BR: 600, // Brazil
    IN: 800, // India
    GB: 320, // Great Britain
    RU: 3000 // Russia
  }
  // World map by jvectormap
  // $('#world-map').vectorMap({
  //   map: 'usa_en',
  //   backgroundColor: 'transparent',
  //   regionStyle: {
  //     initial: {
  //       fill: 'rgba(255, 255, 255, 0.7)',
  //       'fill-opacity': 1,
  //       stroke: 'rgba(0,0,0,.2)',
  //       'stroke-width': 1,
  //       'stroke-opacity': 1
  //     }
  //   },
  //   series: {
  //     regions: [{
  //       values: visitorsData,
  //       scale: ['#ffffff', '#0154ad'],
  //       normalizeFunction: 'polynomial'
  //     }]
  //   },
  //   onRegionLabelShow: function (e, el, code) {
  //     if (typeof visitorsData[code] !== 'undefined') {
  //       el.html(el.html() + ': ' + visitorsData[code] + ' new visitors')
  //     }
  //   }
  // })

  // Sparkline charts
  var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })
  var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })
  var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 80, height: 50, lineColor: '#92c1dc', endColor: '#ebf4f9' })

  sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
  sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
  sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

  // The Calender
  // $('#calendar').datetimepicker({
  //   format: 'L',
  //   inline: true
  // })

  // SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').overlayScrollbars({
    height: '250px'
  })

  /* Chart.js Charts */
  // Sales chart
                            // echo $n;
  
  var salesChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
      },
      scales: {
        xAxes: [{
          ticks: {
            beginAtZero: true,
            display: true
          },
          gridLines: {
            display: false
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
          },
          gridLines: {
            display: true
          }
        }]
      }
    }
  // -------- 'งบประมาณ' ------------------------
  var salesChartCanvas = document.getElementById('revenue-chart1-canvas').getContext('2d')

  var barData = {};
  barData = {
    <?php 
      $templabel = $barchartdata['barlabel'];
      foreach($templabel as $key=>$value){
        $templabel[$key] =  $value;
      }
    ?>
    labels: ["<?php echo implode('", "',$templabel);?>"],
    datasets: [
      {
        label: 'งบประมาณที่ได้รับ (บาท)',
        backgroundColor: '#2b6688',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        // data: [28, 48, 40, 19, 86, 27, 90]
        data: [<?php echo implode(", ",$barchartdata['budget']);?>]
      }
    ]
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var Option1 =  JSON.parse(JSON.stringify(salesChartOptions));
  var firstData = JSON.parse(JSON.stringify(barData));
  var salesChart = new Chart(salesChartCanvas, {
    type: 'bar',
    data: firstData,
    options: Option1

  })
  // --------------------------------------------------------
  // ------- insti chart ---------------
  console.log(barData);
  var instData = JSON.parse(JSON.stringify(barData));
  // var barData =  JSON.parse(JSON.stringify(barData));
  // console.log('instData');
  // console.log(instData);
  instData['datasets'][0]['backgroundColor']='#5dd5d5';
  instData['datasets'][0]['borderColor']="white";
  instData['datasets'][0]['label']="จำนวนสถาบันที่เข้าร่วม";
  instData['datasets'][0]['data']=[<?php echo implode(", ",$barchartdata['count']);?>];
  salesChartCanvas = document.getElementById('insti-chart-canvas').getContext('2d');
  var Option2 =  JSON.parse(JSON.stringify(salesChartOptions));
  var salesChart = new Chart(salesChartCanvas, {
    type: 'bar',
    data: instData,
    options: Option2
  })
  // -----------------------------------------------------
  // ------- eb01 num chart ---------------
  var ebData = barData;
  // console.log('instData');
  // console.log(instData);
  ebData['datasets'][0]['backgroundColor']='#8080ff';
  ebData['datasets'][0]['borderColor']="white";
  ebData['datasets'][0]['label']="จำนวน course อบรม";
  ebData['datasets'][0]['data']=[<?php echo implode(", ",$barchartdata['counteb']);?>];
  salesChartCanvas = document.getElementById('course-chart-num-canvas').getContext('2d');
  var Option3 =  JSON.parse(JSON.stringify(salesChartOptions));
  var salesChart = new Chart(salesChartCanvas, {
    type: 'bar',
    data: barData,
    options: Option3
  })
  // -----------------------------------------------------
  // -------- งบประมาณ pie ------------------------
  console.log(barData);
  console.log(salesChartOptions);
  barData['datasets'][0]['backgroundColor']=<?php echo "['".implode("', '", $bgcolor)."'];";?>
  barData['datasets'][0]['borderColor']="white";
  var Option4 =  JSON.parse(JSON.stringify(salesChartOptions));
  Option4['scales']['xAxes'][0]['ticks']['display'] =false;
  Option4['scales']['xAxes'][0]['ticks']['display'] =false;
  Option4['scales']['yAxes'][0]['gridLines']['display'] =false;
  Option4['scales']['yAxes'][0]['ticks']['display'] =false;

  salesChartCanvas = document.getElementById('revenue-chart1-canvas-pie').getContext('2d');
  var salesChart = new Chart(salesChartCanvas, {
    type: 'pie',
    data: barData,
    options: Option4
  })
  // -----------------------------------------------------
  // -------- สถาบัน ------------------------
  var salesChartCanvas = document.getElementById('revenue-chart2-canvas').getContext('2d')

  var barData = {};
  barData = {
    <?php 
      $templabel = $barchartdata2['barlabel'];
      foreach($templabel as $key=>$value){
        // $templabel[$key] =  substrwords($value,30);
        $templabel[$key] =  str_replace("มหาวิทยาลัย","ม.",$value);
      }
    ?>
    labels: ["<?php echo implode('", "',$templabel);?>"],
    datasets: [
      <?php 
        $t=0; 
        foreach($barchartdata2['budget'] as $key=>$value){
          if($t!=0)echo ',';
          echo "{
            label: '$key',
            backgroundColor: '".$bgcolor[$t]."',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: [".implode(", ", $value)."]
          }";
          $t++;
        }
      ?>
    ]
  }

  var Option5 =  JSON.parse(JSON.stringify(salesChartOptions));
  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  console.log(Option5);
  var salesChart = new Chart(salesChartCanvas, {
    type: 'bar',
    data: barData,
    options: Option5

  })
  console.log("barData");
  console.log(barData);
  // --------------------------------------------------------
  //-------ARRAY BAR CHART-------
  
  // foreach($barchartdata2 as $key => $value){
  <?PHP 
  
  foreach($barchartdata2 as $key => $value){
    echo "var salesChartCanvas = document.getElementById('revenue-chart-canvas-$key').getContext('2d')
    var barData = {};
    barData = {
      labels: ['".implodekey("', '", $value)."'],
      datasets: [
        {
          label: 'งบประมาณที่ได้รับ (บาท)',
          backgroundColor: '#2b6688',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [".implode(", ", $value)."]
        },
      ]
    }

    var salesChart = new Chart(salesChartCanvas, {
      type: 'bar',
      data: barData,
      options: Option5

    })
    ";
  }
  ?>
  //---------------------------

  // -------- งบประมาณ pie ------------------------
  <?php 
  $t=0;
  foreach($barchartdata2 as $key => $value){
    echo "var salesChartCanvas = document.getElementById('revenue-chart-canvas-pie-$key').getContext('2d')
    var barData = {};
    barData = {
      labels: ['".implodekey("', '", $value)."'],
      datasets: [
        {
          label: 'งบประมาณที่ได้รับ (บาท)',
          backgroundColor: ['".implode("', '", $bgcolor)."'],
          borderColor: 'white',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [".implode(", ", $value)."]
        },
      ]
    }
    var salesChart = new Chart(salesChartCanvas, {
      type: 'pie',
      data: barData,
      options: Option5

    })
    ";$t++;
  }
  ?>
  // --------------------------------------------------------
  




  // Donut Chart
  var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
  var pieData = {
    labels: [
      'รอตรวจสอบ',
      'รอแก้ไข',
      'รออนุมัติ',
      'อนุมัติ',
      'ไม่อนุมัติ'
    ],
    datasets: [
      {
        data: [<?php echo $waitchecknum.', '.$waiteditnum.', '.$waitapprovenum.', '.$approvenum.', '.$declinenum;?>],
        // data: [1,2,3,4,5],
        backgroundColor: ['#17a2b8', '#007bff', '#ffc107', '#28a745', '#dc3545']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    },
    maintainAspectRatio: false,
    responsive: true
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  })

  // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
    datasets: [
      {
        label: 'Digital Goods',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 5000,
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesGraphChart = new Chart(salesGraphChartCanvas, {
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })
})
</script>

<?php
function substrwords($text, $maxchar, $end='...') {
  if (strlen($text) > $maxchar || $text == '') {
      $words = preg_split('/\s/', $text);      
      $output = '';
      $i      = 0;
      while (1) {
          $length = strlen($output)+strlen($words[$i]);
          if ($length > $maxchar) {
              break;
          } 
          else {
              $output .= " " . $words[$i];
              ++$i;
          }
      }
      $output .= $end;
  } 
  else {
      $output = $text;
  }
  return $output;
}

function implodekey($sep=' ',$arr) {
  $input = $arr;
  $output = implode($sep, array_map(
    function ($v, $k) {
        $v='';
        if(is_array($v)){
            return $k.'[]'.implode('&'.$k.'[]', $v);
        }else{
            return $k.''.$v;
        }
    }, 
    $input, 
    array_keys($input)
  ));
  return $output;
}
?>

