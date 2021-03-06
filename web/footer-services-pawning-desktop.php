
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

 $("#inputamount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        // //display error message
        // $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
  $("#inputdays").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        // //display error message
        // $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });





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
          // window.location.hash = this.hash;
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


<script>


$(".carret1").click(function(){
	$(".carrethide1").show(200);
	$(".carret1").hide(200);


});
$(".carrethide1").click(function(){
	$(".carrethide1").hide(200);
	$(".carret1").show(200);


});

$(".carret2").click(function(){
	$(".carrethide2").show(200);
	$(".carret2").hide(200);


});
$(".carrethide2").click(function(){
	$(".carrethide2").hide(200);
	$(".carret2").show(200);


});


$(".carret3").click(function(){
	$(".carrethide3").show(200);
	$(".carret3").hide(200);


});
$(".carrethide3").click(function(){
	$(".carrethide3").hide(200);
	$(".carret3").show(200);


});
$(".carret4").click(function(){
	$(".carrethide4").show(200);
	$(".carret4").hide(200);


});
$(".carrethide4").click(function(){
	$(".carrethide4").hide(200);
	$(".carret4").show(200);


});


</script>




</body>
</html>