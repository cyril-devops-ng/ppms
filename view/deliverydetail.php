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
   <title>PPMS Delivery Details</title>
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
                     Delivery Information
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
                           Delivery Document
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
            <!-- BEGIN INLINE TABS PORTLET-->
            <div class="widget green">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> Delivery Document</h4>
               <span class="tools">
               <a href="javascript:;" class="icon-chevron-down"></a>
               <a href="javascript:;" class="icon-remove"></a>
               </span>
                </div>
                <div class="widget-body">
                    <div class="bs-docs-example">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a data-toggle="tab" href="#delivery">Delivery</a></li>
                            <li><a data-toggle="tab" href="#calibration">Calibration</a></li>
                            <li><a data-toggle="tab" href="#gantry">Gantry Info</a></li>
                           
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div id="delivery" class="tab-pane fade in active">
                                <p>Delivery Info</p>
                                <div class="widget green">
                                <div class="widget-title">
                                    <h4>
                                        Delivery Info
                                    </h4>
                                           <span class="tools">
                                               <a class="icon-chevron-down" href="javascript:;"></a>
                                               <a class="icon-remove" href="javascript:;"></a>
                                           </span>
                                </div>
                                <div class="widget-body form">
                                    <form class="form-horizontal" action="#">
                                        <div class="control-group">
                                            <label class="control-label">Delivery Number</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="80000002">
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">Transporter</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="ABC TRANSPORTERS">
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">Driver</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="Lawal Donald">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Truck Number</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="ABC 123 XYZ">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Quantity Shipped</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="33000">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            </div>
                            <div id="calibration" class="tab-pane fade">
                                <p>Calibration Certificate</p>
                                <img src="img/cal_cert.png" >
                            </div>
                            <div id="gantry" class="tab-pane fade">
                                <p>Compartment 1</p>
                                <div class="widget green">
                                <div class="widget-title">
                                    <h4>
                                        Haulage Info
                                    </h4>
                                           <span class="tools">
                                               <a class="icon-chevron-down" href="javascript:;"></a>
                                               <a class="icon-remove" href="javascript:;"></a>
                                           </span>
                                </div>
                                <div class="widget-body form">
                                    <form class="form-horizontal" action="#">
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched Quantity</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received Quantity</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched Ullage</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received Ullage</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched NH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received NH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched LH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="10" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received LH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched OH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="10" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received OH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                                
                                <p>Compartment 2</p>
                                <div class="widget blue">
                                <div class="widget-title">
                                    <h4>
                                        Haulage Info
                                    </h4>
                                           <span class="tools">
                                               <a class="icon-chevron-down" href="javascript:;"></a>
                                               <a class="icon-remove" href="javascript:;"></a>
                                           </span>
                                </div>
                                 <div class="widget-body form">
                                    <form class="form-horizontal" action="#">
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched Quantity</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received Quantity</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched Ullage</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received Ullage</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched NH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received NH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched LH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="10" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received LH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched OH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="10" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received OH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                                
                                <p>Compartment 3</p>
                                <div class="widget blue">
                                <div class="widget-title">
                                    <h4>
                                        Haulage Info
                                    </h4>
                                           <span class="tools">
                                               <a class="icon-chevron-down" href="javascript:;"></a>
                                               <a class="icon-remove" href="javascript:;"></a>
                                           </span>
                                </div>
                                 <div class="widget-body form">
                                    <form class="form-horizontal" action="#">
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched Quantity</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received Quantity</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched Ullage</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received Ullage</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched NH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received NH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched LH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="10" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received LH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" style="background-color: green;color:white;">Dispatched OH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="10" disabled>
                                            </div>
                                            <label class="control-label" style="background-color: blue;color:white;">Received OH</label>

                                            <div class="controls">
                                                <input type="text" class=" small" value="100" >
                                            </div>
                                        </div>
                                   </form>
                                </div>
                            </div>
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INLINE TABS PORTLET-->
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

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
