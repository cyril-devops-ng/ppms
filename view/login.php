<!DOCTYPE html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/login_simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2016 12:33:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SERVE LS1 Login Portal</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/core/app.js"></script>

	<script type="text/javascript" src="assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><span style="font-size:28px;"	>SERVE LS1</span></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
                                <li>
                                    <!--<img src="img/serve1.jpg" width="100px" height="50px">-->
                                </li>
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>
				

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
                    
			<!-- Main content -->
			<div class="content-wrapper">
                                
                            
				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="login" method="post">
                                            <br/><br/>
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
							</div>
                                                    <?php if(isset($_SESSION['login_failed'])){ ?>
                                                    <div id="error" class="alert alert-error" style="background-color: #EF5350;color:white;">
                                                            <button class="close" data-dismiss="alert">×</button>
                                                            <strong>Error!</strong> Login Unsuccessful!
                                                        </div>
                                                    <?php   }unset($_SESSION['login_failed']);?>
							<div class="form-group has-feedback has-feedback-left">
                                                            <input value="admin" name="username" type="text" class="form-control" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
                                                            <input value="admin" name="password" type="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div><br/>
<!--							<div class="form-group has-feedback has-feedback-left">
								<select name="userType" class="form-control">
									<option value="Station Manager/Rep">Station Manager/Rep</option>
									<option value="Transporter">Transporter</option>
									<option value="Depot Staff">Depot Staff</option>
								</select>		
								<div class="form-control-feedback">
									<i class="icon-cog3 text-muted"></i>
								</div>
							</div>-->

							<div class="form-group">
								<button type="submit" class="btn bg-indigo btn-block" id="signin">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<a href="#">Forgot password?</a>
<!--                                                            <img src="img/android.ico" width="30px" height="30px"/>-->
								<a href="app.apk">Download Android App&nbsp;<img src="img/android.ico" width="20px" height="20px"/></a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2016. <a href="#">Copyright Serve Consulting Ltd</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/material/login_simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Apr 2016 12:33:47 GMT -->
</html>
