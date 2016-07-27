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
   <title>PPMS Inventory Report</title>
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
      <?php require_once 'includes/menu.php'; ?>
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
                    Reports
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
                           Inventory Report
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text" placeholder="Search Inventory List">
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
                                <button class="btn-block btn-success" id="loadcustomers" style="width:300px;height:50px">RE-LOAD INVENTORY</button>
                                
                            </td>
                            <td>
                                <img src="img/preloader.gif" id="preloader" height="100px" width="100px">
                             </td>
                            <td>
                                <img src="img/accept.png" id="accept" height="30px" width="30px">
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <div class="widget green">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>SAP Inventory List</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                <th style="width:10px;">S/No</th>
                                <th class="hidden-phone">PRODUCT</th>
                                <th class="hidden-phone">PLANT</th>
                                <th class="hidden-phone">STORAGE LOCATION</th>
                                <th class="hidden-phone">QUANTITY</th>
                                
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
   <<script type="text/javascript">
        
   $(document).ready(function(){
     
//       EditableTable.init();
       $('#preloader').hide();
       $('#accept').hide();
       $.fn.digits = function(){ 
            return this.each(function(){ 
                $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
            });
        };
       
       function fetchCustomers(){
           $.getJSON('json/inventory_results.json' , function(key,value){
               var customers = key;
               var cust = JSON.parse($.trim(customers));
               var custlist = '';
               for(var c in cust){
                   for(var i=0;i<cust[c].length;i++){
                       var custobj = cust[c][i];
                       if(custobj.matnr === '000000000000000001'){
                           custlist += '<tr class="odd gradeX">'+
                                '<td><input type="checkbox" class="checkboxes" value="1" /></td>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td class="hidden-phone"><img src="img/station.png" width="25px" height="25px">&nbsp;&nbsp;PMS</td>'+
                                '<td class="hidden-phone">'+custobj.werks+ ': '+custobj.plantname + '</td>'+
                                '<td class="hidden-phone">'+custobj.lgort+ ': '+custobj.storename +'</td>'+
                                '<td class="hidden-phone"><span class="number">'+formatNumber(custobj.labst.toString())+'</span></td>'+
                                '</tr>';
                        }
                        if(custobj.matnr === '000000000000000002'){
                            custlist += '<tr class="odd gradeX">'+
                                '<td><input type="checkbox" class="checkboxes" value="1" /></td>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td class="hidden-phone"><img src="img/aviation.png" width="25px" height="25px">&nbsp;&nbsp;ATK</td>'+
                                '<td class="hidden-phone">'+custobj.werks+ ': '+custobj.plantname + '</td>'+
                                '<td class="hidden-phone">'+custobj.lgort+ ': '+custobj.storename +'</td>'+
                                '<td class="hidden-phone"><span class="number">'+formatNumber(custobj.labst.toString())+'</span></td>'+
                                '</tr>';
                        }
                        
                        if(custobj.matnr === '000000000000000003'){
                            custlist += '<tr class="odd gradeX">'+
                                '<td><input type="checkbox" class="checkboxes" value="1" /></td>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td class="hidden-phone"><img src="img/gas.png" width="25px" height="25px">&nbsp;&nbsp;AGO</td>'+
                                 '<td class="hidden-phone">'+custobj.werks+ ': '+custobj.plantname + '</td>'+
                                '<td class="hidden-phone">'+custobj.lgort+ ': '+custobj.storename +'</td>'+
                                '<td class="hidden-phone"><span class="number">'+custobj.labst+'</span></td>'+
                                '</tr>';
                        }
                        if(custobj.matnr === '000000000000000004'){
                            custlist += '<tr class="odd gradeX">'+
                                '<td><input type="checkbox" class="checkboxes" value="1" /></td>'+
                                '<td>'+(i+1)+'</td>'+
                                '<td class="hidden-phone"><img src="img/kerosene.png" width="25px" height="25px">&nbsp;&nbsp;DPK</td>'+
                                 '<td class="hidden-phone">'+custobj.werks+ ': '+custobj.plantname + '</td>'+
                                '<td class="hidden-phone">'+custobj.lgort+ ': '+custobj.storename +'</td>'+
                                '<td class="hidden-phone"><span class="number">'+custobj.labst+'</span></td>'+
                                '</tr>';
                        }
                       
                        
                   }
               }
               $('#tableBody').html(custlist);
               EditableTable.init();
           });
        }
       
       $('#loadcustomers').click(function(){
           $('#preloader').show();
           $.post('inventoryreport',{'inventory':'all'},function(msg,stat,xhr){
               if(xhr.readyState === 4){
                   if(xhr.status === 200){
                       $('#preloader').hide();
                       $('#accept').show();
                       setTimeout(function(){
                           window.location.href = 'inventoryreport';
                       },2000);
                   }else{
                       $('#preloader').hide();
                    }
               }
           });
       });
       $('body').on('load', fetchCustomers());
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
      
       
       
       
   });
   </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
