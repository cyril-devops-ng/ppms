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
              <li class="actual sub-menu active">
                  <a class="" href="transporterhome">
                      <i class="icon-dashboard"></i>
                      <span>DASHBOARD</span>
                  </a>
              </li>
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>MY DELIVERIES</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li class="actual"><a class="" href="transporterdeliveries">DELIVERY COMPLETED</a></li>
                      <li class="actual"><a class="" href="transporterpending">DELIVERY PENDING</a></li>
                      <li class="actual"><a class="" href="invoiceddeliveries">INVOICED DELIVERIES</a></li>
                  </ul>
                 
              </li>
              <li class="actual sub-menu">
                  <a href="createinvoice" class="">
                      <i class="icon-cogs"></i>
                      <span>INVOICES</span>
                  </a>
              </li>
              
              <li class="sub-menu">
                  <a href="javascript:;" class="">
                      <i class="icon-user"></i>
                      <span>DRIVERS</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li class="actual"><a class="" href="adddriver">ADD DRIVER</a></li>
                      <!--<li><a class="" href="updatedriver">UPDATE DRIVER</a></li>-->
                      <li class="actual"><a class="" href="driverslist">DRIVERS LIST</a></li>
                  </ul>
              </li>
            
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