<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <?php if ( $_SESSION['user']['sap_cust'] != 'Customer Service' ) : ?>
              <li class="actual sub-menu active">
                  <a  href="home">
                      <i class="icon-dashboard"></i>
                      <span>DASHBOARD</span>
                  </a>
              </li>
<!--              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>POD</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="awaitingdeliveries">Awaiting Deliveries</a></li>
                      <li><a class="" href="deliveryreport">Delivery Reports</a></li>
                  </ul>
              </li>-->
<!--              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-cogs"></i>
                      <span>Inventory</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="stockcount">Stock Count</a></li>
                      <li><a class="" href="inventoryreport">Inventory Report</a></li>
                  </ul>
              </li>-->
              <?php endif; ?>

            <li class="sub-menu">
                    <a href="javascript:;" class="">
                        <i class="icon-user"></i>
                        <span>PPMS USERS</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li class="actual"><a class="" href="adduser">ADD USER</a></li>
                        <li class="actual"><a class="" href="updateuser">UPDATE USER</a></li>
                        <li class="actual"><a class="" href="userlist">USER LIST</a></li>
                    </ul>
              </li>
              <?php if ( $_SESSION['user']['sap_cust'] != 'Customer Service' ) : ?>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-bar-chart"></i>
                    <span>REPORTS</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <!--<li><a class="" href="reports">Dashboard Reports</a></li>-->
                    <li class="actual"><a class="" href="deliveryreport">DELIVERY LIST</a></li>
                    <li class="actual"><a class="" href="inventoryreport">INVENTORY LIST</a></li>
                    <li class="actual"><a class="" href="deliveryexception">EXCEPTIONS</a></li>
                    <li class="actual"><a class="" href="customerdemand">CUSTOMER PRODUCT DEMAND REPORT</a></li>
                    <li class="actual"><a class="" href="deliveriesperzone">DELIVERIES PER ZONE</a></li>
                </ul>
            </li>
             <?php endif; ?>
              
              
              
              <li class="actual sub-menu">
                  <a class="" href="sapcustomers">
                      <i class="icon-shopping-cart"></i>
                      <span>CUSTOMERS</span>
                  </a>
              </li>
              <li class="actual sub-menu">
                  <a class="" href="saptransporters">
                      <i class="icon-truck"></i>
                      <span>TRANSPORTERS</span>
                  </a>
              </li>
              <li class="actual sub-menu">
                  <a class="" href="customersatisfaction">
                      <i class="icon-apple"></i>
                      <span>USER FEEDBACKS</span>
                  </a>
              </li>
              <li class="actual sub-menu">
                  <a class="" href="disputes">
                      <i class="icon-comment"></i>
                      <span>DISPUTES</span>
                  </a>
              </li>
              <li class="actual sub-menu">
                  <a class="" href="configuration">
                      <i class="icon-cog"></i>
                      <span>CONFIGURATION</span>
                  </a>
              </li>
              <?php // if ( $_SESSION['user']['sap_cust'] == 'Customer Service' ) : ?>
              <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-eye-open"></i>
                    <span>HELP DESK</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <!--<li><a class="" href="reports">Dashboard Reports</a></li>-->
                    <li class="actual"><a class="" href="regeneratetoken">RE-GENERATE TOKEN</a></li>
                    <li class="actual"><a class="" href="resetpassword">RESET PASSWORD</a></li>
                </ul>
            </li>
            <?php // endif; ?>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.actual').each(function(){ $(this).removeClass('active'); });
        var page = window.location.href;
        $('.actual').each(function(){
           if (  page.indexOf( $(this).find('a').attr('href') ) >= 0 ){
              $(this).addClass('active');
			  $(this).parent().parent().addClass('active');
           }
        });
    });
</script>