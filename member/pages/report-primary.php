                <style>
                    /* a{display:inline-block;width:400px} */
                </style>
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
                    <div class="col-lg-12 col-xlg-12 col-md-12 align-items-center" >
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-header bg-primary"></div>
                            <div class="card-body">
                                
                                <div class="row align-items-center">
                                    <div class="col-lg-12 align-items-center " style="text-aling:center;">
                                        <div  id='pie1' style="width:100%;"><!-- Plotly chart will be drawn inside this DIV --></div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                     <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
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
                <?php 
                    $querydata = array();
                    $n = 0; 
                    $entries = get_general_data($con,'`eec_form_eb01` Natural join `eec_training_institute` Natural join `eec_institute` Natural join `eec_form_eb02`',"1"); 
                    while($entry = mysqli_fetch_array($entries)){  	
                        $querydata[$n] = [substr($entry['eb01_course_id'],0,2),'"'.$entry['eb01_title'].'"',$entry['budget_sum']];
                        $n++;
                    }
                    // ksort($querydata);
                    // print_r($querydata );
                    function phptojavascript($inputarray,$mockid){
                        $resultdata = array();
                        $resultdata[$mockid]=0;
                        foreach ($inputarray as $key => $value) {$resultdata[$value[0]]=[];}
                        foreach ($inputarray as $key => $value) {
                            if (!array_key_exists($mockid, $resultdata[$value[0]])) {
                                $resultdata[$value[0]][$mockid]=$value[2];
                            }else{
                                $resultdata[$value[0]][$mockid]+=$value[2];
                            }
                            
                            if (!array_key_exists($mockid, $resultdata[$value[0]][$value[1]])) {
                                $resultdata[$value[0]][$value[1]][$mockid]=$value[2];
                            }else{
                                $resultdata[$value[0]][$value[1]]['sum']+=$value[2];
                            }
                        }
                        // print_r($resultdata);
                        // ksort($resultdata);
                        // print_r("here");
                        // print_r($resultdata);
                        $exporttext = str_replace("Array\n","",print_r($resultdata,true));
                        $exporttext = str_replace("[",",[",print_r($exporttext,true));
                        $exporttext = str_replace(",[$mockid","['$mockid'",print_r($exporttext,true));
                        $exporttext = str_replace("(","{",print_r($exporttext,true));
                        $exporttext = str_replace(")","}",print_r($exporttext,true));
                        $exporttext = str_replace("=>",":",print_r($exporttext,true));
                        return $exporttext;
                    }
                    phptojavascript($querydata,"sum");
                ?>
                <script> 
                var canhome = 0;
                var phpdata=[];
                <?php
                    echo "phpdata=".phptojavascript($querydata,"sum").";";
                ?>
                // const ordered = Object.keys(phpdata).sort().reduce(
                //     (obj, key) => { 
                //         obj[key] = phpdata[key]; 
                //         return obj;
                //     }, 
                //     {}
                // );
                // phpdata = ordered;

//                  phpdata={
//     ['sum'] : 0
//     ,[63] :         {
//             ['sum'] : 43532
//             ,["63-title1"] :{
//                 ['sum'] : 28003
//                 ,["63-title1-1"] :{
//                     ['sum'] : 215468
//                 }
//                 ,["63-title1-2"] :{
//                     ['sum'] : 484215
//                 }
//             }
// 		    ,["63-title2"] :                 {
//                     ['sum'] : 2003
//                 ,["63-title1-1"] :{
//                     ['sum'] : 215468
//                 }
//                 ,["63-title1-2"] :{
//                     ['sum'] : 484215
//                 }
//             },["63-title3"] :                 {
//                 ['sum'] : 50003
//                 ,["63-title1-1"] :{
//                     ['sum'] : 215468
//                 }
//                 ,["63-title1-2"] :{
//                     ['sum'] : 484215
//                 }
//             },["63--title4"] :                 {
//                 ['sum'] : 8523
//                 ,["63-title1-1"] :{
//                     ['sum'] : 215468
//                 }
//                 ,["63-title1-2"] :{
//                     ['sum'] : 484215
//                 }
//             }

//         }

//     ,[62] :         {
//             ['sum'] : 30009
//             ,["62-title1"] :                 {
//                     ['sum'] : 10003
//                 },["62-title2"] :                 {
//                     ['sum'] : 10003
//                 },["62-title3"] :                 {
//                     ['sum'] : 10003
//                 }

//         }

//     ,[61] :         {
//             ['sum'] : 222000
//             ,["61-title1"] :                 {
//                     ['sum'] : 37000
//                 },["61-title2"] :                 {
//                     ['sum'] : 37000
//                 },["61-title3"] :                 {
//                     ['sum'] : 37000
//                 },["61-title4"] :                 {
//                     ['sum'] : 37000
//                 },["61-title5"] :                 {
//                     ['sum'] : 37000
//                 },["61-title6"] :                 {
//                     ['sum'] : 37000
//                 }

//         }

//     ,[64] :         {
//             ['sum'] : 15015
//             ,["Northy"] :                 {
//                     ['sum'] : 15015
//                 }

//         } 

// };
console.log(phpdata);
                var budgetdata =[];
                var titledata =[];
                var resultdata = [];
                var initialdata= [];
                var maxvalue = 0;
                var globaltitle="";
                var n=0;
                var piewidth = document.getElementById("pie1").offsetWidth;
                window.addEventListener('resize', function(event) {
                    // console.log(document.getElementById("pie1").offsetWidth);
                    piewidth = document.getElementById("pie1").offsetWidth;
                    // console.log('data',data);
                    // console.log('layout',layout);
                    // layout['width'] = piewidth;
                    // Plotly.newPlot('pie1', data, layout);
                }, true);
                for (key in phpdata){
                    if(key!="sum"){
                        // console.log(key,n,phpdata[key]['sum']);
                        resultdata[n]=[phpdata[key]['sum'],key];
                        resultdata[n]['data']=phpdata[key];
                        if(phpdata[key]['sum']>maxvalue)maxvalue=phpdata[key]['sum'];
                        n=n+1;
                    }
                }
                console.log(resultdata);
                n=0;
                // titledata.forEach(function test(item,index){resultdata[n]=[budgetdata[index],item];if(budgetdata[index]>maxvalue)maxvalue=budgetdata[index];n=n+1;});
                resultdata.sort(sortFunction);
                resultdata=transpose(resultdata);
                // console.log(resultdata);
                initialdata = JSON.parse(JSON.stringify(resultdata[0]));
                initialdata.fill(0);
                initialdata[0] = maxvalue*15;
                console.log(resultdata);

                var data =[];
                var layout =[];
                pieplot(initialdata,resultdata[1],'pie1');
                var myPlot = document.getElementById('pie1'),
                    data = [{
                        values: initialdata,
                        // labels: resultdata[1],
                        type: 'pie',
                        textinfo: 'none',
                        sort:false
                    }];
                    layout = {
                        height: 400,
                        width: 600,
                        showlegend: true,
                        title:{text:'งบประมาณรายปี:',font: {
                                family: 'Courier New, monospace',
                                size: 12
                                },
                                xref: 'paper',
                                x: 0.05,},
                        legend: {
                            x: 1,
                            xanchor: 'right',
                            y: 1
                        }
                        
                    };
                    Plotly.newPlot('pie1', data, layout);

                    
                    showgraph(phpdata,data[0]['values']);
                    var globaldata =data;
                    function showgraph(lphpdata,arr,inivalues=0,disableclick2=0,title=""){
                        // console.log("lphpdata",lphpdata);
                        var lmaxvalue = 0;
                        var lresultdata = [];
                        var ln=0;
                        for (key in lphpdata){
                            if(key!="sum"){
                                lresultdata[n]=[lphpdata[key]['sum'],key];
                                lresultdata[n]['data']=lphpdata[key];
                                if(lphpdata[key]['sum']>lmaxvalue)lmaxvalue=lphpdata[key]['sum'];
                                n=n+1;
                            }
                        }
                        lresultdata.sort(sortFunction);
                        lresultdata=transpose(lresultdata);
                        if(inivalues!=0){
                            lresultdata[0]=inivalues;
                        }
                        target = lresultdata[0];
                        labels = lresultdata[1];
                        // templabels = [];
                        // for (let i = 0; i < target.length; i++) {
                        //     templabels[i] = '<a style="color:white;">'+labels[i]+'</a>';
                        // }
                        console.log('showgraphtitle',title);
                        update(target,arr,labels,labels,0,lphpdata,disableclick2,title);
                    }
                    function update(target,arr,labels,templabels,disableclick=0,lphpdata,disableclick2=0,title=""){
                        // console.log('arr',arr);
                        // console.log('target',target);
                        // console.log('updatetitle',title);
                        result = [];
                        step =[];
                        for (let i = 0; i < target.length; i++) {
                            // console.log('target',(typeof target[i])=='number');
                            step[i] = Math.abs(target[i] - arr[i])/8;
                            if((typeof target[i])!='number')step[i] =Math.abs(0 - arr[i])/8;
                        }
                        // console.log('step',step);
                        for (let i = 0; i < arr.length; i++) {
                            temptarget = 0;
                            if((typeof target[i])!='number')temptarget=0;else{temptarget=target[i];}
                            if(temptarget>arr[i]){
                                arr[i] =arr[i]+step[i];
                            }else if(temptarget<arr[i]){
                                arr[i] =arr[i]-step[i];
                            }else{
                                arr[i] =arr[i];
                            }
                            result[i] = arr[i];
                        }
                        // console.log('result',result);
                        // data[0]['values']=result;
                        // data[0]['labels']=templabels;
                        // Plotly.newPlot('pie1', data, layout);
                        pieplot(result,templabels,'pie1',disableclick,lphpdata,title);





                        if(Math.abs(target[0]-arr[0])/target[0]<=0.01||Math.abs(target[1]-arr[1])/target[1]<=0.03||Math.abs(target[2]-arr[2])/target[2]<=0.03||Math.abs(target[3]-arr[3])/target[3]<=0.03){
                            
                            pieplot(target,labels,'pie1',disableclick2,lphpdata,title);
                            
                        }else{
                            setTimeout(() => {
                                update(target,arr,labels,templabels,1,lphpdata,disableclick2,title)
                            },2);
                        }
                    }

                    function transpose(a){
                        return a[0].map(function (_, c) { return a.map(function (r) { return r[c]; }); });
                    }
                    
                    function sortFunction(a, b) {
                        if (a[0] === b[0]) {
                            return 0;
                        }
                        else {
                            return (a[0] > b[0]) ? -1 : 1;
                        }
                    }
                    function checklen(text,len){
                        var d = len-text.length;
                        if(d>0){
                            console.log('d',d);
                            return text.padEnd(6*d+1,'&nbsp;');
                        }else{
                            return text;
                        }
                    }

                    function pieplot(values,labels,id,disableclick=0,lphpdata,title=""){
                        // console.log(lphpdata);
                        var showlegend = false;
                        var textinfo = 'none';
                        if (disableclick==0){
                            showlegend = true;
                            textinfo = 'percent';
                        }else{
                            showlegend = false;
                            textinfo = 'none';
                        }
                        var data =[];
                        var label = [];
                        var myPlot = document.getElementById('pie1'),
                            data = [{
                                values: values,
                                labels: labels,
                                type: 'pie',
                                lphpdata:lphpdata,
                                textinfo: textinfo,
                                sort:false
                            }];
                            // console.log(labels[0]);
                            // console.log('title',title)
                            // title=title+title;
                            layout = {
                                height: 400,
                                width: piewidth,
                                showlegend: showlegend,
                                title:{text:'งบประมาณรายปี:'+title,font: {
                                family: 'Courier New, monospace',
                                size: 16
                                },
                                x: 0.05,},
                                legend: {
                                    x: 1,
                                    xanchor: 'right',
                                    y: 1
                                    
                                },
                                annotations: [
                                    {
                                        text: '(Click background to go home)<br><b>เลือกรายการ</b>',
                                        xref: 'paper',
                                        yref: 'paper',
                                        xanchor: 'right',
                                        align: 'right',
                                        x:1,
                                        y:1.13,
                                        showarrow: false
                                    }
                                ]
                                // annotations :[{align:}]
                            };
                            Plotly.newPlot(id, data, layout);
                            myPlot.on('plotly_legendclick', function(x){
                                // console.log("Object.size(data[0]['lphpdata'][x.label]",Object.size(data[0]['lphpdata'][x.label]));
                                if(Object.size(data[0]['lphpdata'][x.label])<=1)disableclick=1;
                                if (disableclick==0){
                                    // console.log('data[0]',data[0]);
                                    var inidata=[];
                                    var inivalues=[];
                                    inivalues = JSON.parse(JSON.stringify(data[0]['values']));
                                    inivalues.fill(0);
                                    inivalues[data[0]['labels'].indexOf(x.label)]=10000;
                                    inidata = JSON.parse(JSON.stringify(data[0]['lphpdata']));
                                    for(key in inidata){
                                        if(key==x.label)inidata[key]['sum']=10000;
                                        else{inidata[key]['sum']=0;}
                                    }
                                    // console.log('inidata',inidata);
                                    // inidata.fill(0);
                                    // inidata[data[0]['labels'].indexOf(x.label)]=10000;
                                    // console.log("here",inidata,data[0]['lphpdata'][x.label]);
                                    // console.log("data[0]",Object.size(data[0]['lphpdata'][x.label]));
                                    showgraph(inidata,data[0]['values'],inivalues,1);
                                    setTimeout(() => {
                                        var zeroarray = Array(Object.size(data[0]['lphpdata'][x.label])-1).fill(0);
                                        zeroarray[0]=100000;
                                        // console.log("hereeeeeeeeeeeeeeee");
                                        globaltitle +="<br>> "+x.label;
                                        showgraph(data[0]['lphpdata'][x.label],zeroarray,0,0,globaltitle);
                                        canhome = 1;
                                        //-------------------
                                        myPlot.addEventListener('click', function(evt) {
                                            if (canhome == 1){
                                                globaltitle="";
                                                var inidata=[];
                                                var inivalues=[];
                                                var temparr = [];
                                                inidata = JSON.parse(JSON.stringify(data[0]['lphpdata'][x.label]));
                                                var p=0;
                                                for(key2 in data[0]['lphpdata'][x.label]){
                                                    if(key2!='sum'){
                                                        temparr[p] = data[0]['lphpdata'][x.label][key2]['sum'];
                                                        p=p+1;
                                                    }
                                                }
                                                inivalues = JSON.parse(JSON.stringify(temparr));
                                                inivalues.fill(0);
                                                inivalues[0]=100000;
                                                // console.log('temparr',temparr);
                                                // console.log('inivalues',inivalues);
                                                // console.log('inidata',inidata);
                                                // console.log('phpdata',phpdata);
                                                canhome = 1;
                                                    showgraph(inidata,temparr,inivalues,1);
                                                setTimeout(() => {
                                                    showgraph(phpdata,data[0]['values'],0,0);
                                                },800);
                                                canhome=0;
                                            }
                                        }, {once: true});
                                        //-------------------
                                    },800);
                                    return false;
                                }else{
                                    canhome=0;
                                    setTimeout(() => {
                                        canhome = 1;
                                        myPlot.addEventListener('click', function(evt) {
                                            if (canhome == 1){
                                                globaltitle="";
                                                var inidata=[];
                                                var inivalues=[];
                                                var temparr = [];
                                                inidata = JSON.parse(JSON.stringify(data[0]['lphpdata']));
                                                
                                                var p=0;
                                                for(key2 in data[0]['lphpdata']){
                                                    
                                                    if(key2!='sum'){
                                                        // console.log(data[0]['lphpdata'][key2]['sum']);
                                                        temparr[p] = data[0]['lphpdata'][key2]['sum'];
                                                        p=p+1;
                                                    }
                                                }
                                                inivalues = JSON.parse(JSON.stringify(temparr));
                                                inivalues.fill(0);
                                                inivalues[0]=100000;
                                                // console.log('inidata',inidata);
                                                // console.log('phpdata',phpdata);
                                                canhome = 1;
                                                showgraph(inidata,data[0]['values'],inivalues,1);
                                                setTimeout(() => {
                                                    showgraph(phpdata,data[0]['values']);
                                                },800);
                                                canhome=0;
                                            }
                                        }, {once: true});
                                                    // console.log(canhome);
                                        },50);
                                        return false;
                                    }
                                });
                            // myPlot.addEventListener('click', function(evt) {
                            //     if (canhome == 1){
                            //         // console.log("here");
                                    
                                    
                            //         var inidata=[];
                            //         var inivalues=[];
                            //         inivalues = JSON.parse(JSON.stringify(data[0]['values']));
                            //         inivalues.fill(0);
                            //         inivalues[0]=10000;
                            //         inidata = JSON.parse(JSON.stringify(data[0]['lphpdata']));
                            //         // console.log(inidata);
                            //         // inidata[key]['sum']=10000;
                            //         // console.log('inidata',inidata);
                            //         // inidata.fill(0);
                            //         // inidata[data[0]['labels'].indexOf(x.label)]=10000;
                            //         // console.log("here",inidata,data[0]['lphpdata'][x.label]);
                            //         // console.log("data[0]",Object.size(data[0]['lphpdata'][x.label]));
                            //         canhome = 1;
                            //             showgraph(inidata,data[0]['values'],inivalues,1);
                            //         setTimeout(() => {
                            //             showgraph(phpdata,data[0]['values']);
                            //         },800);
                            //         canhome=0;
                            //     }
                                
                            // }, {once: true});
                    }
                    
                    
                    Object.size = function(obj) {
                        var size = 0,
                            key;
                        for (key in obj) {
                            if (obj.hasOwnProperty(key)) size++;
                        }
                        return size;
                    };

                </script>
            