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
        <title>PPMS Configuration Screen</title>
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
                    <h3 id="myModalLabel">Configuration Screen</h3>
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
                                Configuration Screen
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Home</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Configuration</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Configuration Setup
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
                    <form method="post" action="configuration" enctype="multipart/form-data">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget green">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Configuration Screen</h4>
                                    <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body">
                                    <div class="tabbable custom-tab tabs-left">
                                        <!-- Only required for left/right tabs -->
                                        <ul class="nav nav-tabs tabs-left">
                                            <li class="active"><a href="#tab_4_1" data-toggle="tab">EXCEPTIONS</a></li>
                                            <li><a href="#tab_4_2" data-toggle="tab">PERSONS</a></li>
                                            <li><a href="#tab_4_3" data-toggle="tab">CHANGE PASSWORD</a></li>
                                            <li><a href="#tab_4_4" data-toggle="tab">CALIBRATION CERTIFICATE</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_4_1">
                                                <h4>Exceptions</h4>
                                                <?php if($_SESSION['configuration_success']): ?>
                                                <div class="alert alert-success">
                                                    <button class="close" data-dismiss="alert">×</button>
                                                    <strong>Success!</strong> Done Successfully!.
                                                </div>
                                                <?php endif; unset($_SESSION['configuration_success']); ?>
                                                <input type="hidden" name="exceptions" value="exceptions"/>
                                                <div class="control-group">
                                                    <label class="control-label">Exception Days</label>
                                                    <div class="controls">
                                                        <input id="exceptiondays" value="<?= $_SESSION['exception_setup'][0]['exception_value'] ?>" name="exceptiondays" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Exception Days" />
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="button" class="btn">Clear</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_4_2">
                                                <h4>Authorized Persons</h4>
                                                <div class="row-fluid">
                                                    <div class="bs-docs-example">
                                                        <ul class="nav nav-tabs" id="myTab">
                                                            <li class="active"><a data-toggle="tab" href="#newperson">New Person</a></li>
                                                            <li><a data-toggle="tab" href="#authorizedpersons">Authorized Persons</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="tab-content" id="myTabContent">
                                                    <div id="newperson" class="tab-pane fade in active">
                                                        <div class="span12">
                                                            <input type="hidden" name="authorizedpersons" value="authorizedpersons"/>
                                                            <div class="control-group">
                                                                <label class="control-label">First Name: </label>
                                                                <div class="controls">
                                                                    <input id="firstname" name="firstname" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Full Name" />
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Last Name: </label>
                                                                <div class="controls">
                                                                    <input id="lastname" name="lastname" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Full Name" />
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Email Address: </label>
                                                                <div class="controls">
                                                                    <input id="email" name="email" type="email" class="span6  tooltips" data-trigger="hover" data-original-title="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-success">Add</button>
                                                                <button type="button" class="btn">Clear</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="authorizedpersons" class="tab-pane fade">
                                                        <div class="span12">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>First Name</th>
                                                                        <th>Last Name</th>
                                                                        <th>Username</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i=1;
                                                                        foreach($_SESSION['authorized_persons'] as $k=>$v){
                                                                           echo '<tr>'.
                                                                                    '<td>'.$i++.'</td>'.
                                                                                    '<td>'.$v['first_name'].'</td>'.
                                                                                    '<td>'.$v['last_name'].'</td>'.
                                                                                    '<td>'.$v['email_address'].'</td>'.
                                                                                    '<td><button id="'.$v['id'].'" class="btn btn-danger">Remove</button></td>'.
                                                                                '</tr>'; 
                                                                            
                                                                        }
                                                                            
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="tab-pane" id="tab_4_3">
                                                <h4>Change Password</h4>
                                                <input type="hidden" name="exceptions" value="exceptions"/>
                                                <div class="control-group">
                                                    <label class="control-label">Old Password</label>
                                                    <div class="controls">
                                                        <input id="oldpassword" name="oldpassword" type="password" class="span6  tooltips" data-trigger="hover" data-original-title="Exception Days" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">New Password</label>
                                                    <div class="controls">
                                                        <input id="newpassword" name="newpassword" type="password" class="span6  tooltips" data-trigger="hover" data-original-title="Exception Days" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Confirm New Password</label>
                                                    <div class="controls">
                                                        <input id="confpassword" name="confpassword" type="password" class="span6  tooltips" data-trigger="hover" data-original-title="Exception Days" />
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="button" class="btn">Clear</button>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="tab-pane" id="tab_4_4">
                                                <h4>Upload Certificate</h4>
                                                <div class="control-group">
                                                    <label class="control-label">Truck Number</label>
                                                    <div class="controls">
                                                        <input name="truck" id="truck" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Truck Number" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Upload Image(*Only PNG allowed)</label>
                                                    <div class="controls">
                                                        <input name="filePic"  accept=".png" id="calibrationcert" type="file" class="span6  tooltips" data-trigger="hover" data-original-title="Calibration certificate" />
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="button" class="btn">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
            $(document).on('click', '.delv', function () {
                var delivery = $(this).attr('href');
                delivery = delivery.substring(1, delivery.length);
                window.delivery = delivery;
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
                $('#myModal').modal('show');
            });
        });
    </script>
    <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
