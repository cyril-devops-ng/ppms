<!DOCTYPE html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
<head>
   <meta charset="utf-8" />
   <title>PPMS Station Delivery Report</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
         <?php require_once 'includes/topbar.php'; ?>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <?php require_once 'includes/menustation.php'; ?>
      <!-- END SIDEBAR -->
      <!-- modal dialog -->
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Delivery Details</h3>
        </div>
        <div class="modal-body">
            <div>
                
            </div>
            <center>
                <br/><img src="img/forte.png" width="200px" height="200px"><br/>
                <div id="deliverydetails">

                </div>
            </center>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                    Reports
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Reports</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Deliveries Headed My Way
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text" placeholder="Search Deliveries">
                                   <button id="searchBtn" class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
           
            <div class="row-fluid">
                <div class="span12">
                    <table border="0">
                        <tr>
                            <td>
                                <button class="btn-block btn-success" id="loaddeliveries" style="width:300px;height:50px">RE-LOAD DELIVERIES FROM SAP</button>
                                
                            </td>
                            <td>
                                <img src="img/preloader.gif" id="preloader" height="100px" width="100px">
                             </td>
                            <td>
                                <img src="img/accept.png" id="accept" height="30px" width="30px">
                            </td>
                            <td>
                                <input type="date" class="form-control" name="from" id="from" value="2015-07-01"/>
                            </td>
                            <td>
                                <input type="date"  class="form-control" name="to" id="to" value="2015-07-31"/>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <div class="widget green">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>DELIVERIES HEADED MY WAY</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <input id="username" type="hidden" value="<?php echo $_SESSION['user']['sap_cust'];  ?>"/>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th style="width:150px;">DELIVERY NUMBER</th>
                                <th style="width:150px;">PRODUCT</th>
                                <th style="width:150px;">CUSTOMER</th>
                                <th class="hidden-phone">PGI DATE</th>
                                <th class="hidden-phone">POD DATE</th>
                                <th class="hidden-phone">POD TIME</th>
                                <th class="hidden-phone">STATUS</th>
                                
                            </tr>
                            </thead>
                            <tbody id="tableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2016 &copy; Serve Consulting Ltd.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="assets/chart-master/Chart.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>

   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="js/easy-pie-chart.js"></script>
   <script src="js/sparkline-chart.js"></script>
   <script src="js/home-page-calender.js"></script>
   <script src="js/home-chartjs.js"></script>
   <script src="js/editable-table.js"></script>

   <!-- END JAVASCRIPTS -->
   <script>
       jQuery(document).ready(function() {
       });
   </script>
   <script type="text/javascript">
       $(document).ready(function(){
           var username = $('#username').val();
           $('#preloader').hide();
           $('#accept').hide();
           function fetchDeliveries(){
           $.getJSON('json/delivery_results.json' , function(key,value){
               var deliveries = key;
               var delv = JSON.parse($.trim(deliveries));
               var delvlist = '';
               var img = '';
               for(var d in delv){
                   for(var i=0;i<delv[d].length;i++){
                       var delvobj = delv[d][i];
                       var time = delvobj.pod_time.toString();
                        
                        if(delvobj.matnr == '000000000000000001'){
                            img = '<img src="img/station.png" width="25px" height="25px">&nbsp;&nbsp;PMS';
                        }
                        else if(delvobj.matnr == '000000000000000002'){
                            img = '<img src="img/aviation.png" width="25px" height="25px">&nbsp;&nbsp;ATK';
                        }
                        else if(delvobj.matnr == '000000000000000003'){
                            
                            img = '<img src="img/gas.png" width="25px" height="25px">&nbsp;&nbsp;AGO';
                        }
                        else if(delvobj.matnr == '000000000000000004'){
                            img = '<img src="img/kerosene.png" width="25px" height="25px">&nbsp;&nbsp;DPK';
                        }else{
                            img = '<img src="img/other.png" width="25px" height="25px">&nbsp;&nbsp;NA';
                        }
                        if( delvobj.vbeln === window.delivery ){
                            $('#delnum').html(delvobj.vbeln);
                            $('#transporter').html(delvobj.transporter);
                            $('#stationrep').html(delvobj.contactname);
                            $('#driver').html(delvobj.driver);
                            $('#truck').html(delvobj.truckno);
                            $('#pgi').html(delvobj.pgi_date);
                            $('#cust').html(delvobj.customer);
                            $('#name').html(delvobj.cust_name);
                            $('#address').html(delvobj.address);
                            $('#driverphone').html('<img src="img/call.png" width="25px" height="25px">&nbsp;'+delvobj.cellno);
                            $('#stationphone').html('<img src="img/call.png" width="25px" height="25px">&nbsp;'+delvobj.contactno);
                            $('#qty').html(delvobj.quantity+" ltrs.");
                        }
                        if($.trim(delvobj.cust_name).replace('.','').replace(',','').indexOf($.trim(username).replace('.','').replace(',','')) >= 0){
                           
                        if( delvobj.pod_time.toString() === '000000' ){
                            delvlist += '<tr class="odd gradeX">'+
                                '<td><input type="checkbox" class="checkboxes" value="1" /></td>'+
                                '<td style="background-color: #90A4AE;color:white;width:150px"><a class="delv" href="#'+delvobj.vbeln+'"><span style="color:white;font-weight: bold;">'+delvobj.vbeln+"&nbsp;"+'</span></a></td>'+
                                '<td class="hidden-phone">'+img+
                                '<td class="hidden-phone">'+delvobj.cust_name+
                                '<td class="hidden-phone">'+delvobj.pgi_date.substring(6,8)+"/"+delvobj.pgi_date.substring(4,6)+
                                '/'+delvobj.pgi_date.substring(0,4)+'</td>'+
                                '<td class="hidden-phone">'+'--/--/----'+'</td>'+
                                '<td class="hidden-phone">'+time.substring(0,2)+':'+time.substring(2,4)+'</td>'+
                                '<td class="hidden-phone"><img src="img/transit.png" width="30px" height="30px"></td>'+
                                '</tr>';
                        }else{
                            delvlist += '<tr class="odd gradeX">'+
                                '<td><input type="checkbox" class="checkboxes" value="1" /></td>'+
                                '<td style="background-color: #87bb33;color:white;"><a class="delv" href="#'+delvobj.vbeln+'"><span style="color:white;font-weight: bold;">'+delvobj.vbeln+"&nbsp;"+'</span></a></td>'+
                                '<td class="hidden-phone">'+img+
                                '<td class="hidden-phone">'+delvobj.cust_name+
                                '<td class="hidden-phone">'+delvobj.pgi_date.substring(6,8)+"/"+delvobj.pgi_date.substring(4,6)+
                                '/'+delvobj.pgi_date.substring(0,4)+'</td>'+
                                '<td class="hidden-phone">'+delvobj.pod_date.substring(6,8)+'/'+delvobj.pod_date.substring(4,6)+
                                '/'+delvobj.pod_date.substring(0,4)+'</td>'+
                                '<td class="hidden-phone">'+time.substring(0,2)+':'+time.substring(2,4)+'</td>'+
                                '<td class="hidden-phone"><img src="img/success.png" width="30px" height="30px"></td>'+
                                '</tr>';
                        }
                        }
                        
                   }
               }
               $('#tableBody').html(delvlist);
               if(!window.delivery){
                    EditableTable.init();
               }
           });
        }
           
           $('#loaddeliveries').click( function(){
                $('#preloader').show();
                var start  = $('#from').val();
                var end  = $('#to').val();
                $.post('deliveryreport',{'deliveries':'all','start':start,'end':end},
                function(msg,stat,xhr){
                    if(xhr.readyState === 4){
                        if(xhr.status === 200){
                            $('#preloader').hide();
                            $('#accept').show();
                            setTimeout(function(){
                                window.location.href = 'stationreport';
                            },2000);
                        }else{
                            $('#preloader').hide();
                         }
                    }
                });
           });
           
            $('body').on('load', fetchDeliveries());
            $('#searchBtn').click(function(){
                var text = $('#appendedInputButton').val();
                 if ( text !== '' ){
                     $("td:contains('"+text+"')").each( function( i, element ) {
                         var content = $(element).text();
                         content = content.replace( text, '<span class="search-found">' + text + '</span>' );
                         $(element).html( content );
                         var pos = $(element).offset().top;
                         pos -= 200;
                         $('html, body').animate({
                             scrollTop: pos
                         }, 2000);
                    });
                }
            });
            
            $(document).on('click','.delv',function(){
                var delivery = $(this).attr('href');
                delivery = delivery.substring(1,delivery.length);
                window.delivery = delivery;
                 fetchDeliveries();
                var table = '<table cellpadding=10px class="table">';
                table += '<tr><th align="left">Delivery Number</th><td id="delnum"></td ></tr>';
                table += '<tr><th align="left">Customer Number</th><td id="cust"></td></tr>';
                table += '<tr><th align="left">Customer Name</th><td id="name"></td></tr>';
                table += '<tr><th align="left">Customer Address</th><td id="address"></td></tr>';
                table += '<tr><th align="left">Station Rep</th><td id="stationrep"></td></tr>';
                table += '<tr><th align="left">Station Phone No</th><td id="stationphone"></td></tr>';
                table += '<tr><th align="left">Transporter</th><td id="transporter"></td></tr>';
                table += '<tr><th align="left">Driver</th><td id="driver"></td></tr>';
                table += '<tr><th align="left">Driver Phone No</th><td id="driverphone"></td></tr>';
                table += '<tr><th align="left">Truck Number</th><td id="truck"></td></tr>';
                table += '<tr><th align="left">Goods Issue Date</th><td id="pgi"></td></tr>';
                table += '<tr><th align="left">Quantity Shipped</th><td id="qty"></td></tr>';
                table += '</table>';
                $('#deliverydetails').html(table);
                $('#myModal').modal('show');
            });
       });
   </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
