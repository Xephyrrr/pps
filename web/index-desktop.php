<?php include('header-desktop.php'); ?>

<div class="top-margin"></div>

<div class="container-fluid heroCarousel">
	<div class="row">
		<!-- Carousel -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<!--
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
		-->
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="img/hero-1-470.jpg" alt="First slide">
			</div>
			<div class="item">
				<img src="img/hero-2-470.jpg" alt="Second slide">
			</div>
			<div class="item">
				<img src="img/hero-3-470.jpg" alt="Third slide">
			</div>
			<div class="item">
				<img src="img/hero-4-470.jpg" alt="Fourth slide">
			</div>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div><!-- /carousel -->
</div>
</div>

<div class="container content-filter animated flipInX">

	<div class="row">

		<div class="col-sm-12 col-md-8 col-md-offset-2 ">

			<div class="content-filter-header">
				<h1>Ano po ang maipaglilingkod namin sa inyo ? <button class="btn btn-danger toggle-filter">—</button> </h1>

			</div>
		</div>
	</div>
	<div class="row filters">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="col-sm-4">
				<a href="index-pawning.php" class="btn btn-danger btn-lg">MAGSANGLA</a>
				<p>Pawning</p>
			</div>
			<div class="col-sm-4">
				<a href="index-remittance.php" class="btn btn-danger btn-lg">MAGPADALA</a>
				<p>Remittance</p>
			</div>
			<div class="col-sm-4">
				<a href="" class="btn btn-danger btn-lg">IBA PA</a>
				<p>Other Services</p>
			</div>
		</div>
	</div>
</div>

<div class="store-locator">
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="col-sm-7">
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
				<img class="img-responsive" src="img/pawning-motto.png" alt="">
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

<div class="pawning">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<img class="img-responsive" src="img/remittance-motto.png" alt="">
			</div>
			<div class="col-sm-4">
				<h2>Pera Padala</h2>
				<p> With over 1000 branches nationwide and growing numbers of remittance partners and agents, including LBC and SM Malls, Palawan Express Pera Padala is one of the country's leading money remittance companies today.</p>
				<a href="" class="btn btn-danger rightbtn">HOW TO SEND</a>
			</div>
		</div>
	</div>
</div>
<hr class="borderline-yellow">
<div class="padala-calculator">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-6">
					<h3>Mura Na, Mabilis Pa!</h3>
					<p>Palawan Express Pera Padala is undeniably the quickest and cheapest way of sending money within the Philippines.</p>
					<a href="" class="btn btn-danger rightbtn">LEARN MORE</a>
				</div>
				<div class="col-sm-5 col-sm-offset-1">
					<div class="col-md-5  col-sm-1 loan-widget">
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-6 amountwrap">
									<div class="form-group">
										<label for="inputdefault">AMOUNT TO SEND</label>
										<input name ="defaultInput" class="form-control amount" placeholder="Input Amount" id="inputdefault" type="number" min="1" max="5">
									</div>
								</div>
								
								
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">

								<label class="title">BRANCH</label>

								<div class="col-sm-6">
									<label id="radio-inline"><input class="remittanceradio" id="radio-vmsl" type="radio" name="locationradio" value="location1">Visayas, Mindano, Southern Luzon</label>
								</div>
								<div class="col-sm-6">
									<label id="radio-inline"><input class="remittanceradio" id="radio-ncrl" type="radio" name="locationradio" value="location2">NCR and the rest of Luzon</label>
								</div>


								
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<label class="title discountsection" >DISCOUNT</label>
								<div class="col-sm-6">
									<label id="suki-radiolabel1" class="radiolabelremit"><input id="radio-suki-remittance1" type="radio" name="remittance" value="sukiremittance"> Suki Card Holder</label>
									<!-- <label class="radio-inline"><input type="radio" name="optradio">Suki Card Holder</label> -->
								</div>
								<div class="col-sm-6">
									<label id="suki-radiolabel1" class="radiolabelremit"><input id="radio-suki-remittance2" type="radio" name="remittance" value="nonsukiremittance">None</label>
									<!-- <label class="radio-inline"><input type="radio" name="optradio">None</label> -->
								</div>
							</div>
						</div>

						<hr>
						<div class="col-sm-12">
							<div class="col-sm-6 loanValueText"><label>REMITTANCE</label>
								<input class="padalaValue remittance" placeholder="50000" type ="number" readonly>		
							</div>
							<div class="col-sm-6 loanValueText"><div class="feelabel">REMITTANCE FEE</div>
							<input class="feeValue feeholder" placeholder="345" type ="number" readonly>		
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
<div class="other">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<h2>Cash Card Withdrawal</h2>
				<div class="col-sm-6">
					
					<p>Selected Palawan Pawnshop Palawan Express Pera Padala branches offer BALANCE INQUIRY & WITHDRAWAL transactions thru BDO POS terminals.</p>
					<a href="" class="btn btn-danger">VIEW BRANCHES</a>
				</div>
				<div class="col-sm-6">
					<img class="img-responsive" src="img/withdrawal.png" alt="">
				</div>
			</div>
			<div class="col-sm-6">
				<h2>Money Changer</h2>
				<div class="col-sm-6">
					
					<p>All Palawan Pawnshop branches accept foreign currencies for exchange to Philippine Peso.</p>
					<a href="" class="btn btn-danger">EXCHANGE RATES</a>
				</div>
				<div class="col-sm-6">
					<img class="img-responsive" src="img/money-changer.png" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bills-payment">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<img class="img-responsive" src="img/bills-payment.png" alt="">
			</div>
			<div class="col-sm-5">
				<h2>Bills Payment</h2>
				<p>Selected Palawan Pawnshop branches are now accepting payments for your utility bills!</p>
				<a href="" class="btn btn-danger rightbtn">VIEW PARTNERS</a>
			</div>
		</div>
	</div>
</div>

<div class="suki-card">
	<div class="container">
		<div class="row ">
			<div class="col-sm-6">
				<h2>Suki Card & My Wallet</h2>
				<p>Similar to Palawan Pawnshop MyWallet card, the Suki Card will grant the same discounts, special offers and other exciting perks to cardholders. A 5% discount on interest and penalty charges for your pawns and on the corresponding fee for remittance transactions will be accorded to Palawan Pawnshop Suki cardholders.</p>
				<a href="" class="btn btn-danger howtoapplybtn">APPLY NOW</a>
				<a href="" class="btn btn-danger learnmorebtn">LEARN MORE</a>
			</div>
			<div class="col-sm-6">
				<img class="img-responsive" src="img/sukicard-2.png" alt="">
			</div>
		</div>
	</div>
</div>


<div class="e-loading">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<img class="img-responsive" src="img/e-loading.png" alt="">
			</div>
			<div class="col-sm-7">
				<h2>E-loading</h2>
				<p>Palawan Pawnshop branches serve as convenient stations for e-loading for your prepaid mobile subscription! You only have to pay for the exact amount of load, no extra charges!</p>
				<a href="" class="btn btn-danger rightbtn">VIEW NETWORKS</a>
			</div>
		</div>
	</div>
</div>
<div class="insurance">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h2>Insurance</h2>
				<p>Palawan Pawnshop ProtekTODO is an accident insurance plan designed to provide Filipino masses social security and personal protection at an affordable option.</p>
				<a href="" class="btn btn-danger rightbtn">VIEW BENEFITS</a>
			</div>
			<div class="col-sm-7">
				<img class="img-responsive" src="img/insurance.png" alt="">
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
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner testimonials">
				<div class="item active">
					<div class="col-sm-6">
						<img src="img/testimonial-2.png" alt="">
					</div>
					<div class="col-sm-6">
						<h2>Testimonials</h2>
						<p>"Mabait ang mga employees, friendly and suave ang service. Always smiling and saying "Thank you". Salamat Palawan Pawnshop! God bless!"</p>
						<p>-Elsa Suarez Galacio</p>

					</div>
				</div>
				<div class="item">
					<div class="col-sm-6">
						<img src="img/testimonial-5.png" alt="">
					</div>
					<div class="col-sm-6">
						<h2>Testimonials</h2>
						<p>"Dito po ako palaging kumuha kasi mabilis at mura lang po ang binabayad ng nagpapadala sa akin."</p>
						<p>-Ehlord Win Molina Rabec</p>
					</div>
				</div>

				<div class="item">
					<div class="col-sm-6">
						<img src="img/testimonial-3.png" alt="">
					</div>
					<div class="col-sm-6">
						<h2>Testimonials</h2>
						<p>"Thank you Palawan Pawnshop for answering our needs! Lowest interest para sa aming sangla at sa maayos na pakikitungo ng mga empleyado, treating us family is big deal para sa amin tiwala at saludo ako sa inyo Palawan Pawnshop!"</p>
						<p>-Arlyn Alayon</p>
					</div>
				</div>
				<div class="item">
					<div class="col-sm-6">
						<img src="img/testimonial-4.png" alt="">
					</div>
					<div class="col-sm-6">
						<h2>Testimonials</h2>
						<p>"Dito na ako sa Palawan Pawnshop nagpapadala dahil dito walang pila madaling kunin ang perang padala sa probinsiya. Nakakaaliw pa ang T.V. sa mga branches nila."</p>
						<p>-Leonila E. Cobillas</p>
					</div>
				</div>

				<div class="item">
					<div class="col-sm-6">
						<img src="img/testimonial-1.png" alt="">
					</div>
					<div class="col-sm-6">
						<h2>Testimonials</h2>
						<p>"Salamat Palawan Pawnshop at sa pagpalipat ko ng aking mga sangla, sobrang laki na ang matitipid ko dahil sa mababang interest at may discount pa na 5% sa interest gamit ang sukicard ko."</p>
						<p>-Felix Rivadeniera</p>

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
				<img class="img-responsive" src="img/news-1.jpg" alt="">
				<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
			</div>
			<div class="col-sm-4">
				<img class="img-responsive" src="img/news-1.jpg" alt="">
				<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
			</div>
			<div class="col-sm-4">
				<img class="img-responsive" src="img/news-1.jpg" alt="">
				<a href=""><h3>Lorem ipsum dolor sit amet.</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam magnam officiis, quo tenetur, eius dolorum autem blanditiis doloribus quas et.</p>
				<a href="" class="btn btn-danger pull-right rightbtn">VIEW ALL NEWS</a>
			</div>
		</div>
	</div>
</div>


<?php include('footer-desktop.php'); ?>

