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
   <title>PPMS Incoming Deliveries</title>
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
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <?php require_once 'includes/menustation.php'; ?>
      <!-- END SIDEBAR -->
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
                     INCOMING DELIVERIES HEADED MY WAY
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">POD</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           INCOMING DELIVERIES HEADED MY WAY
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
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
                    <div class="widget green">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> INCOMING DELIVERIES</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <input id="username" type="hidden" value="<?php echo $_SESSION['user']['sap_cust'];  ?>"/>
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th>DELIVERY NUMBER</th>
                                <th class="hidden-phone">QUANTITY</th>
                                <th class="hidden-phone">PGI DATE</th>
                                <th class="hidden-phone">TRANSPORTER</th>
                                <th class="hidden-phone">DRIVER</th>
                                <th class="hidden-phone">TRUCK NO.</th>
                                <th class="hidden-phone">STATUS</th>
                                <th class="hidden-phone">ACTIONS</th>
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


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="js/easy-pie-chart.js"></script>
   <script src="js/sparkline-chart.js"></script>
   <script src="js/home-page-calender.js"></script>
   <script src="js/home-chartjs.js"></script>

   
   <script type="text/javascript">
       $(document).ready(function(){
           $('.deldetails').click(function(){
               window.location.href = 'deliverydetail';
               
           });
           
           var customer = $('#username').val();
           var custid = '';
           function loadDeliveries(){
               $.getJSON('json/results.json',function(k,v){
               var cust = JSON.parse($.trim(k));
               for(var c in cust){
                   for(var i=0;i<cust[c].length;i++){
                       var custobj = cust[c][i];
                       if($.trim(custobj.cust_name.replace(',','').replace('.','')).indexOf( $.trim(customer.replace(',','').replace('.','')) ) >= 0){
                            custid = custobj.cust_id;
//                            var url = 'http://10.2.1.18:8000/sap/bc/webrfc?_FUNCTION=ZPOD_GET_DELIVERIES&_CUSTNO='+custid;
                            var url = 'http://FODSAP:8000/sap/bc/webrfc?_FUNCTION=ZPOD_GET_DELIVERIES&_CUSTNO='+custid;
                            $.ajax({
                                type:'GET',
                                dataType:'json',
                                crossOrigin: true,
                                url:url,

                                success: function(data, textStatus){    
                                    window.localStorage.removeItem('incomingdeliveries');
                                    window.localStorage.setItem('incomingdeliveries' , JSON.stringify(data));
                                    
                                    
                                    var data  = window.localStorage.getItem('incomingdeliveries');
                                    var rows = '';
                                    if( !data ){
                                        
                                    }else{
                                        var d = JSON.parse(data);
                                        for(var a in d){
                                            if(a==='results'){
                                                for(var i=0;i<d[a].length;i++){
                                                    if( typeof d[a][i]["vbeln"] !== 'undefined' ){
                                                        if(d[a][i]["vbeln"] === window.delivery){
                                                            $('#delnum').html(window.delivery);
                                                            $('#cust').html(window.delivery);
                                                            $('#name').html(window.delivery);
                                                            $('#address').html(window.delivery);
                                                            $('#stationrep').html(window.delivery);
                                                            $('#stationphone').html(window.delivery);
                                                            $('#transporter').html(d[a][i]['transporter']);
                                                            $('#driver').html(window.delivery);
                                                            $('#driverphone').html(window.delivery);
                                                            $('#truck').html(d[a][i]['truckno']);
                                                            $('#pgi').html(d[a][i]['del_date']);
                                                            $('#qty').html(formatNumber(d[a][i]['quantity']));
                                                        
                            
                                                        }
                                                        
                                                        rows += '<tr class="odd gradeX">'+
                                                                '<td><input type="checkbox" class="checkboxes" value="1" /></td>'+
                                                                '<td style="color:black;">'+d[a][i]['vbeln']+'</td>'+
                                                                '<td class="hidden-phone">'+formatNumber(d[a][i]['quantity'])+'</td>'+
                                                                '<td class="hidden-phone">'+d[a][i]['del_date']+'</td>'+
                                                                '<td class="hidden-phone">'+d[a][i]['transporter']+'</td>'+
                                                                '<td class="center hidden-phone">'+d[a][i]['driver']+'</td>'+
                                                                '<td class="center hidden-phone">'+d[a][i]['truckno']+'</td>'+
                                                                '<td class="center hidden-phone"><img src="img/transit.png" width="25px" height="25px"></td>'+
                                                                '<td class="hidden-phone" >'+
                                                                    '<button class="btn  btn-success deldetails" type="button" id="'+d[a][i]['vbeln']+'">DETAILS</button>'+
//                                                                    '<button class="btn  btn-warning" type="button">TRACK DELIVERY</button>'+
                                                                    '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn  btn-primary pod" type="button" id="'+d[a][i]['vbeln']+'">POD</button>'+
                                                                '</td>'+
                                                                '</tr>';
                                                    }
                                                }
                                            }
                                        }
                                        $('#tableBody').html(rows);
                                     }
                                },
                                error:function(xhr,textStatus,errorThrown){
//                                alert(errorThrown);
                                    $('#preloader').hide();
                                    alert('Connection to FORTE has failed! Check your connection parameters!');
                                }
                            });
                       }
                   }
               }
           });
           }
           
           
           
           
           //register action for delivery details
           $('body').on('click','.deldetails',function(){
           window.delivery = $(this).attr('id');
           loadDeliveries();
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
           
           //register action for pod
           $('body').on('click','.pod',function(){
               window.location.href = 'deliverydetail';
           });
           
           $(document).on('load', loadDeliveries());
       });
   
   </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
