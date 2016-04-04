<?php include('header-mobile.php'); ?>

<div class="top-margin"></div>

<!--
<div class="pawning-hero"></div>
-->

<img class="hero-image desktop"src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/pawning-hero.jpg" alt="">
<img class="hero-image mobile" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/pawning-hero-mobile.jpg" alt="">
<div class="call-mobile-home">
  <div class="container pull-right mdl-js-button" id="demo-menu-lower-right">
  <p class="fa fa-phone fa-3x fa-flip-horizontal"></p>
  </div>
  <ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect menuposition"
    for="demo-menu-lower-right">
  <li class="mdl-menu__item"><a href="tel:0917-301-3868">(Globe) 0917-301-3868</a></li>
  <hr>
  <li class="mdl-menu__item"><a href="tel:0932-850-8613">(Sun) 0932-850-8613</a></li>
  <hr>
  <li class="mdl-menu__item"><a href="tel:0998-962-1869">(Smart) 0998-962-1869</a></li>
</ul>
</div>


<div class="pawning">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Pawning</h2>
				<img class="img-responsive" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/pawning-motto.png" alt="">
			</div>
			<div class="col-sm-12 description">

				<p>Palawan Pawnshop has the lowest interest rates in the industry and with high appraisal rates, it continues to be Matatag, Maaasahan and Mapagkakatiwalaan nationwide!</p>
				<a href="" class="btn btn-danger">HOW TO PAWN</a>
			</div>
		</div>
	</div>
</div>
<hr class="borderline-yellow">
<div class="interest-calculator">
	<div class="container">
		<div class="row">
			<div class="col sm-12">
				<div class="col-sm-6">
					<h3>Lowest interest rate nationwide!</h3>
					<h4>Try it with our interest calculator.</h4>
					<p>The interest rate is being computed at 11-day intervals. Customers shall only pay 1% for a loan of 11 days; 2% for 22 days; and 3% for 33 days.</p>
				</div>
				<div class="col-sm-5 col-sm-offset-1">
					<div class="col-md-5  col-sm-1 loan-widget">
						<div class="row">
							<div class="col-sm-12">
								<label class="title">ENTER LOAN AMOUNT</label>
								<div id="slider-loan-max"></div>
								<div class="row loan-widget-row">
									<div class="col-xs-6 col-sm-6">
										<!-- <label for="inputdefault">ENTER LOAN AMOUNT</label> -->
										<input name ="defaultInput" class="form-control amount" id="inputamount" type="number" placeholder="Input Amount">
									</div>

									<div class="col-xs-6 col-sm-6">
										<p>	
											<input type="text" class="loanAmount" readonly style="">
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								
								<label class="title">DURATION</label>
								<div id="slider-days-max"></div>
								<div class="row loan-widget-row">
									<div class="col-xs-6 col-sm-6">
										<!-- <label for="inputdefault">ENTER LOAN AMOUNT</label> -->
										<input name ="defaultInput" class="form-control amount" id="inputdays" type="number" placeholder="Input Duration">
									</div>
									<div class="col-xs-6 col-sm-6">
										<p>
											<input type="text" id="loanDays" readonly style="">
										</p>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								
								<label class="title">DISCOUNT</label>
								<label id="suki-radiolabel1" class="radiolabelremit"><input id="radio-suki1" type="radio" name="suki" value="sukiactive"> Suki Card Holder</label>
								<label id="suki-radiolabel2" class="radiolabelremit"><input id="radio-suki2" type="radio" name="suki" value="nonsuki"> None</label>

							</div>
						</div>

						<hr>

						<div class="row" id="apply">
							
							<div class="col-sm-6 col-xs-6">
								<label for="inputdefault">REDEEM AMOUNT</label>
								<input name ="defaultInput" class="form-control interest-form-control" id="redeemAmount" type="text" min="1" max="5" placeholder="Php 123" readonly>
							</div>
							<div class="col-sm-6 col-xs-6">
								<label for="inputdefault">RENEWAL AMOUNT</label>
								<input name ="defaultInput" class="form-control interest-form-control" id="renewalAmount" type="text" min="1" max="5" placeholder="Php 123" readonly>
							</div>
						</div>
						<div id="row">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">

								<div class="applyButton">
									<a href="" class="btn btn-danger btn-block">LEARN MORE</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<div class="pawning accepted-items">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="col-sm-12">
					<div class="col-xs-3"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/jewelry-1.png" alt=""></div>
					<div class="col-xs-3"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/jewelry-2.png" alt=""></div>
					<div class="col-xs-3"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/jewelry-3.png" alt=""></div>
					<div class="col-xs-3"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/jewelry-4.png" alt=""></div>




				</div>
				<div class="col-sm-12">
					<h2>Accepted Items</h2>
					<p> Palawan Pawnshop ONLY accepts gold jewelry items.</p>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="redeem">
	<div class="container">
		<div class="row ">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="col-sm-12">
					<h2>REDEEMING OR RENEWING YOUR PAWN</h2>
					<img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/money-changer.png" class="img-responsive"  alt="">

				</div>
				<div class="col-sm-12">
					<p>Similar to PPS MyWallet card, the PPS PEPP Suki Card will grant the same discounts, special offers and other exciting perks to cardholders. A 5% discount on interest and penalty charges for your pawns and on the corresponding fee for remittance transactions will be accorded to PPS PEPP Suki cardholders.</p>
					<a href="" class="btn btn-danger">LEARN MORE</a>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container testimonials">
	<div class="row">
		<h2>Testimonials</h2>
		<div class="col-sm-12">
			<!-- Carousel -->
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>



				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">


						<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et unde, quis pariatur iure blanditiis beatae
						<p>-Lorem Ipsum</p>

					</div>
					<div class="item">



						<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et unde, quis pariatur iure blanditiis beatae
						<p>-Lorem Ipsum</p>

					</div>
					<div class="item">


						<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et unde, quis pariatur iure blanditiis beatae
						<p>-Lorem Ipsum</p>

					</div>
				</div>

			</div>


		</div>
	</div>
</div>

<div class="news">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Industry Related News</h2>
				<div class="col-sm-4">
					<img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/news-1.jpg" class="img-responsive" alt="">
					<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
				</div>
				<div class="col-sm-4">
					<img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/news-1.jpg" class="img-responsive" alt="">
					<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
				</div>
				<div class="col-sm-4">
					<img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/img/news-1.jpg" class="img-responsive" alt="">
					<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
					<a href="" class="btn btn-danger pull-right rightbtn">VIEW ALL NEWS</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include('footer-mobile.php'); ?>

