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
        <title>PPMS Inventory Station</title>
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
                                Daily Inventory
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Home</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Inventory</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Stock Count
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
                            <!-- BEGIN SAMPLE FORMPORTLET-->
                            <?php // print'<pre>'; print_r($_SESSION); print'</pre>';?>
                            <div class="widget widget-tabs green">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i> STORAGE TANKS</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="tabbable ">
                                        <ul class="nav nav-tabs">
                                            <li><a href="#widget_tab6" data-toggle="tab">TANK 6</a></li>
                                            <li><a href="#widget_tab5" data-toggle="tab">TANK 5</a></li>
                                            <li><a href="#widget_tab4" data-toggle="tab">TANK 4</a></li>
                                            <li><a href="#widget_tab3" data-toggle="tab">TANK 3</a></li>
                                            <li><a href="#widget_tab2" data-toggle="tab">TANK 2</a></li>
                                            <li class="active"><a href="#widget_tab1" data-toggle="tab">TANK 1</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="widget_tab1">
                                                <form action="stockcountstation" method="POST" class="form-horizontal">
                                                    <input type="hidden" name="tank1"  value="tank1" />
                                                    <input type="hidden" name="user" value="<?php echo $_SESSION['user']['id']; ?>">
                                                    <h2>STORAGE TANK 1</h2><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Product</label>
                                                        <div class="controls">
                                                            <select name="product1" class="span6 " data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="Petrol">Petrol</option>
                                                                <option value="Diesel">Diesel</option>
                                                                <option value="Kerosene">Kerosene</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Quantity</label>
                                                        <div class="controls">
                                                            <input name="quantity1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Stock Value." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">NH</label>
                                                        <div class="controls">
                                                            <input name="nh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 1." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">LH</label>
                                                        <div class="controls">
                                                            <input name="lh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">OH</label>
                                                        <div class="controls">
                                                            <input name="oh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Date</label>
                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="date1" type="date" value="" class="span6 date">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Time</label>

                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="time1" type="time" value="" class="span6 time">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="button" class="btn">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="widget_tab2">
                                                <form action="stockcountstation" method="POST" class="form-horizontal">
                                                    <input type="hidden" name="tank2"  value="tank2" />
                                                    <h2>STORAGE TANK 2</h2><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Product</label>
                                                        <div class="controls">
                                                            <select name="product1" class="span6 " data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="Petrol">Petrol</option>
                                                                <option value="Diesel">Diesel</option>
                                                                <option value="Kerosene">Kerosene</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Quantity</label>
                                                        <div class="controls">
                                                            <input name="quantity1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Stock Value." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">NH</label>
                                                        <div class="controls">
                                                            <input name="nh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 1." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">LH</label>
                                                        <div class="controls">
                                                            <input name="lh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">OH</label>
                                                        <div class="controls">
                                                            <input name="oh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Date</label>
                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="date1" type="date" value="" class="span6 date">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Time</label>

                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="time1" type="time" value="" class="span6 time">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="button" class="btn">Cancel</button>
                                                    </div>
                                                </form>

                                            </div>
                                            <div class="tab-pane" id="widget_tab3">
                                                <form action="stockcountstation" method="POST" class="form-horizontal">
                                                    <input type="hidden" name="tank3"  value="tank3" />
                                                    <h2>STORAGE TANK 3</h2><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Product</label>
                                                        <div class="controls">
                                                            <select name="product1" class="span6 " data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="Petrol">Petrol</option>
                                                                <option value="Diesel">Diesel</option>
                                                                <option value="Kerosene">Kerosene</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Quantity</label>
                                                        <div class="controls">
                                                            <input name="quantity1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Stock Value." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">NH</label>
                                                        <div class="controls">
                                                            <input name="nh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 1." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">LH</label>
                                                        <div class="controls">
                                                            <input name="lh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">OH</label>
                                                        <div class="controls">
                                                            <input name="oh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Date</label>
                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="date1" type="date" value="" class="span6 date">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Time</label>

                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="time1" type="time" value="" class="span6 time">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="button" class="btn">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="widget_tab4">
                                                <form action="stockcountstation" method="POST" class="form-horizontal">
                                                    <input type="hidden" name="tank4"  value="tank4" />
                                                    <h2>STORAGE TANK 4</h2><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Product</label>
                                                        <div class="controls">
                                                            <select name="product1" class="span6 " data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="Petrol">Petrol</option>
                                                                <option value="Diesel">Diesel</option>
                                                                <option value="Kerosene">Kerosene</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Quantity</label>
                                                        <div class="controls">
                                                            <input name="quantity1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Stock Value." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">NH</label>
                                                        <div class="controls">
                                                            <input name="nh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 1." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">LH</label>
                                                        <div class="controls">
                                                            <input name="lh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">OH</label>
                                                        <div class="controls">
                                                            <input name="oh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Date</label>
                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="date1" type="date" value="" class="span6 date">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Time</label>

                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="time1" type="time" value="" class="span6 time">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="button" class="btn">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="widget_tab5">
                                                <form action="stockcountstation" method="POST" class="form-horizontal">
                                                    <input type="hidden" name="tank5"  value="tank5" />
                                                    <h2>STORAGE TANK 5</h2><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Product</label>
                                                        <div class="controls">
                                                            <select name="product1" class="span6 " data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="Petrol">Petrol</option>
                                                                <option value="Diesel">Diesel</option>
                                                                <option value="Kerosene">Kerosene</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Quantity</label>
                                                        <div class="controls">
                                                            <input name="quantity1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Stock Value." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">NH</label>
                                                        <div class="controls">
                                                            <input name="nh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 1." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">LH</label>
                                                        <div class="controls">
                                                            <input name="lh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">OH</label>
                                                        <div class="controls">
                                                            <input name="oh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Date</label>
                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="date1" type="date" value="" class="span6 date">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Time</label>

                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="time1" type="time" value="" class="span6 time">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="button" class="btn">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="widget_tab6">
                                                <form action="stockcountstation" method="POST" class="form-horizontal">
                                                    <input type="hidden" name="tank6"  value="tank6" />
                                                    <h2>STORAGE TANK 6</h2><br/>
                                                    <div class="control-group">
                                                        <label class="control-label">Product</label>
                                                        <div class="controls">
                                                            <select name="product1" class="span6 " data-placeholder="Choose a Category" tabindex="1">
                                                                <option value="Petrol">Petrol</option>
                                                                <option value="Diesel">Diesel</option>
                                                                <option value="Kerosene">Kerosene</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Quantity</label>
                                                        <div class="controls">
                                                            <input name="quantity1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Stock Value." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">NH</label>
                                                        <div class="controls">
                                                            <input name="nh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 1." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">LH</label>
                                                        <div class="controls">
                                                            <input name="lh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">OH</label>
                                                        <div class="controls">
                                                            <input name="oh1" type="text" class="span6  tooltips" data-trigger="hover" data-original-title="Measure 2." />
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Date</label>
                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="date1" type="date" value="" class="span6 date">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Time</label>

                                                        <div class="controls">
                                                            <div class="bootstrap-timepicker">
                                                                <input name="time1" type="time" value="" class="span6 time">
                                                                <i class="icon-time"
                                                                   style="margin: -2px 0 0 -22.5px; pointer-events: none;position: relative;"></i>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="button" class="btn">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <!-- END SAMPLE FORM PORTLET-->
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
