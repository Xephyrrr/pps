
<footer class="footer-pawning">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="footerfont">
					<ul>
						<li><a href="/">HOME</a></li>
						<li><a href="#">ABOUT US</a></li>
						<li><a href="#">SERVICES</a></li>
						<li><a href="#">PERA PADALA</a></li>
						<li><a href="#">PAWNSHOP</a></li>
						<li><a href="#">EXCHANGE RATE</a></li>
						<li><a href="#">SUKI CARD</a></li>
						<li><a href="#">NEWS/EVENTS</a></li>
						<li><a href="#">MEDIA</a></li>
						<li><a href="#">FAQS</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<img class="bottomLogo"src="img/pp-logo.jpg" alt="">
			</div>
			<div class="col-sm-4">
				<p>Palawan Pawnshop Head Office<br>
					Palawan Pawnshop Buiding, 170 Rizal Avenue,
					Brgy. Masikap, Puerto Princesa City, 5300
					(048)4 34-8377 / (048)433-4110 <br>
					Copyright © 2015, Palawan Pawnshop</p>
				</div>
				<div class="col-sm-4">
					<div class="social">
						<a href=""><img src="img/fb.png" alt=""></a>
						<a href=""><img src="img/yt.png" alt=""></a>
						<a href=""><img src="img/twitter.png" alt=""></a>
					</div>
				</div>
			</div>
			
		</div>
	</footer>


	<script src="js/jquery.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/holder.js"></script>
	<script src="js/jasny-bootstrap.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="js/accounting.min.js"></script>
	
	<script>

(function() {
/*
CUSTOM CURRENCY DECIMAL
*/
  function decimalAdjust(type, value, exp) {
    // If the exp is undefined or zero...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // If the value is not a number or the exp is not an integer...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 2 === 0)) {
      return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[2] ? (+value[2] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[2] ? (+value[2] + exp) : exp));
  }

  // Decimal round
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Decimal floor
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Decimal ceil
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();



	$(function() {
		$( "#slider-loan-max" ).slider({
			range: "max",
			value: 3500,
			min: 1,
			max: 50000,
			step: 1.00,
			slide: function( event, ui ) {
				$( ".loanAmount" ).val( "Php " + ui.value );
				$( "#inputamount" ).val(ui.value);
				
				var days = $( "#slider-days-max" ).slider( "value" );
				var loan = ui.value;
				var finalValue = loan;
				var suki = $('input:radio[name=suki]:checked').val();
				var serviceCharge = 5;
				var finalValue2 = loan;
				
				if (days >= 1 && days <= 11) {
					finalValue = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ), -2));	
					
				} else if(days >= 12 && days <= 22) {
					finalValue = loan * 0.02;
					finalValue2 = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ),-2));
					
				} else if(days >= 23 && days <= 33) {
					finalValue = loan * 0.03;
					finalValue2 = loan * 0.02;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
					
				} else if(days >=34 && days <=150) {
					daysMultiplier = (days - 33);

					
					if (daysMultiplier >= 1 && daysMultiplier <= 11) { //34-44
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					} else if(daysMultiplier >= 12 && daysMultiplier <= 22) {//45-55
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 23 && daysMultiplier <= 33) {//56-66
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
					}

					else if(daysMultiplier >= 34 && daysMultiplier <= 44) {//67-77
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 45 && daysMultiplier <= 55) {//78-88
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 56 && daysMultiplier <= 66) {//89-99
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 67 && daysMultiplier <= 77) {//100-111
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 78 && daysMultiplier <= 88) {//112-122
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 89 && daysMultiplier <= 99) {//123-133
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 100 && daysMultiplier <= 111) {//134-144
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 112 && daysMultiplier <= 122) {//145-155
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						// console.log('finalValue '+finalValue);
						// console.log('Principal '+mPrincipal);
						// console.log('serviceCharge '+serviceCharge);
						// console.log('daysMultiplier '+daysMultiplier);

						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));

						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					
				}


				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					discount2 = finalValue2 * 0.05;

					if(days >= 1 && days <=11){
						finalValue = finalValue - discount;
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan, -2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge), -2));

					}else if (days >= 12 && days <= 33){
						finalValue = finalValue - discount;
						finalValue2 = finalValue2 - discount2;
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge), -2));


					}
					
				}else if(suki == 'nonsuki'){
					if(days >= 1 && days <=11){
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan, -2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge), -2));	
					}
					else if(days >= 12 && days <=33){
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge), -2));

					}
				}

			}


		});

$( ".loanAmount" ).val( "Php " + $( "#slider-loan-max" ).slider( 'value' ) );
$( "#inputamount" ).val($( "#slider-loan-max" ).slider( 'value' ));

});



$("#inputamount").keyup(function() {
	if ($("#inputamount").val() > 50000)
	{
		$("#inputamount").val(50000);
	}
	$("#slider-loan-max").slider("value" , $("#inputamount").val());
	$(".loanAmount").val( "Php " + $("#inputamount").val());


	var days = $( "#slider-days-max" ).slider( "value" );
	var loan = $( "#slider-loan-max" ).slider( "value" );
	var finalValue = loan;
	var suki = $('input:radio[name=suki]:checked').val();
	var serviceCharge = 5;
	var finalValue2 = loan;

	if (days >= 1 && days <= 11) {
					finalValue = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ), -2));	
					
				} else if(days >= 12 && days <= 22) {
					finalValue = loan * 0.02;
					finalValue2 = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ),-2));
					
				} else if(days >= 23 && days <= 33) {
					finalValue = loan * 0.03;
					finalValue2 = loan * 0.02;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
					
				} else if(days >=34 && days <=150) {
					daysMultiplier = (days - 33);

					
					if (daysMultiplier >= 1 && daysMultiplier <= 11) { //34-44
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					} else if(daysMultiplier >= 12 && daysMultiplier <= 22) {//45-55
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 23 && daysMultiplier <= 33) {//56-66
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
					}

					else if(daysMultiplier >= 34 && daysMultiplier <= 44) {//67-77
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 45 && daysMultiplier <= 55) {//78-88
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 56 && daysMultiplier <= 66) {//89-99
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 67 && daysMultiplier <= 77) {//100-111
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 78 && daysMultiplier <= 88) {//112-122
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 89 && daysMultiplier <= 99) {//123-133
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 100 && daysMultiplier <= 111) {//134-144
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 112 && daysMultiplier <= 122) {//145-155
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						// console.log('finalValue '+finalValue);
						// console.log('Principal '+mPrincipal);
						// console.log('serviceCharge '+serviceCharge);
						// console.log('daysMultiplier '+daysMultiplier);

						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));

						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					
				}


				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					discount2 = finalValue2 * 0.05;

					if(days >= 1 && days <=11){
						finalValue = finalValue - discount;
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));

					}else if (days >= 12 && days <= 33){
						finalValue = finalValue - discount;
						finalValue2 = finalValue2 - discount2;
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));


					}
					
				}else if(suki == 'nonsuki'){
					if(days >= 1 && days <=11){
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));	
					}
					else if(days >= 12 && days <=33){
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
						
					}
				}



			});


</script>

<script>
$(function() {
	$( "#slider-days-max" ).slider({
		range: "max",
		min: 1,
		max: 150,
		value: 11,
		step: 1,
		slide: function( event, ui ) {
			$( "#loanDays" ).val( ui.value + " Day/s"  );
			$( "#inputdays" ).val(ui.value);
			var days = ui.value;
			var loan = $( "#slider-loan-max" ).slider( "value" );
			var finalValue = loan;
			var suki = $('input:radio[name=suki]:checked').val();
			var serviceCharge = 5;
			var finalValue2 = loan;

			if (days >= 1 && days <= 11) {
					finalValue = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ), -2));	
					
				} else if(days >= 12 && days <= 22) {
					finalValue = loan * 0.02;
					finalValue2 = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ),-2));
					
				} else if(days >= 23 && days <= 33) {
					finalValue = loan * 0.03;
					finalValue2 = loan * 0.02;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
					
				} else if(days >=34 && days <=150) {
					daysMultiplier = (days - 33);

					
					if (daysMultiplier >= 1 && daysMultiplier <= 11) { //34-44
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					} else if(daysMultiplier >= 12 && daysMultiplier <= 22) {//45-55
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 23 && daysMultiplier <= 33) {//56-66
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
					}

					else if(daysMultiplier >= 34 && daysMultiplier <= 44) {//67-77
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 45 && daysMultiplier <= 55) {//78-88
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 56 && daysMultiplier <= 66) {//89-99
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 67 && daysMultiplier <= 77) {//100-111
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 78 && daysMultiplier <= 88) {//112-122
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 89 && daysMultiplier <= 99) {//123-133
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 100 && daysMultiplier <= 111) {//134-144
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 112 && daysMultiplier <= 122) {//145-155
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						// console.log('finalValue '+finalValue);
						// console.log('Principal '+mPrincipal);
						// console.log('serviceCharge '+serviceCharge);
						// console.log('daysMultiplier '+daysMultiplier);

						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));

						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					
				}


				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					discount2 = finalValue2 * 0.05;

					if(days >= 1 && days <=11){
						finalValue = finalValue - discount;
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));

					}else if (days >= 12 && days <= 33){
						finalValue = finalValue - discount;
						finalValue2 = finalValue2 - discount2;
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));


					}
					
				}else if(suki == 'nonsuki'){
					if(days >= 1 && days <=11){
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));	
					}
					else if(days >= 12 && days <=33){
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
						
					}
				}


			}
		});
$( "#loanDays" ).val( $( "#slider-days-max" ).slider( "value" ) + " Day/s" );
$("#inputdays").val($( "#slider-days-max" ).slider( 'value' ));
});

$("#inputdays").keyup(function() {
	if ($("#inputdays").val() > 150)
	{
		$("#inputdays").val(150);
	}
	$("#slider-days-max").slider("value" , $("#inputdays").val());
	$("#loanDays").val($("#inputdays").val() + " Day/s");


	var days = $( "#slider-days-max" ).slider( "value" );
	var loan = $( "#slider-loan-max" ).slider( "value" );
	var finalValue = loan;
	var suki = $('input:radio[name=suki]:checked').val();
	var serviceCharge = 5;
	var finalValue2 = loan;

	if (days >= 1 && days <= 11) {
					finalValue = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ), -2));	
					
				} else if(days >= 12 && days <= 22) {
					finalValue = loan * 0.02;
					finalValue2 = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ),-2));
					
				} else if(days >= 23 && days <= 33) {
					finalValue = loan * 0.03;
					finalValue2 = loan * 0.02;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
					
				} else if(days >=34 && days <=150) {
					daysMultiplier = (days - 33);

					
					if (daysMultiplier >= 1 && daysMultiplier <= 11) { //34-44
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					} else if(daysMultiplier >= 12 && daysMultiplier <= 22) {//45-55
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 23 && daysMultiplier <= 33) {//56-66
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
					}

					else if(daysMultiplier >= 34 && daysMultiplier <= 44) {//67-77
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 45 && daysMultiplier <= 55) {//78-88
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 56 && daysMultiplier <= 66) {//89-99
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 67 && daysMultiplier <= 77) {//100-111
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 78 && daysMultiplier <= 88) {//112-122
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 89 && daysMultiplier <= 99) {//123-133
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 100 && daysMultiplier <= 111) {//134-144
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 112 && daysMultiplier <= 122) {//145-155
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						// console.log('finalValue '+finalValue);
						// console.log('Principal '+mPrincipal);
						// console.log('serviceCharge '+serviceCharge);
						// console.log('daysMultiplier '+daysMultiplier);

						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));

						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					
				}


				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					discount2 = finalValue2 * 0.05;

					if(days >= 1 && days <=11){
						finalValue = finalValue - discount;
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));

					}else if (days >= 12 && days <= 33){
						finalValue = finalValue - discount;
						finalValue2 = finalValue2 - discount2;
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));


					}
					
				}else if(suki == 'nonsuki'){
					if(days >= 1 && days <=11){
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));	
					}
					else if(days >= 12 && days <=33){
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
						
					}
				}

			});


</script>

<script>
$(function () {
	compute();
	function compute(){
		var dayValue = $("#slider-month-max").slider( "value" );
		if (dayValue >= 1) {	
			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .01);
			$( "#redeemAmount" ).val( "Php " + finalvalue);
		}else if (dayValue >= 12) {	
			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .02);

			$( "#redeemAmount" ).val( "Php " + finalvalue);
		}else if (dayValue >= 23) {	
			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .03);
			$( "#redeemAmount" ).val( "Php " + finalvalue);
		}
	};

})


$(function() {
	var $radios = $('input:radio[name=suki]');
	if($radios.is(':checked') === false) {
		$radios.filter('[value=nonsuki]').prop('checked', true);
var loan = $( "#slider-loan-max" ).slider( "value" );
	var finalValue = loan;
	var suki = $('input:radio[name=suki]:checked').val();
	var days = $( "#slider-days-max" ).slider( "value" );
	var finalValue2 = loan;
	var serviceCharge = 5;


	if (days >= 1 && days <= 11) {
					finalValue = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ), -2));	
					
				} else if(days >= 12 && days <= 22) {
					finalValue = loan * 0.02;
					finalValue2 = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ),-2));
					
				} else if(days >= 23 && days <= 33) {
					finalValue = loan * 0.03;
					finalValue2 = loan * 0.02;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
					
				} else if(days >=34 && days <=150) {
					daysMultiplier = (days - 33);

					
					if (daysMultiplier >= 1 && daysMultiplier <= 11) { //34-44
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					} else if(daysMultiplier >= 12 && daysMultiplier <= 22) {//45-55
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 23 && daysMultiplier <= 33) {//56-66
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
					}

					else if(daysMultiplier >= 34 && daysMultiplier <= 44) {//67-77
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 45 && daysMultiplier <= 55) {//78-88
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 56 && daysMultiplier <= 66) {//89-99
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 67 && daysMultiplier <= 77) {//100-111
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 78 && daysMultiplier <= 88) {//112-122
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 89 && daysMultiplier <= 99) {//123-133
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 100 && daysMultiplier <= 111) {//134-144
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 112 && daysMultiplier <= 122) {//145-155
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						// console.log('finalValue '+finalValue);
						// console.log('Principal '+mPrincipal);
						// console.log('serviceCharge '+serviceCharge);
						// console.log('daysMultiplier '+daysMultiplier);

						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));

						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					
				}


				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					discount2 = finalValue2 * 0.05;

					if(days >= 1 && days <=11){
						finalValue = finalValue - discount;
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));

					}else if (days >= 12 && days <= 33){
						finalValue = finalValue - discount;
						finalValue2 = finalValue2 - discount2;
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));


					}
					
				}else if(suki == 'nonsuki'){
					if(days >= 1 && days <=11){
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));	
					}
					else if(days >= 12 && days <=33){
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
						
					}
				}
	}
});

$('#radio-suki1').change(function(){

	var loan = $( "#slider-loan-max" ).slider( "value" );
	var finalValue = loan;
	var suki = $('input:radio[name=suki]:checked').val();
	var days = $( "#slider-days-max" ).slider( "value" );
	var finalValue2 = loan;
	var serviceCharge = 5;


	if (days >= 1 && days <= 11) {
					finalValue = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ), -2));	
					
				} else if(days >= 12 && days <= 22) {
					finalValue = loan * 0.02;
					finalValue2 = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ),-2));
					
				} else if(days >= 23 && days <= 33) {
					finalValue = loan * 0.03;
					finalValue2 = loan * 0.02;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
					
				} else if(days >=34 && days <=150) {
					daysMultiplier = (days - 33);

					
					if (daysMultiplier >= 1 && daysMultiplier <= 11) { //34-44
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					} else if(daysMultiplier >= 12 && daysMultiplier <= 22) {//45-55
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 23 && daysMultiplier <= 33) {//56-66
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
					}

					else if(daysMultiplier >= 34 && daysMultiplier <= 44) {//67-77
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 45 && daysMultiplier <= 55) {//78-88
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 56 && daysMultiplier <= 66) {//89-99
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 67 && daysMultiplier <= 77) {//100-111
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 78 && daysMultiplier <= 88) {//112-122
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 89 && daysMultiplier <= 99) {//123-133
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 100 && daysMultiplier <= 111) {//134-144
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 112 && daysMultiplier <= 122) {//145-155
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						// console.log('finalValue '+finalValue);
						// console.log('Principal '+mPrincipal);
						// console.log('serviceCharge '+serviceCharge);
						// console.log('daysMultiplier '+daysMultiplier);

						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));

						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					
				}


				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					discount2 = finalValue2 * 0.05;

					if(days >= 1 && days <=11){
						finalValue = finalValue - discount;
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));

					}else if (days >= 12 && days <= 33){
						finalValue = finalValue - discount;
						finalValue2 = finalValue2 - discount2;
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));


					}
					
				}else if(suki == 'nonsuki'){
					if(days >= 1 && days <=11){
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));	
					}
					else if(days >= 12 && days <=33){
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
						
					}
				}
});




$('#radio-suki2').change(function(){

	var loan = $( "#slider-loan-max" ).slider( "value" );
	var finalValue = loan;
	var suki = $('input:radio[name=suki]:checked').val();
	var days = $( "#slider-days-max" ).slider( "value" );
	var finalValue2 = loan;
	serviceCharge = 5;

	if (days >= 1 && days <= 11) {
					finalValue = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ), -2));	
					
				} else if(days >= 12 && days <= 22) {
					finalValue = loan * 0.02;
					finalValue2 = loan * 0.01;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge ),-2));
					
				} else if(days >= 23 && days <= 33) {
					finalValue = loan * 0.03;
					finalValue2 = loan * 0.02;
					$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
					$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
					
				} else if(days >=34 && days <=150) {
					daysMultiplier = (days - 33);

					
					if (daysMultiplier >= 1 && daysMultiplier <= 11) { //34-44
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					} else if(daysMultiplier >= 12 && daysMultiplier <= 22) {//45-55
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 23 && daysMultiplier <= 33) {//56-66
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
					}

					else if(daysMultiplier >= 34 && daysMultiplier <= 44) {//67-77
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 45 && daysMultiplier <= 55) {//78-88
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 56 && daysMultiplier <= 66) {//89-99
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 67 && daysMultiplier <= 77) {//100-111
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 78 && daysMultiplier <= 88) {//112-122
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}

					else if(daysMultiplier >= 89 && daysMultiplier <= 99) {//123-133
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 100 && daysMultiplier <= 111) {//134-144
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						console.log('daysMultiplier '+daysMultiplier);
												if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					else if(daysMultiplier >= 112 && daysMultiplier <= 122) {//145-155
						finalValue = loan * 0.03; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.02; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						// console.log('finalValue '+finalValue);
						// console.log('Principal '+mPrincipal);
						// console.log('serviceCharge '+serviceCharge);
						// console.log('daysMultiplier '+daysMultiplier);

						if(suki == 'sukiactive'){
							combinedinterest = finalValue + mPrincipal;
							discount = combinedinterest * 0.05;
							discounted = combinedinterest - discount;

							combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = combinedinterest2 * 0.05;
							discounted2 = combinedinterest2 - discount2;

							console.log('finalvalue2: '+finalValue2);
							console.log('combinedinterest2: '+combinedinterest2);
							console.log('discount2: '+discount2);
							console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);

							$( "#redeemAmount" ).val( "Php " + Math.round10((discounted2 + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((discounted + serviceCharge ),-2));

						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}
					
				}


				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					discount2 = finalValue2 * 0.05;

					if(days >= 1 && days <=11){
						finalValue = finalValue - discount;
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));

					}else if (days >= 12 && days <= 33){
						finalValue = finalValue - discount;
						finalValue2 = finalValue2 - discount2;
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));


					}
					
				}else if(suki == 'nonsuki'){
					if(days >= 1 && days <=11){
						$( "#redeemAmount" ).val( "Php " + Math.round10(loan),-2);
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));	
					}
					else if(days >= 12 && days <=33){
						$( "#redeemAmount" ).val( "Php " + Math.round10((loan + finalValue2),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + serviceCharge),-2));
						
					}
				}

});








</script>






<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})
</script>

<!-- Carousel Height Easing -->
<script>
	//function bsCarouselAnimHeight() {
		$('.carousel').carousel({
			interval: 5000
		}).on('slide.bs.carousel', function (e) {
			var nextH = $(e.relatedTarget).height();

			$(this).find('.active.item').parent().animate({
				height: nextH
			}, 500);
		});
	//}
	</script>




	<script>

	function addMarker(feature) {
		var marker = new google.maps.Marker({
			position: feature.position,

			map: map
		});
	}

	function initialize() {
		var myLatlng = new google.maps.LatLng(14.5757335,120.9947509);

		var mapOptions = {
			zoom: 16,
			scaleControl: false,
			scrollwheel: false,
			disableDoubleClickZoom: true,
			zoomControlOptions: {
				style:google.maps.ZoomControlStyle.LARGE
			},
			center: myLatlng
		}
		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			center: myLatlng
			
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);
	</script>

	<script>
	$(".store-search").click(function(){
		$("#map").show();
	});
	</script>

	<script>
	$(".toggle-filter").click(function(){
		$(".filters").toggle();
	});
	</script>


	<script>

    // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
    var mainbottom = $('.services-pawning').offset().top + $('.services-pawning').height();


// on scroll, 
$(window).on('scroll',function(){

    // we round here to reduce a little workload
    stop = Math.round($(window).scrollTop());
    if (stop > mainbottom) {
    	$('.nav-wrap').addClass('past-hero');
    } else {
    	$('.nav-wrap').removeClass('past-hero');
    }

});




// Add scrollspy to <body>
$('body').scrollspy({offset: 130}); 



$("#navscroll ul li a[href^='#']").on('click', function(e) {

      // prevent default anchor click behavior
      e.preventDefault();

      // animate
      $('html, body').animate({
      	scrollTop: $(this.hash).offset().top - 125
      }, 1000, function(){

          // when done, add hash to url
          // (default click behaviour)
          window.location.hash = this.hash;
      });
  });



// Add smooth scrolling to all links inside a navbar
$("#navscroll a").on('click', function(event){

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash (#)
  var hash = this.hash;


});









</script>




</body>
</html>