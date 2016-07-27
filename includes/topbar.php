<?php

?>
 <div class="navbar-inner">
    <div class="container-fluid">
        <!--BEGIN SIDEBAR TOGGLE-->

        <div class="sidebar-toggle-box hidden-phone">
            <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--END SIDEBAR TOGGLE-->
        <!-- BEGIN LOGO -->
        <h1 class="brand"><span style="color:white;font-size:28px;">SERVE LS1</span></h1>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="arrow"></span> 
        </a>

        <!-- END RESPONSIVE MENU TOGGLER -->
        <div id="top_menu" class="nav notify-row">
            <!-- BEGIN NOTIFICATION -->

        </div>
        <!-- END  NOTIFICATION -->
        <div class="top-nav ">
            <ul class="nav pull-right top-menu" >
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <!--<img src="img/serve1.jpg" width="100px" height="50px">-->
                        
                    </a>
                </li>
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <img src="img/admin.png" alt="" width="30px" height="30px">
                        
                            <span class="username"><?= $_SESSION['user']['sap_cust'] ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                        <li><a href="logout"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
 </div>