<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="robots" content="noindex">
	<meta name="robots" content="noindex,nofollow"/>
	<title>Palawan Pawnshop</title>
	 
	<link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/css/bootstrap.css" rel="stylesheet">
	<link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/css/jqueryui.css" rel="stylesheet">

	<link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/css/jasny-bootstrap.css" rel="stylesheet">
	<link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/css/font-awesome.min.css" rel="stylesheet">
	<link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/css/style-mobile.css" rel="stylesheet">
	<link href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/css/material.min.css" rel="stylesheet">


	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

<!-- <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/jqueryui.css" rel="stylesheet">

<link href="css/jasny-bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">

<link href="css/style-mobile.css" rel="stylesheet"> -->
</head>

<body data-spy="scroll" data-target="#navscroll">
	<div class="nav-wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12 desktopNav">

					<nav class="navbar navbar">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>


								<a class="navbar-brand" href="#">
									<div class="logoWrap">
										<img class="logo" src="img/pp-logo.jpg" alt="">
									</div>
								</a>


							</div>

							<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

								<p>CALL:123-4567</p>
								<ul class="nav navbar-nav nav-pills">
									<li>
										<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">HOME</a>
									</li>
									<li>
										<a href="/about.php">ABOUT US</a>
									</li>
									<li class="dropdown">
										<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SERVICES<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="/services-pawning-mobile.php">Pawning</a></li>
											<li><a href="/services-remittance-mobile.php">Pera Padala</a></li>
											<li><a href="#">Money Changer</a></li>
											<li><a href="#">Insurance Protektado</a></li>
											<li><a href="#">Bills Payment</a></li>
											<li><a href="#">Cash Card/ATM Withdrawal</a></li>
											<li><a href="#">My Wallet</a></li>
											<li><a href="#">Suki Card</a></li>
											<li><a href="#">E-Loading</a></li>
										</ul>
									</li>
									<li>
										<a href="/news.php">NEWS/EVENTS</a>
									</li>
									<li>
										<a href="/media.php">MEDIA</a>
									</li>
									<li>
										<a href="/faq.php">FAQ</a>
									</li>
									<li>
										<a href=""><i class="fa fa-search fa-lg"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</nav>

				</div>

				<div class="col-md-12 mobileNav">

					<div id="" class="navmenu navmenu-fixed-right offcanvas">

						<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

							<div id="sideMenu" class="navbar-default sidebar" role="navigation">

								<div class="sidebar-nav">
									
									
									<ul class="nav nav-pills" id="side-menu">
										
										<li><a href=""><img src="img/pp-logo.jpg" class="logo-sidebar" alt=""></a></li>

										<li class="" role="presentation">
											<a href="/">HOME</a>
										</li>
										<li>
											<a href="/about.php">ABOUT US</a>
										</li>
										<li>
											<a class="" role="button" data-toggle="collapse" href="#nav1" aria-expanded="false" aria-controls="nav1">SERVICES<span class="caret"></span></a>
											<div class="collapse" id="nav1">
												

												<ul>
													<li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/services-pawning-mobile.php">Pawning</a></li>
													<li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/services-remittance-mobile.php">Pera Padala</a></li>
													<li><a href="#">Money Changer</a></li>
													<li><a href="#">Insurance Protektado</a></li>
													<li><a href="#">Bills Payment</a></li>
													<li><a href="#">Cash Card/ATM Withdrawal</a></li>
													<li><a href="#">My Wallet</a></li>
													<li><a href="#">Suki Card</a></li>
													<li><a href="#">E-Loading</a></li>
												</ul>

											</div>

										</li>
										<li>
											<a href="/news.php">NEWS</a>
										</li>
										<li>
											<a href="/media.php">MEDIA</a>
										</li>
										<li>
											<a href="/faq.php">FAQ</a>
										</li>

										
									</ul>

								</div>
							</div>
						</nav>
					</div>

					<div class="navbar navbar-default navbar-fixed-top">
						<?php /*

						<a href=""><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/pp-logo.jpg" class="logo" alt=""></a>
							*/ ?>

							<a href=""><img src="img/pp-logo.jpg" class="logo" alt=""></a>
<!--
						<div id="search" class="collapsed show">
							<input type="search" data-placeholder="Reference or Email Address" />
							<span><img src="http://test.fhmp.net/budicon_search.svg"/></span>
						</div>
					-->
					<form class="search-form">
						<label>
							<input type="search" 
							class="search-field" 
							placeholder="Search"  
							value="" name="s" 
							title="Sök efter:">
						</label>
						<input type="submit" class="search-submit" value="Search">
					</form>


					<!--		<a href=""><i class="fa fa-search fa-lg"></i></a> -->


					<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>


				</div>
			</div>
		</div>
	</div>
</div>