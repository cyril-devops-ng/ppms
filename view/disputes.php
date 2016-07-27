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
        <title>PPMS Disputes</title>
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
                                    Dispute Report
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
                                    <h4><i class="icon-reorder"></i>Dispute Report</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <?php
//                        print_r($_SESSION['disputes']);
                                    ?>
                                    <table class="table table-striped table-bordered" id="sample_1">
                                        <thead>
                                            <tr> 
                                                <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                                <th style="width:100px;">Delivery</th>
                                                <th style="width:100px;">Product</th>
                                                <th style="width:250px;">Customer Name</th>
                                                <th class="hidden-phone">Location</th>
                                                <th class="hidden-phone">Transporter</th>
                                                <th class="hidden-phone">Driver</th>
                                                <th class="hidden-phone">Shortage</th>
                                                <th class="hidden-phone">Dispute Comment</th>
                                                <th class="hidden-phone">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($_SESSION['disputes'] as $k => $v) {
                                                echo '<tr class="odd gradeX">';
                                                echo '<td><input type="checkbox" class="checkboxes" value="1" /></td>';
                                                echo '<td><a class="delv" href="#' . $v['delivery'] . '">' . $v['delivery'] . '</a></td>';
                                                echo '<td><img src="img/station.png" width="25px" height="25px"></td>';
                                                echo '<td>' . $v['station'] . '</td>';
                                                echo '<td>Lagos, Nigeria</td>';
                                                echo '<td>ADMODIBBO AND SONS</td>';
                                                echo '<td class="hidden-phone">ADAMU</td>';
                                                echo '<td>' . $v['shortage'] . '</td>';
                                                echo '<td>' . $v['comment'] . '</td>';
                                                echo '<td><button class="btn btn-success" type="button">Process</button></td>';
                                                echo '</tr>';
                                            }
                                            ?>

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
            $(document).ready(function () {

                $("body").addClass("loading");
                setTimeout(function () {
                    $("body").removeClass("loading");
                }, 4000);
//                var delivery = $(this).attr('href');
//                delivery = delivery.substring(1, delivery.length);
//                window.delivery = delivery;
                // fetchDeliveries();
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
//                $('#myModal').modal('show');
            });
         
        </script>
        <!-- END JAVASCRIPTS -->   
        <div class="modall">  </div>
    </body>
    <!-- END BODY -->

    <!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
