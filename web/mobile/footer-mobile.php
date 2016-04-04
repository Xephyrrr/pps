
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="">HOME</a></li>
					<li><a href="">ABOUT US</a></li>
					<li><a href="">SERVICES</a></li>
					<li><a href="">PERA PADALA</a></li>
					<li><a href="">PAWNSHOP</a></li>
					<li><a href="">EXCHANGE RATE</a></li>
					<li><a href="">SUKI CARD</a></li>
					<li><a href="">NEWS/EVENTS</a></li>
					<li><a href="">MEDIA</a></li>
					<li><a href="">FAQS</a></li>
				</ul>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/js/bootstrap.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/js/jquery-ui.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/js/holder.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/js/jasny-bootstrap.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/js/jquery.ui.touch-punch.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/js/milestone.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/mobile/js/material.min.js"></script>

<!-- <script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/holder.js"></script>
<script src="js/jasny-bootstrap.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
<!-- <script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="js/milestone.js"></script> -->


<script>
	$('#slider-loan-max .ui-slider-handle').draggable();
</script>

	
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
				}else if(days >= 34 && days <= 41) {//34-41
						finalValue = loan * 0.04; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.03; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 42 && days <= 52) {//42-52
						finalValue = loan * 0.05; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.04; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 53 && days <= 63) {//53-63
						finalValue = loan * 0.06; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.05; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 64 && days <= 71) {//64-71
						finalValue = loan * 0.07; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.06; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 72 && days <= 82) {//64-71
						finalValue = loan * 0.08; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.07; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 83 && days <= 93) {//83-93
						finalValue = loan * 0.09; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.08; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 94 && days <= 101) {//94-101
						finalValue = loan * 0.10; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.09; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 102 && days <= 112) {//102-122
						finalValue = loan * 0.11; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.10; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 113 && days <= 123) {//113-123
						finalValue = loan * 0.12; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.11; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 124 && days <= 131) {//124-131
						finalValue = loan * 0.13; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.12; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 132 && days <= 142) {//132-142
						finalValue = loan * 0.14; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.13; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 143 && days <= 150) {//143-150
						finalValue = loan * 0.15; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.14; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
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
				}else if(days >= 34 && days <= 41) {//34-41
						finalValue = loan * 0.04; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.03; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 42 && days <= 52) {//42-52
						finalValue = loan * 0.05; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.04; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 53 && days <= 63) {//53-63
						finalValue = loan * 0.06; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.05; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 64 && days <= 71) {//64-71
						finalValue = loan * 0.07; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.06; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 72 && days <= 82) {//64-71
						finalValue = loan * 0.08; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.07; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 83 && days <= 93) {//83-93
						finalValue = loan * 0.09; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.08; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 94 && days <= 101) {//94-101
						finalValue = loan * 0.10; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.09; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 102 && days <= 112) {//102-122
						finalValue = loan * 0.11; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.10; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 113 && days <= 123) {//113-123
						finalValue = loan * 0.12; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.11; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 124 && days <= 131) {//124-131
						finalValue = loan * 0.13; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.12; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 132 && days <= 142) {//132-142
						finalValue = loan * 0.14; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.13; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 143 && days <= 150) {//143-150
						finalValue = loan * 0.15; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.14; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
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
				}else if(days >= 34 && days <= 41) {//34-41
						finalValue = loan * 0.04; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.03; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 42 && days <= 52) {//42-52
						finalValue = loan * 0.05; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.04; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 53 && days <= 63) {//53-63
						finalValue = loan * 0.06; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.05; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 64 && days <= 71) {//64-71
						finalValue = loan * 0.07; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.06; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 72 && days <= 82) {//64-71
						finalValue = loan * 0.08; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.07; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 83 && days <= 93) {//83-93
						finalValue = loan * 0.09; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.08; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 94 && days <= 101) {//94-101
						finalValue = loan * 0.10; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.09; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 102 && days <= 112) {//102-122
						finalValue = loan * 0.11; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.10; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 113 && days <= 123) {//113-123
						finalValue = loan * 0.12; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.11; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 124 && days <= 131) {//124-131
						finalValue = loan * 0.13; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.12; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 132 && days <= 142) {//132-142
						finalValue = loan * 0.14; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.13; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 143 && days <= 150) {//143-150
						finalValue = loan * 0.15; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.14; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
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
				}else if(days >= 34 && days <= 41) {//34-41
						finalValue = loan * 0.04; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.03; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 42 && days <= 52) {//42-52
						finalValue = loan * 0.05; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.04; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 53 && days <= 63) {//53-63
						finalValue = loan * 0.06; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.05; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 64 && days <= 71) {//64-71
						finalValue = loan * 0.07; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.06; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 72 && days <= 82) {//64-71
						finalValue = loan * 0.08; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.07; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 83 && days <= 93) {//83-93
						finalValue = loan * 0.09; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.08; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 94 && days <= 101) {//94-101
						finalValue = loan * 0.10; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.09; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 102 && days <= 112) {//102-122
						finalValue = loan * 0.11; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.10; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 113 && days <= 123) {//113-123
						finalValue = loan * 0.12; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.11; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 124 && days <= 131) {//124-131
						finalValue = loan * 0.13; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.12; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 132 && days <= 142) {//132-142
						finalValue = loan * 0.14; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.13; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 143 && days <= 150) {//143-150
						finalValue = loan * 0.15; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.14; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
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
// $(function () {
// 	compute();
// 	function compute(){
// 		var dayValue = $("#slider-month-max").slider( "value" );
// 		if (dayValue >= 1) {	
// 			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .01);
// 			$( "#redeemAmount" ).val( "Php " + finalvalue);
// 		}else if (dayValue >= 12) {	
// 			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .02);
// 			$( "#redeemAmount" ).val( "Php " + finalvalue);
// 		}else if (dayValue >= 23) {	
// 			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .03);
// 			$( "#redeemAmount" ).val( "Php " + finalvalue);
// 		}
// 	};
// })
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
				}else if(days >= 34 && days <= 41) {//34-41
						finalValue = loan * 0.04; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.03; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 42 && days <= 52) {//42-52
						finalValue = loan * 0.05; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.04; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 53 && days <= 63) {//53-63
						finalValue = loan * 0.06; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.05; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 64 && days <= 71) {//64-71
						finalValue = loan * 0.07; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.06; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 72 && days <= 82) {//64-71
						finalValue = loan * 0.08; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.07; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 83 && days <= 93) {//83-93
						finalValue = loan * 0.09; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.08; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 94 && days <= 101) {//94-101
						finalValue = loan * 0.10; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.09; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 102 && days <= 112) {//102-122
						finalValue = loan * 0.11; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.10; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 113 && days <= 123) {//113-123
						finalValue = loan * 0.12; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.11; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 124 && days <= 131) {//124-131
						finalValue = loan * 0.13; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.12; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 132 && days <= 142) {//132-142
						finalValue = loan * 0.14; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.13; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 143 && days <= 150) {//143-150
						finalValue = loan * 0.15; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.14; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
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
				}else if(days >= 34 && days <= 41) {//34-41
						finalValue = loan * 0.04; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.03; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 42 && days <= 52) {//42-52
						finalValue = loan * 0.05; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.04; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 53 && days <= 63) {//53-63
						finalValue = loan * 0.06; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.05; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 64 && days <= 71) {//64-71
						finalValue = loan * 0.07; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.06; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 72 && days <= 82) {//64-71
						finalValue = loan * 0.08; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.07; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 83 && days <= 93) {//83-93
						finalValue = loan * 0.09; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.08; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 94 && days <= 101) {//94-101
						finalValue = loan * 0.10; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.09; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 102 && days <= 112) {//102-122
						finalValue = loan * 0.11; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.10; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 113 && days <= 123) {//113-123
						finalValue = loan * 0.12; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.11; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 124 && days <= 131) {//124-131
						finalValue = loan * 0.13; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.12; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 132 && days <= 142) {//132-142
						finalValue = loan * 0.14; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.13; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 143 && days <= 150) {//143-150
						finalValue = loan * 0.15; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.14; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
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
				}else if(days >= 34 && days <= 41) {//34-41
						finalValue = loan * 0.04; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.03; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 42 && days <= 52) {//42-52
						finalValue = loan * 0.05; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.04; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 53 && days <= 63) {//53-63
						finalValue = loan * 0.06; //Get initial interest
						mPrincipal = loan * 0.02; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.05; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 64 && days <= 71) {//64-71
						finalValue = loan * 0.07; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.06; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 72 && days <= 82) {//64-71
						finalValue = loan * 0.08; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.07; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 83 && days <= 93) {//83-93
						finalValue = loan * 0.09; //Get initial interest
						mPrincipal = loan * 0.04; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.08; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 94 && days <= 101) {//94-101
						finalValue = loan * 0.10; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.09; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 102 && days <= 112) {//102-122
						finalValue = loan * 0.11; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.10; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 113 && days <= 123) {//113-123
						finalValue = loan * 0.12; //Get initial interest
						mPrincipal = loan * 0.06; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.11; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 124 && days <= 131) {//124-131
						finalValue = loan * 0.13; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.12; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 132 && days <= 142) {//132-142
						finalValue = loan * 0.14; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.13; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}
						
					}else if(days >= 143 && days <= 150) {//143-150
						finalValue = loan * 0.15; //Get initial interest
						mPrincipal = loan * 0.08; //2% of Principal (Liquidated damages - 2% of principal per 30 days) 
						finalValue2 = loan * 0.14; //2% initial interest - Redeem Amount
						$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
						$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						console.log('finalValue '+finalValue);
						console.log('Principal '+mPrincipal);
						console.log('serviceCharge '+serviceCharge);
						
						if(suki == 'sukiactive'){
							// combinedinterest = finalValue + mPrincipal;
							discount = finalValue * 0.05;
							finalValue = finalValue - discount;
							// discounted = combinedinterest - discount;
							// combinedinterest2 = finalValue2 + mPrincipal;
							discount2 = finalValue2 * 0.05;
							finalValue2 = finalValue2 - discount2;
							// discounted2 = combinedinterest2 - discount2;
							console.log('finalvalue2: '+finalValue2);
							// console.log('combinedinterest2: '+combinedinterest2);
							// console.log('discount2: '+discount2);
							// console.log('discounted2: '+discounted2);
							console.log('mPrincipal : '+mPrincipal);
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
						}else if(suki == 'nonsuki'){
							$( "#redeemAmount" ).val( "Php " + Math.round10((finalValue2 + mPrincipal + loan),-2));
							$( "#renewalAmount" ).val( "Php " + Math.round10((finalValue + mPrincipal + serviceCharge ),-2));
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


<!-- 
	START OF PADALA WIDGET -->
	<script>

$("#inputdefault").bind("change paste keyup", function() {

	$('.padalaValue').val($('#inputdefault').val());
});

$(function(){
	
	$('#inputdefault input').val({

	});
	$('.padalaValue').val($('#inputdefault').val());
});	


$( "#inputdefault" ).keyup(function() {


	
	if ($("#inputdefault").val() > 50000 && $('.padalaValue').val() > 50000)
	{
		$("#inputdefault").val(50000) && $(".padalaValue").val(50000);
	}
	var locationradio = $('input:radio[name=locationradio]:checked').val();
	var amount = parseInt($('.padalaValue').val());
	var fee1 = 2;
	var fee2 = 3;
	var fee3 = 8;
	var fee4 = 10;
	var fee5 = 12;
	var fee6 = 15;
	var fee7 = 20;
	var fee8 = 30;
	var fee9 = 40;
	var fee10 = 50;
	var fee11 = 60;
	var fee12 = 70;
	var fee13 = 90;
	var fee14 = 115;
	var fee15 = 125;
	var fee16 = 140;
	var fee17 = 210;
	var fee18 = 220;
	var fee19 = 250;
	var fee20 = 290;
	var fee21 = 320;
	var fee22 = 345;

	var ffee1 = 3;
	var ffee2 = 6;
	var ffee3 = 9;
	var ffee4 = 12;
	var ffee5 = 15;
	var ffee6 = 18;
	var ffee7 = 21;
	var ffee8 = 24;
	var ffee9 = 27;
	var ffee10 = 30;
	var ffee11 = 45;
	var ffee12 = 60;
	var ffee13 = 75;
	var ffee14 = 90;
	var ffee15 = 95;
	var ffee16 = 115;
	var ffee17 = 125;
	var ffee18 = 145;
	var ffee19 = 155;
	var ffee20 = 165;
	var ffee21 = 185;
	var ffee22 = 195;
	var ffee23 = 210;
	var ffee24 = 220;
	var ffee25 = 250;
	var ffee26 = 290;
	var ffee27 = 320;
	var ffee28 = 345;

	console.log(locationradio);
	console.log(amount);
	console.log($('.feeValue').val());

	if(locationradio == 'location1'){

		if (amount >= 1 && amount <= 100){
			$('.feeValue').val(fee1);
			$('.padalaValue').val(amount);
		}else if (amount >= 101 && amount <= 300){
			$('.feeValue').val(fee2);
			$('.padalaValue').val(amount);
		}else if (amount >= 301 && amount <= 500){
			$('.feeValue').val(fee3);
			$('.padalaValue').val(amount);
		}else if (amount >= 501 && amount <= 700){
			$('.feeValue').val(fee4);
			$('.padalaValue').val(amount);
		}else if (amount >= 701 && amount <= 900){
			$('.feeValue').val(fee5);
			$('.padalaValue').val(amount);
		}else if (amount >= 901 && amount <= 1000){
			$('.feeValue').val(fee6);
			$('.padalaValue').val(amount);
		}else if (amount >= 1001 && amount <= 1500){
			$('.feeValue').val(fee7);
			$('.padalaValue').val(amount);
		}else if (amount >= 1501 && amount <= 2000){
			$('.feeValue').val(fee8);
			$('.padalaValue').val(amount);
		}else if (amount >= 2001 && amount <= 2500){
			$('.feeValue').val(fee9);
			$('.padalaValue').val(amount);
		}else if (amount >= 2501 && amount <= 3000){
			$('.feeValue').val(fee10);
			$('.padalaValue').val(amount);
		}else if (amount >= 3001 && amount <= 3500){
			$('.feeValue').val(fee11);
			$('.padalaValue').val(amount);
		}else if (amount >= 3501 && amount <= 4000){
			$('.feeValue').val(fee12);
			$('.padalaValue').val(amount);
		}else if (amount >= 4001 && amount <= 5000){
			$('.feeValue').val(fee13);
			$('.padalaValue').val(amount);
		}else if (amount >= 5001 && amount <= 7000){
			$('.feeValue').val(fee14);
			$('.padalaValue').val(amount);
		}else if (amount >= 7001 && amount <= 9500){
			$('.feeValue').val(fee15);
			$('.padalaValue').val(amount);
		}else if (amount >= 9501 && amount <= 10000){
			$('.feeValue').val(fee16);
			$('.padalaValue').val(amount);
		}else if (amount >= 10001 && amount <= 14000){
			$('.feeValue').val(fee17);
			$('.padalaValue').val(amount);
		}else if (amount >= 14001 && amount <= 15000){
			$('.feeValue').val(fee18);
			$('.padalaValue').val(amount);
		}else if (amount >= 15001 && amount <= 20000){
			$('.feeValue').val(fee19);
			$('.padalaValue').val(amount);
		}else if (amount >= 20001 && amount <= 30000){
			$('.feeValue').val(fee20);
			$('.padalaValue').val(amount);
		}else if (amount >= 30001 && amount <= 40000){
			$('.feeValue').val(fee21);
			$('.padalaValue').val(amount);
		}else if (amount >= 40001 && amount <= 50000){
			$('.feeValue').val(fee22);
			$('.padalaValue').val(amount);
		}
	}else if(locationradio == 'location2'){
		if (amount >= 1 && amount <= 100){
			$('.feeValue').val(ffee1);
			$('.padalaValue').val(amount);
		}else if (amount >= 101 && amount <= 200){
			$('.feeValue').val(ffee2);
			$('.padalaValue').val(amount);
		}else if (amount >= 201 && amount <= 300){
			$('.feeValue').val(ffee3);
			$('.padalaValue').val(amount);
		}else if (amount >= 301 && amount <= 400){
			$('.feeValue').val(ffee4);
			$('.padalaValue').val(amount);
		}else if (amount >= 401 && amount <= 500){
			$('.feeValue').val(ffee5);
			$('.padalaValue').val(amount);
		}else if (amount >= 501 && amount <= 600){
			$('.feeValue').val(ffee6);
			$('.padalaValue').val(amount);
		}else if (amount >= 601 && amount <= 700){
			$('.feeValue').val(ffee7);
			$('.padalaValue').val(amount);
		}else if (amount >= 701 && amount <= 800){
			$('.feeValue').val(ffee8);
			$('.padalaValue').val(amount);
		}else if (amount >= 801 && amount <= 900){
			$('.feeValue').val(ffee9);
			$('.padalaValue').val(amount);
		}else if (amount >= 901 && amount <= 1000){
			$('.feeValue').val(ffee10);
			$('.padalaValue').val(amount);
		}else if (amount >= 1001 && amount <= 1500){
			$('.feeValue').val(ffee11);
			$('.padalaValue').val(amount);
		}else if (amount >= 1501 && amount <= 2000){
			$('.feeValue').val(ffee12);
			$('.padalaValue').val(amount);
		}else if (amount >= 2001 && amount <= 2500){
			$('.feeValue').val(ffee13);
			$('.padalaValue').val(amount);
		}else if (amount >= 2501 && amount <= 3000){
			$('.feeValue').val(ffee14);
			$('.padalaValue').val(amount);
		}else if (amount >= 3001 && amount <= 3500){
			$('.feeValue').val(ffee15);
			$('.padalaValue').val(amount);
		}else if (amount >= 3501 && amount <= 4000){
			$('.feeValue').val(ffee16);
			$('.padalaValue').val(amount);
		}else if (amount >= 4001 && amount <= 5000){
			$('.feeValue').val(ffee17);
			$('.padalaValue').val(amount);
		}else if (amount >= 5001 && amount <= 6000){
			$('.feeValue').val(ffee18);
			$('.padalaValue').val(amount);
		}else if (amount >= 6001 && amount <= 7000){
			$('.feeValue').val(ffee19);
			$('.padalaValue').val(amount);
		}else if (amount >= 7001 && amount <= 8000){
			$('.feeValue').val(ffee20);
			$('.padalaValue').val(amount);
		}else if (amount >= 8000 && amount <= 9500){
			$('.feeValue').val(ffee21);
			$('.padalaValue').val(amount);
		}else if (amount >= 9501 && amount <= 10000){
			$('.feeValue').val(ffee22);
			$('.padalaValue').val(amount);
		}else if (amount >= 10001 && amount <= 14000){
			$('.feeValue').val(ffee23);
			$('.padalaValue').val(amount);
		}else if (amount >= 14001 && amount <= 15000){
			$('.feeValue').val(ffee24);
			$('.padalaValue').val(amount);
		}else if (amount >= 15001 && amount <= 20000){
			$('.feeValue').val(ffee25);
			$('.padalaValue').val(amount);
		}else if (amount >= 20001 && amount <= 30000){
			$('.feeValue').val(ffee26);
			$('.padalaValue').val(amount);
		}else if (amount >= 30001 && amount <= 40000){
			$('.feeValue').val(ffee27);
			$('.padalaValue').val(amount);
		}else if (amount >= 40001 && amount <= 50000){
			$('.feeValue').val(ffee28);
			$('.padalaValue').val(amount);
		}
	}



}); 

//RADIO ALGO FOR Visayas, Mindano, Southern Luzon 

$('#radio-vmsl').change(function(){
	
	var locationradio = $('input:radio[name=locationradio]:checked').val();	
	var amount = parseInt($('.padalaValue').val());

	var fee1 = 2;
	var fee2 = 3;
	var fee3 = 8;
	var fee4 = 10;
	var fee5 = 12;
	var fee6 = 15;
	var fee7 = 20;
	var fee8 = 30;
	var fee9 = 40;
	var fee10 = 50;
	var fee11 = 60;
	var fee12 = 70;
	var fee13 = 90;
	var fee14 = 115;
	var fee15 = 125;
	var fee16 = 140;
	var fee17 = 210;
	var fee18 = 220;
	var fee19 = 250;
	var fee20 = 290;
	var fee21 = 320;
	var fee22 = 345;


	if (amount >= 1 && amount <= 100){
		$('.feeValue').val(fee1);
		$('.padalaValue').val(amount);
	}else if (amount >= 101 && amount <= 300){
		$('.feeValue').val(fee2);
		$('.padalaValue').val(amount);
	}else if (amount >= 301 && amount <= 500){
		$('.feeValue').val(fee3);
		$('.padalaValue').val(amount);
	}else if (amount >= 501 && amount <= 700){
		$('.feeValue').val(fee4);
		$('.padalaValue').val(amount);
	}else if (amount >= 701 && amount <= 900){
		$('.feeValue').val(fee5);
		$('.padalaValue').val(amount);
	}else if (amount >= 901 && amount <= 1000){
		$('.feeValue').val(fee6);
		$('.padalaValue').val(amount);
	}else if (amount >= 1001 && amount <= 1500){
		$('.feeValue').val(fee7);
		$('.padalaValue').val(amount);
	}else if (amount >= 1501 && amount <= 2000){
		$('.feeValue').val(fee8);
		$('.padalaValue').val(amount);
	}else if (amount >= 2001 && amount <= 2500){
		$('.feeValue').val(fee9);
		$('.padalaValue').val(amount);
	}else if (amount >= 2501 && amount <= 3000){
		$('.feeValue').val(fee10);
		$('.padalaValue').val(amount);
	}else if (amount >= 3001 && amount <= 3500){
		$('.feeValue').val(fee11);
		$('.padalaValue').val(amount);
	}else if (amount >= 3501 && amount <= 4000){
		$('.feeValue').val(fee12);
		$('.padalaValue').val(amount);
	}else if (amount >= 4001 && amount <= 5000){
		$('.feeValue').val(fee13);
		$('.padalaValue').val(amount);
	}else if (amount >= 5001 && amount <= 7000){
		$('.feeValue').val(fee14);
		$('.padalaValue').val(amount);
	}else if (amount >= 7001 && amount <= 9500){
		$('.feeValue').val(fee15);
		$('.padalaValue').val(amount);
	}else if (amount >= 9501 && amount <= 10000){
		$('.feeValue').val(fee16);
		$('.padalaValue').val(amount);
	}else if (amount >= 10001 && amount <= 14000){
		$('.feeValue').val(fee17);
		$('.padalaValue').val(amount);
	}else if (amount >= 14001 && amount <= 15000){
		$('.feeValue').val(fee18);
		$('.padalaValue').val(amount);
	}else if (amount >= 15001 && amount <= 20000){
		$('.feeValue').val(fee19);
		$('.padalaValue').val(amount);
	}else if (amount >= 20001 && amount <= 30000){
		$('.feeValue').val(fee20);
		$('.padalaValue').val(amount);
	}else if (amount >= 30001 && amount <= 40000){
		$('.feeValue').val(fee21);
		$('.padalaValue').val(amount);
	}else if (amount >= 40001 && amount <= 50000){
		$('.feeValue').val(fee22);
		$('.padalaValue').val(amount);
	}

});

$('#radio-ncrl').change(function(){
	
	var locationradio = $('input:radio[name=locationradio]:checked').val();	
	var amount = parseInt($('.padalaValue').val());

	var fee1 = 3;
	var fee2 = 6;
	var fee3 = 9;
	var fee4 = 12;
	var fee5 = 15;
	var fee6 = 18;
	var fee7 = 21;
	var fee8 = 24;
	var fee9 = 27;
	var fee10 = 30;
	var fee11 = 45;
	var fee12 = 60;
	var fee13 = 75;
	var fee14 = 90;
	var fee15 = 95;
	var fee16 = 115;
	var fee17 = 125;
	var fee18 = 145;
	var fee19 = 155;
	var fee20 = 165;
	var fee21 = 185;
	var fee22 = 195;
	var fee23 = 210;
	var fee24 = 220;
	var fee25 = 250;
	var fee26 = 290;
	var fee27 = 320;
	var fee28 = 345;


	if (amount >= 1 && amount <= 100){
		$('.feeValue').val(fee1);
		$('.padalaValue').val(amount);
	}else if (amount >= 101 && amount <= 200){
		$('.feeValue').val(fee2);
		$('.padalaValue').val(amount);
	}else if (amount >= 201 && amount <= 300){
		$('.feeValue').val(fee3);
		$('.padalaValue').val(amount);
	}else if (amount >= 301 && amount <= 400){
		$('.feeValue').val(fee4);
		$('.padalaValue').val(amount);
	}else if (amount >= 401 && amount <= 500){
		$('.feeValue').val(fee5);
		$('.padalaValue').val(amount);
	}else if (amount >= 501 && amount <= 600){
		$('.feeValue').val(fee6);
		$('.padalaValue').val(amount);
	}else if (amount >= 601 && amount <= 700){
		$('.feeValue').val(fee7);
		$('.padalaValue').val(amount);
	}else if (amount >= 701 && amount <= 800){
		$('.feeValue').val(fee8);
		$('.padalaValue').val(amount);
	}else if (amount >= 801 && amount <= 900){
		$('.feeValue').val(fee9);
		$('.padalaValue').val(amount);
	}else if (amount >= 901 && amount <= 1000){
		$('.feeValue').val(fee10);
		$('.padalaValue').val(amount);
	}else if (amount >= 1001 && amount <= 1500){
		$('.feeValue').val(fee11);
		$('.padalaValue').val(amount);
	}else if (amount >= 1501 && amount <= 2000){
		$('.feeValue').val(fee12);
		$('.padalaValue').val(amount);
	}else if (amount >= 2001 && amount <= 2500){
		$('.feeValue').val(fee13);
		$('.padalaValue').val(amount);
	}else if (amount >= 2501 && amount <= 3000){
		$('.feeValue').val(fee14);
		$('.padalaValue').val(amount);
	}else if (amount >= 3001 && amount <= 3500){
		$('.feeValue').val(fee15);
		$('.padalaValue').val(amount);
	}else if (amount >= 3501 && amount <= 4000){
		$('.feeValue').val(fee16);
		$('.padalaValue').val(amount);
	}else if (amount >= 4001 && amount <= 5000){
		$('.feeValue').val(fee17);
		$('.padalaValue').val(amount);
	}else if (amount >= 5001 && amount <= 6000){
		$('.feeValue').val(fee18);
		$('.padalaValue').val(amount);
	}else if (amount >= 6001 && amount <= 7000){
		$('.feeValue').val(fee19);
		$('.padalaValue').val(amount);
	}else if (amount >= 7001 && amount <= 8000){
		$('.feeValue').val(fee20);
		$('.padalaValue').val(amount);
	}else if (amount >= 8000 && amount <= 9500){
		$('.feeValue').val(fee21);
		$('.padalaValue').val(amount);
	}else if (amount >= 9501 && amount <= 10000){
		$('.feeValue').val(fee22);
		$('.padalaValue').val(amount);
	}else if (amount >= 10001 && amount <= 14000){
		$('.feeValue').val(fee23);
		$('.padalaValue').val(amount);
	}else if (amount >= 14001 && amount <= 15000){
		$('.feeValue').val(fee24);
		$('.padalaValue').val(amount);
	}else if (amount >= 15001 && amount <= 20000){
		$('.feeValue').val(fee25);
		$('.padalaValue').val(amount);
	}else if (amount >= 20001 && amount <= 30000){
		$('.feeValue').val(fee26);
		$('.padalaValue').val(amount);
	}else if (amount >= 30001 && amount <= 40000){
		$('.feeValue').val(fee27);
		$('.padalaValue').val(amount);
	}else if (amount >= 40001 && amount <= 50000){
		$('.feeValue').val(fee28);
		$('.padalaValue').val(amount);
	}

});





$('#radio-suki-remittance1').change(function(){
	var feeholder = parseInt($('.feeValue').val());
	var padalaholder = parseInt($('.padalaValue').val());
	var remittance = $('input:radio[name=remittance]:checked').val();


	if(remittance == 'sukiremittance'){
		discount = feeholder * 0.05;
		feeholder = feeholder - discount;
		$( ".feeValue" ).val(feeholder);
	}else{
		$( ".feeValue" ).val(feeholder);
	}

	console.log("fee " + feeholder);


});

$('#radio-suki-remittance2').change(function(){
	var feeholder = parseInt($('.feeValue').val());
	var remittance = $('input:radio[name=remittance]:checked').val();


	if(remittance == 'nonsukiremittance'){
		var locationradio = $('input:radio[name=locationradio]:checked').val();
		var amount = parseInt($('.padalaValue').val());
		var fee1 = 2;
		var fee2 = 3;
		var fee3 = 8;
		var fee4 = 10;
		var fee5 = 12;
		var fee6 = 15;
		var fee7 = 20;
		var fee8 = 30;
		var fee9 = 40;
		var fee10 = 50;
		var fee11 = 60;
		var fee12 = 70;
		var fee13 = 90;
		var fee14 = 115;
		var fee15 = 125;
		var fee16 = 140;
		var fee17 = 210;
		var fee18 = 220;
		var fee19 = 250;
		var fee20 = 290;
		var fee21 = 320;
		var fee22 = 345;

		var ffee1 = 3;
		var ffee2 = 6;
		var ffee3 = 9;
		var ffee4 = 12;
		var ffee5 = 15;
		var ffee6 = 18;
		var ffee7 = 21;
		var ffee8 = 24;
		var ffee9 = 27;
		var ffee10 = 30;
		var ffee11 = 45;
		var ffee12 = 60;
		var ffee13 = 75;
		var ffee14 = 90;
		var ffee15 = 95;
		var ffee16 = 115;
		var ffee17 = 125;
		var ffee18 = 145;
		var ffee19 = 155;
		var ffee20 = 165;
		var ffee21 = 185;
		var ffee22 = 195;
		var ffee23 = 210;
		var ffee24 = 220;
		var ffee25 = 250;
		var ffee26 = 290;
		var ffee27 = 320;
		var ffee28 = 345;

		console.log(locationradio);
		console.log(amount);
		console.log($('.feeValue').val());

		if(locationradio == 'location1'){

			if (amount >= 1 && amount <= 100){
				$('.feeValue').val(fee1);
				$('.padalaValue').val(amount);
			}else if (amount >= 101 && amount <= 300){
				$('.feeValue').val(fee2);
				$('.padalaValue').val(amount);
			}else if (amount >= 301 && amount <= 500){
				$('.feeValue').val(fee3);
				$('.padalaValue').val(amount);
			}else if (amount >= 501 && amount <= 700){
				$('.feeValue').val(fee4);
				$('.padalaValue').val(amount);
			}else if (amount >= 701 && amount <= 900){
				$('.feeValue').val(fee5);
				$('.padalaValue').val(amount);
			}else if (amount >= 901 && amount <= 1000){
				$('.feeValue').val(fee6);
				$('.padalaValue').val(amount);
			}else if (amount >= 1001 && amount <= 1500){
				$('.feeValue').val(fee7);
				$('.padalaValue').val(amount);
			}else if (amount >= 1501 && amount <= 2000){
				$('.feeValue').val(fee8);
				$('.padalaValue').val(amount);
			}else if (amount >= 2001 && amount <= 2500){
				$('.feeValue').val(fee9);
				$('.padalaValue').val(amount);
			}else if (amount >= 2501 && amount <= 3000){
				$('.feeValue').val(fee10);
				$('.padalaValue').val(amount);
			}else if (amount >= 3001 && amount <= 3500){
				$('.feeValue').val(fee11);
				$('.padalaValue').val(amount);
			}else if (amount >= 3501 && amount <= 4000){
				$('.feeValue').val(fee12);
				$('.padalaValue').val(amount);
			}else if (amount >= 4001 && amount <= 5000){
				$('.feeValue').val(fee13);
				$('.padalaValue').val(amount);
			}else if (amount >= 5001 && amount <= 7000){
				$('.feeValue').val(fee14);
				$('.padalaValue').val(amount);
			}else if (amount >= 7001 && amount <= 9500){
				$('.feeValue').val(fee15);
				$('.padalaValue').val(amount);
			}else if (amount >= 9501 && amount <= 10000){
				$('.feeValue').val(fee16);
				$('.padalaValue').val(amount);
			}else if (amount >= 10001 && amount <= 14000){
				$('.feeValue').val(fee17);
				$('.padalaValue').val(amount);
			}else if (amount >= 14001 && amount <= 15000){
				$('.feeValue').val(fee18);
				$('.padalaValue').val(amount);
			}else if (amount >= 15001 && amount <= 20000){
				$('.feeValue').val(fee19);
				$('.padalaValue').val(amount);
			}else if (amount >= 20001 && amount <= 30000){
				$('.feeValue').val(fee20);
				$('.padalaValue').val(amount);
			}else if (amount >= 30001 && amount <= 40000){
				$('.feeValue').val(fee21);
				$('.padalaValue').val(amount);
			}else if (amount >= 40001 && amount <= 50000){
				$('.feeValue').val(fee22);
				$('.padalaValue').val(amount);
			}
		}else if(locationradio == 'location2'){
			if (amount >= 1 && amount <= 100){
				$('.feeValue').val(ffee1);
				$('.padalaValue').val(amount);
			}else if (amount >= 101 && amount <= 200){
				$('.feeValue').val(ffee2);
				$('.padalaValue').val(amount);
			}else if (amount >= 201 && amount <= 300){
				$('.feeValue').val(ffee3);
				$('.padalaValue').val(amount);
			}else if (amount >= 301 && amount <= 400){
				$('.feeValue').val(ffee4);
				$('.padalaValue').val(amount);
			}else if (amount >= 401 && amount <= 500){
				$('.feeValue').val(ffee5);
				$('.padalaValue').val(amount);
			}else if (amount >= 501 && amount <= 600){
				$('.feeValue').val(ffee6);
				$('.padalaValue').val(amount);
			}else if (amount >= 601 && amount <= 700){
				$('.feeValue').val(ffee7);
				$('.padalaValue').val(amount);
			}else if (amount >= 701 && amount <= 800){
				$('.feeValue').val(ffee8);
				$('.padalaValue').val(amount);
			}else if (amount >= 801 && amount <= 900){
				$('.feeValue').val(ffee9);
				$('.padalaValue').val(amount);
			}else if (amount >= 901 && amount <= 1000){
				$('.feeValue').val(ffee10);
				$('.padalaValue').val(amount);
			}else if (amount >= 1001 && amount <= 1500){
				$('.feeValue').val(ffee11);
				$('.padalaValue').val(amount);
			}else if (amount >= 1501 && amount <= 2000){
				$('.feeValue').val(ffee12);
				$('.padalaValue').val(amount);
			}else if (amount >= 2001 && amount <= 2500){
				$('.feeValue').val(ffee13);
				$('.padalaValue').val(amount);
			}else if (amount >= 2501 && amount <= 3000){
				$('.feeValue').val(ffee14);
				$('.padalaValue').val(amount);
			}else if (amount >= 3001 && amount <= 3500){
				$('.feeValue').val(ffee15);
				$('.padalaValue').val(amount);
			}else if (amount >= 3501 && amount <= 4000){
				$('.feeValue').val(ffee16);
				$('.padalaValue').val(amount);
			}else if (amount >= 4001 && amount <= 5000){
				$('.feeValue').val(ffee17);
				$('.padalaValue').val(amount);
			}else if (amount >= 5001 && amount <= 6000){
				$('.feeValue').val(ffee18);
				$('.padalaValue').val(amount);
			}else if (amount >= 6001 && amount <= 7000){
				$('.feeValue').val(ffee19);
				$('.padalaValue').val(amount);
			}else if (amount >= 7001 && amount <= 8000){
				$('.feeValue').val(ffee20);
				$('.padalaValue').val(amount);
			}else if (amount >= 8000 && amount <= 9500){
				$('.feeValue').val(ffee21);
				$('.padalaValue').val(amount);
			}else if (amount >= 9501 && amount <= 10000){
				$('.feeValue').val(ffee22);
				$('.padalaValue').val(amount);
			}else if (amount >= 10001 && amount <= 14000){
				$('.feeValue').val(ffee23);
				$('.padalaValue').val(amount);
			}else if (amount >= 14001 && amount <= 15000){
				$('.feeValue').val(ffee24);
				$('.padalaValue').val(amount);
			}else if (amount >= 15001 && amount <= 20000){
				$('.feeValue').val(ffee25);
				$('.padalaValue').val(amount);
			}else if (amount >= 20001 && amount <= 30000){
				$('.feeValue').val(ffee26);
				$('.padalaValue').val(amount);
			}else if (amount >= 30001 && amount <= 40000){
				$('.feeValue').val(ffee27);
				$('.padalaValue').val(amount);
			}else if (amount >= 40001 && amount <= 50000){
				$('.feeValue').val(ffee28);
				$('.padalaValue').val(amount);
			}
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
	function bsCarouselAnimHeight() {
		$('.carousel').carousel({
			interval: 5000
		}).on('slide.bs.carousel', function (e) {
			var nextH = $(e.relatedTarget).height();

			$(this).find('.active.item').parent().animate({
				height: nextH
			}, 500);
		});


	}
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
		$(".filters").slideToggle('2000',"swing", function () {
			($(".toggle-filter").text() === "+") ? $(".test").text("-") : $(".toggle-filter").text("+");
		});
	});
</script>


<script>

	// Add scrollspy to <body>
	$('body').scrollspy({offset: 70});

	// Add smooth scrolling to all links inside a navbar
	$("#navscroll a").on('click', function(event){

		// Prevent default anchor click behavior
		event.preventDefault();

		// Store hash (#)
		var hash = this.hash;

		// Using jQuery's animate() method to add smooth page scroll
		// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area (the speed of the animation)
		$('html, body').animate({
			scrollTop: $(hash).offset().top -50
		}, 800, function(){


		});
	});
</script>


<script>

// Add scrollspy to <body>
$('body').scrollspy({offset: 150}); 



$("#navscroll-faq ul li a[href^='#']").on('click', function(e) {

      // prevent default anchor click behavior
      e.preventDefault();

      // animate
      $('html, body').animate({
      	scrollTop: $(this.hash).offset().top - 140
      }, 1000, function(){

          // when done, add hash to url
          // (default click behaviour)
          // window.location.hash = this.hash;
      });
  });



// Add smooth scrolling to all links inside a navbar
$("#navscroll-faq a").on('click', function(event){

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash (#)
  var hash = this.hash;


});

</script>

<script>
	$("#pawning-nav a").click(function(){
		$("#pawning-nav").toggleClass("in");
	});
</script>




<script>


$(".carret1").click(function(){
	$(".hiddendiv1").show(800);
	$(".carret1").hide(800);
	$(".carrethide1").show(800);

});


$(".carrethide1").click(function(){
	$(".hiddendiv1").hide(800);
	$(".carret1").show(800);
	$(".carrethide1").hide(800);

});

$(".carret2").click(function(){
	$(".hiddendiv2").show(800);
	$(".carret2").hide(800);
	$(".carrethide2").show(800);

});


$(".carrethide2").click(function(){
	$(".hiddendiv2").hide(800);
	$(".carret2").show(800);
	$(".carrethide2").hide(800);

});


$(".carret3").click(function(){
	$(".hiddendiv3").show(800);
	$(".carret3").hide(800);
	$(".carrethide3").show(800);

});


$(".carrethide3").click(function(){
	$(".hiddendiv3").hide(800);
	$(".carret3").show(800);
	$(".carrethide3").hide(800);

});

$(".carret4").click(function(){
	$(".hiddendiv4").show(800);
	$(".carret4").hide(800);
	$(".carrethide4").show(800);

});


$(".carrethide4").click(function(){
	$(".hiddendiv4").hide(800);
	$(".carret4").show(800);
	$(".carrethide4").hide(800);

});

</script>


<script>
	$(document).ready(function(){
    //FANCYBOX
    //https://github.com/fancyapps/fancyBox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
  
</script>

<script>
    jQuery(document).ready(function() {

    $(".video").click(function() {
        $.fancybox({
            'padding'       : 0,
            'autoScale'     : false,
            'transitionIn'  : 'none',
            'transitionOut' : 'none',
            'title'         : this.title,
            'width'         : 640,
            'height'        : 385,
            'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
            'type'          : 'swf',
            'swf'           : {
            'wmode'             : 'transparent',
            'allowfullscreen'   : 'true'
            }
        });

        return false;
    });
});
</script>

<script>
	
  $('#media').carousel({
    pause: true,
    interval: false,
  });

    $('#media2').carousel({
    pause: true,
    interval: false,
  });

</script>

<script>
	
	;(function(){
	
	'use strict';

	var expandSearch = {
		init: function(){

			var _this = this,
			_searchContainers = document.querySelectorAll('.expandSearch');

			for( var _index in _searchContainers ){
				if( typeof _searchContainers[ _index ] === 'object' ){
					_this.searchFunctions( _searchContainers[ _index ] );
				}
			}

		},

		searchFunctions: function( _thisSearch ){
				
			var _nodes = _thisSearch.childNodes;

			//a click
			_nodes[3].addEventListener('click',function(e){

				if( _thisSearch.attributes.class.value.indexOf("showSearch") > -1 ){
					_thisSearch.attributes.class.value = 'expandSearch';
				}
				else{
					_thisSearch.attributes.class.value = 'expandSearch showSearch';
				}

				if( !e.preventDefault() ){ e.returnValue = false; }
			});

		}

	};


	//execute
	expandSearch.init();

}());
</script>



</body>
</html>