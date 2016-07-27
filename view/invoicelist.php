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
   <title>PPMS Transporter List of Invoices</title>
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
                    
<!--                    <div class="metro-nav-block  nav-block-grey">
                        <a href="invoices" data-original-title="">
                            <div class="text-center">
                                <i class="icon-eye-open"></i>
                            </div>
                            <div class="status">View Invoice</div>
                        </a>
                    </div>-->
                    
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
                             <h4><i class="icon-edit"></i> Invoice List </h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <a href="javascript:;" class="icon-remove"></a>
                           </span>
                         </div>
                         <div class="widget-body">
                             <div class="portlet-body">
                                 <div class="invoice-date-range span12 form">
                                     <form action="#" class="form-horizontal form-row-seperated">
                                         <div class="control-group ">
                                             <label class="control-label">From</label>
                                             <input id="dp1" type="text" value="12-02-2012" size="16" class="m-ctrl-medium">
                                             <label class="control-label">To</label>
                                             <input id="dp2" type="text" value="12-02-2012" size="16" class="m-ctrl-medium">
                                         </div>
                                     </form>
                                 </div>
                                 <div class="space15"></div>
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                         <th>Invoice Number</th>
                                         <th>Invoice Date</th>
                                         <th>Amount</th>
                                         <th>View</th>
                                         <th>Delete</th>
                                     </tr>
                                     </thead>
                                     <tbody id="tableBody">
                                     </tbody>
                                 </table>
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
   <script type="text/javascript">
       $(document).ready(function(){
           var contains = function(needle) {
    // Per spec, the way to identify NaN is that it is not equal to itself
    var findNaN = needle !== needle;
    var indexOf;

    if(!findNaN && typeof Array.prototype.indexOf === 'function') {
        indexOf = Array.prototype.indexOf;
    } else {
        indexOf = function(needle) {
            var i = -1, index = -1;

            for(i = 0; i < this.length; i++) {
                var item = this[i];

                if((findNaN && item !== item) || item === needle) {
                    index = i;
                    break;
                }
            }

            return index;
        };
    }

    return indexOf.call(this, needle) > -1;
};

            var inv_list = window.localStorage.getItem('invoices');
            inv_list = JSON.parse(inv_list);
            var row = '';
            var f = false;
            var inv = [];
            for(var n=0;n<inv_list.length;n++){
                    if(!contains.call(inv,inv_list[n].invoice_no)){
                        row += '<tr class="">'+
                            '<td><img src="img/saplogo.png" width="60px" height="10px"/>'+inv_list[n].invoice_no+'</td>'+
                            '<td>'+inv_list[n].invoice_date+'</td>'+
                            '<td>'+inv_list[n].amount+'</td>'+
                            '<td><a class="view" href="javascript:;" id="'+inv_list[n].invoice_no+'">View</a></td>'+
                            '<td><a class="delete" href="javascript:;">Delete</a></td>'+
                            '</tr>';
                        inv.push(inv_list[n].invoice_no);  
                    }
             }
             
             $('#tableBody').html(row);
             
             $('body').on('click','.view',function(){
                var invoice = $(this).attr('id');
                var selected = '';
                $.post('invoicelist',{'invoice':invoice},function(msg,stat,xhr){
                    if(xhr.readyState === 4){
                        if(xhr.status === 200){
                            var inv_list = JSON.parse($.trim(msg));
                            for(var n=0;n<inv_list.length;n++){
                                selected+= inv_list[n].delivery+",";
                             }
                             
                             selected = selected.substring(0,selected.length-1);
                             window.localStorage.setItem('selectedinvoice',selected);
                             window.location.href = 'displayinvoice';
                        }
                    }
                });
             });
       });
   </script>
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
           EditableTable.init();
       });
   </script>
   
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->

<!-- Mirrored from thevectorlab.net/metrolab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 24 Apr 2016 06:43:55 GMT -->
</html>
