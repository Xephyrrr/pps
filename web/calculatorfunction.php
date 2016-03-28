<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<script>
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

</body>
</html>