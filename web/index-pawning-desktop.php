<?php include('header-desktop.php'); ?>

<div class="top-margin"></div>

<div class="pawning-hero">
	<img class="img-responsive" src="img/pawning-hero-511.jpg" alt="">
</div>

<div class="store-locator pawning">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="col-sm-7 storelocator-header">
					<h3>Find A Palawan Pawnshop Near You</h3>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<select class="form-control" id="sel1">
							<option>Select a location</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
					</div>
				</div>
				<div class="col-sm-2">
					<button class="btn btn-danger store-search">SEARCH</button>
				</div>
				
			</div>
		</div>
	</div>
</div>

<div id="map"></div>

<div class="pawning">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<img class="img-responsive"src="img/pawning-motto.png" alt="">
			</div>
			<div class="col-sm-4 description">
				<h2>Pawning</h2>
				<p>Palawan Pawnshop has the lowest interest rates in the industry and with high appraisal rates, it continues to be Matatag, Maaasahan and Mapagkakatiwalaan nationwide!</p>
				<a href="" class="btn btn-danger rightbtn">HOW TO PAWN</a>
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
									<div class="col-sm-6">
										<!-- <label for="inputdefault">ENTER LOAN AMOUNT</label> -->
										<input name ="defaultInput" class="form-control amount" id="inputamount" type="number" placeholder="Input Amount">
									</div>

									<div class="col-sm-6">
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
									<div class="col-sm-6">
										<!-- <label for="inputdefault">ENTER LOAN AMOUNT</label> -->
										<input name ="defaultInput" class="form-control amount" id="inputdays" type="number" placeholder="Input Duration">
									</div>
									<div class="col-sm-6">
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
							
							<div class="col-sm-6">
								<label for="inputdefault">REDEEM AMOUNT</label>
								<input name ="defaultInput" class="form-control interest-form-control" id="redeemAmount" type="text" min="1" max="5" placeholder="Php 123" readonly>
							</div>
							<div class="col-sm-6">
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
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-5 img-responsive">
						<div class="row">
						<div class="col-sm-6">
						<img src="img/jewelry-1.png" alt="">
						<img src="img/jewelry-2.png" alt="">
						
						</div>
						

						
							<div class="col-sm-6">
						<img src="img/jewelry-3.png" alt="">
						<img src="img/jewelry-4.png" alt="">
						</div>					
						</div>
					</div>
					<div class="col-sm-5 col-sm-offset-1 accepteditems-header">
						<h2>Accepted Items</h2>
						<p> Palawan Pawnshop ONLY accepts gold jewelry</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="redeemrenew-bg">
	<div class="container">
		<div class="row ">
			<div class="col-sm-12">
				<div class="row ">
					<div class="col-sm-6">
						<h2>REDEEMING OR RENEWING YOUR PAWN</h2>
						<p>Similar to PPS MyWallet card, the PPS PEPP Suki Card will grant the same discounts, special offers and other exciting perks to cardholders. A 5% discount on interest and penalty charges for your pawns and on the corresponding fee for remittance transactions will be accorded to PPS PEPP Suki cardholders.</p>
						<a href="" class="btn btn-danger rightbtn">LEARN MORE</a>
					</div>
					<div class="col-sm-4 col-sm-offset-1">
						<img class="img-responsive"src="img/money-changer.png" class="img-responsive"  alt="">
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container testimonials">
		<div class="row">
			<!-- Carousel -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->

				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner testimonials">
					<div class="item active">
						<div class="col-sm-6">
							<img class="img-responsive" src="img/testimonial-girl.png" alt="">
						</div>
						<div class="col-sm-6">
							<h2>Testimonials</h2>
							<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et unde, quis pariatur iure blanditiis beatae
								<p>-Lorem Ipsum</p>
							</div>
						</div>
						<div class="item">
							<div class="col-sm-6">
								<img class="img-responsive"src="img/testimonial-girl.png" alt="">
							</div>
							<div class="col-sm-6">
								<h2>Testimonials</h2>
								<p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et unde, quis pariatur iure blanditiis beatae
									<p>-Lorem Ipsum</p>
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<img class="img-responsive"src="img/testimonial-girl.png" alt="">
								</div>
								<div class="col-sm-6">
									<h2>Testimonials</h2>
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
							<h2>Industry Related News</h2>
							<div class="col-sm-4">
								<img class="img-responsive"src="img/news-1.jpg" alt="">
								<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
							</div>
							<div class="col-sm-4">
								<img class="img-responsive"src="img/news-1.jpg" alt="">
								<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
							</div>
							<div class="col-sm-4">
								<img class="img-responsive"src="img/news-1.jpg" alt="">
								<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
								<a href="" class="btn btn-danger pull-right rightbtn">VIEW ALL NEWS</a>
							</div>
						</div>
					</div>
				</div>



				<?php include('footer-pawning-desktop.php'); ?>

