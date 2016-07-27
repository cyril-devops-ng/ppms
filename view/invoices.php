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
   <title>PPMS Transporter Invoices</title>
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
      <?php require_once 'includes/menutransporter.php'; ?>
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
                     Dashboard
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">PPMS</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Invoices
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
                <!--BEGIN METRO STATES-->
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-blue ">
                        <a href="createinvoice" data-original-title="">
                            <div class="text-center">
                                <i class="icon-edit"></i>
                            </div>
                            <div class="status">Process Invoice</div>
                        </a>
                    </div>
                    
                    <div class="metro-nav-block  nav-block-red">
                        <a href="invoicelist" data-original-title="">
                            <div class="text-center">
                                <i class="icon-th-list"></i>
                            </div>
                            <div class="status">Invoice List</div>
                        </a>
                    </div>
                </div>
                <div class="space10"></div>
                 <div class="row-fluid">
                 <div class="span12">
                     <!-- BEGIN BLANK PAGE PORTLET-->
                     <div class="widget purple">
                         <div class="widget-title">
                             <h4><i class="icon-edit"></i> Invoice Page </h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <a href="javascript:;" class="icon-remove"></a>
                           </span>
                         </div>
                         <div class="widget-body">
                             <div class="row-fluid">
                                 <div class="span12">
                                     <div class="text-center">
                                        <H1><?php echo $_SESSION['user']['sap_cust']; ?></H1>
                                     </div>
                                     <hr>

                                 </div>
                             </div>
                             
                             <div class="row-fluid invoice-list">
                                 <div class="span4">
                                     <h4>ADDRESS</h4>
                                     <p>
                                         <span id="stras"></span>
                                          <br>
                                         <span id="city"></span>
                                    </p>
                                 </div>
                                 <div class="span4">
                                     
                                 </div>
                                 <div class="span4">
                                     <h4>INVOICE INFO</h4>
                                     <ul class="unstyled">
                                         <li>Invoice Number		: <strong><span id="invoiceno">#00000056</span></strong></li>
                                         <li>Invoice Date		: <span id="invoicedate">20/05/2016</span></li>
                                         <li>Due Date			: <span id="duedate">20/05/2016</span></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="space20"></div>
                             <div class="space20"></div>
                             <div class="row-fluid">
                                 <table class="table table-striped table-hover">
                                     <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Delivery No.</th>
                                         <th class="hidden-480">Product</th>
                                         <th class="hidden-480">Unit Cost</th>
                                         <th class="hidden-480">Quantity(Ltrs)</th>
                                         <th>Total</th>
                                     </tr>
                                     </thead>
                                     <tbody id="tableBody">
                                     
                                     
                                     </tbody>
                                 </table>
                             </div>
                             <div class="space20"></div>
                             <div class="row-fluid">
                                 <div class="span4 invoice-block pull-right">
                                     <ul class="unstyled amounts">
                                         <li><strong>Sub - Total amount :</strong> &#8358;<span id="total"></span></li>
                                         <li><strong>VAT :</strong> &#8358;<span id="vat"></span></li>
                                        <li><strong>Grand Total :</strong> &#8358;<span id="subtotal"></li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="space20"></div>
                             <div class="row-fluid text-center">
                                 <a class="btn btn-success btn-large hidden-print" id="submitInvoice"> Submit Your Invoice <i class="icon-check"></i></a>
                                 <img src="img/preloader.gif" id="preloader" height="100px" width="100px">
                                 <a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
                             </div>
                         </div>
                     </div>
                     <!-- END BLANK PAGE PORTLET-->
                 </div>
             </div>
                <!--END METRO STATES-->
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
           $('#preloader').hide();
            var deliveryitems = window.localStorage.getItem('invoice');
            var deliverystring = '';
            var amountstring = '';
            var deliveries = [];
             var rows = '';
             var total = 0;
             var unit = 1.0;
             var transporterid = '';
            deliveries = deliveryitems.split(',');
            for(var a=0;a<deliveries.length;a++){
//                alert(deliveries[a]);
                var delv = JSON.parse($.trim(window.localStorage.getItem('mydeliveries')));
                var delvlist = '';
                var product = '';
                transporterid = window.localStorage.getItem('trans_id');
                $.getJSON('json/trans_results.json',function(key,value){
                    var transporters = key;
                    var tr = JSON.parse($.trim(transporters));
                    for(var t in tr){
                      for( var a=0;a<tr[t].length;a++){
                          var transobj = tr[t][a];
                          if(transobj.cust_id === transporterid){
                              $('#stras').html(transobj.stras);
                          }   
                          
                      }
                    }
                });
                for(var d in delv){
                    for(var i=0;i<delv[d].length;i++){
                        var delvobj = delv[d][i];
                        if(delvobj.vbeln === deliveries[a]){
                            deliverystring += deliveries[a]+",";
                            amountstring += delvobj.amount;
                            if(delvobj.matnr === '000000000000000001'){
//                                product = '<img src="img/station.png" width="30px" height="30px">&nbsp;&nbsp;PMS';
                                product = '&nbsp;&nbsp;PMS';
                            }
                            if(delvobj.matnr === '000000000000000002'){
//                                product = '<img src="img/aviation.png" width="30px" height="30px">&nbsp;&nbsp;ATK';
                                product = '&nbsp;&nbsp;ATK';
                            }
                            if(delvobj.matnr === '000000000000000003'){
//                                product = '<img src="img/gas.png" width="30px" height="30px">&nbsp;&nbsp;AGO';
                                product = '&nbsp;&nbsp;AGO';
                            }
                            if(delvobj.matnr === '000000000000000004'){
//                                product = '<img src="img/kerosene.png" width="30px" height="30px">&nbsp;&nbsp;DPK';
                                product = '&nbsp;&nbsp;DPK';
                            }
                            unit = delvobj.amount / delvobj.quantity;
                            rows += '<tr>'+
                                     '<td>'+(a+1)+'</td>'+
                                    '<td>'+deliveries[a]+'</td>'+
                                    '<td class="hidden-480">'+product+'</td>'+
                                    '<td class="hidden-480">&#8358; '+unit+'</td>'+
                                    '<td class="hidden-480">'+formatNumber(delvobj.quantity)+'</td>'+
                                    '<td>&#8358; '+formatNumber(delvobj.amount)+'</td>'+
                                    '</tr>';
                            
                            total += parseFloat( delvobj.amount);
                        }
                        
                    }
                                  
                }
                
                
            }
            var vat = 0.05 * total;
            var sub = total - vat;
            $('#vat').html(vat);
            $('#tableBody').html(rows);
            $('#subtotal').html(formatNumber(total));
            $('#total').html(formatNumber(sub));
            
            
            $('#submitInvoice').click(function(){
            $('#preloader').show();
            var url = 'invoices';
//            var data = {
//                'trans_id': transporterid,
//                'deliveries':deliverystring,
//                'amount':amountstring
//                
//            };
            deliverystring = deliverystring.substr(0,deliverystring.length-1);
            var data = {
               'inv_po':'true',
               'trans_id':transporterid,
               'deliveries':deliverystring
            };
            
            $.post(url,data,function(msg,stat,xhr){
                if(xhr.readyState === 4){
                    if(xhr.status === 200){
                       setTimeout(function(){
                        $('#preloader').hide();   
                        window.location.href = 'invoicesuccess';
                       },2000);
                    }
                }
            });
            });
       });
   </script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
