<?php include('header-desktop.php'); ?>

<div class="top-margin"></div>

<div class="remittance-hero">
	<!-- <img class="img-responsive" src="img/remittance-hero-513.jpg" alt=""> -->
</div>

<div class="store-locator remittance">
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
				<img class="img-responsive" src="img/remittance-motto.png" alt="">
			</div>
			<div class="col-sm-4">
				<h2>Pera Padala</h2>
				<p> With over 1000 branches nationwide and growing numbers of remittance partners and agents, including LBC and SM Malls, Palawan Express Pera Padala is one of the country's leading money remittance companies today.</p>
				<a href="" class="btn btn-danger rightbtn">HOW TO SEND</a>
			</div>
			<div class="col-sm-10 col-sm-offset-1">
				<h3>Claim your remittances from our partners abroad at any of our branches </h3>
			</div>
			<div class="col-sm-8 col-sm-offset-2 international">
				<img src="img/moneygram.jpg" alt="">
				<img src="img/transfast.jpg" alt="">
				<img src="img/xpressmoney.jpg" alt="">
				<img src="img/lbclogo.jpg" alt="">
				<img src="img/cashsense.jpg" alt="">
				
			</div>
			<div class="col-sm-8 col-sm-offset-2 international">
				<img src="img/xoom.jpg" alt="">
				<img src="img/bdo.jpg" alt="">
				<img src="img/citi.jpg" alt="">
				<img src="img/myremit.jpg" alt="">
				<img src="img/aub.jpg" alt="">
				
			</div>
			<div class="col-sm-8 col-sm-offset-2 international">
				<a href="" class="btn btn-danger">VIEW ALL PARTNERS</a>
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
					<p>Palawan Express Pera Padala (PEPP) is undeniably the quickest and cheapest way of sending money within the Philippines.</p>
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
									<label id="radio-inline"><input id="radio-vmsl" type="radio" name="locationradio" value="location1">Visayas, Mindano, Southern Luzon</label>
								</div>
								<div class="col-sm-6">
									<label id="radio-inline"><input id="radio-ncrl" type="radio" name="locationradio" value="location2">NCR and the rest of Luzon</label>
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

<div class="remittance-options">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				<div class="col-sm-7 remittancecontiner">


					<div class="row">
						<!-- <div class="col-sm-12">
						</div>
					-->


					<div class="col-sm-12 remittancedesc2">
						<h2>Remittance Options:</h2>
						<div class="row">

							<div class="col-sm-12">
								<h3 class="remittanceheader">Branch-to-Branch</h3>
								<div class="col-sm-5">
									<img class="img-responsive" src="img/branch-to-branch.png" alt="">

								</div>
								<div class="col-sm-7">
									<p>With accessible branches located at almost every cities and towns in the country, customers can send and claim Palawan Express Pera Padala transactions with ease anywhere in the Philippines.</p>
								</div>
							</div>

						</div>
						<div class="row">

							<div class="col-sm-12">
								<h3 class="remittanceheader">Branch-to-Card</h3>
								<div class="col-sm-5">
									<img class="img-responsive" src="img/branch-to-card.png" alt="">

								</div>
								<div class="col-sm-7">
									<p>Send remittance directly to any myWallet card and receive it with convenience anytime, at any BancNet ATM nationwide!</p>
								</div>
							</div>

						</div>
					</div>
				</div>


			</div>
			<div class="col-sm-5 remittancebg">

				<img class="doptions img-responsive" src="img/d-options2.png" alt="">
			</div>

			
		</div>

	</div>
	</div>

</div>
</div>


<div class="accepted-id">
	<div class="container">
		<div class="row ">
			<div class="col-sm-6 acceptedidmargin">
				<h2>Accepted IDs</h2>
				<p>Palawan Express Pera Padala ensures that you get your remittance without hassle, fast and secured. Make sure to bring at least one from your passport, Postal ID, Company ID, School ID or any of your government issued ID whenever you send or claim your remittance transaction para Walang Kuskos-balungos!</p>
					<a href="" class="btn btn-danger btnregular">VIEW ALL</a>
				</div>
				<div class="col-sm-6">
					<img class="ids"src="img/available-ids.png" alt="">
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



	<?php include('footer-remittance-desktop.php'); ?>

