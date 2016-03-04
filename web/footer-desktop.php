
<footer>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="footerfont">
					<ul>
						<li><a href="/">HOME</a></li>
						<li><a href="#">E-Loading</a></li>
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


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/holder.js"></script>
	<script src="js/jasny-bootstrap.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>



	<script>
	$(function() {
		$( "#slider-loan-max" ).slider({
			range: "max",
			value: 3500,
			min: 400,
			max: 5000,
			step: 1.00,
			slide: function( event, ui ) {
				$( "#loanAmount" ).val( "Php " + ui.value );
				var days = $( "#slider-month-max" ).slider( "value" );
				var loan = ui.value;
				var finalValue = loan;
				var suki = $('input:radio[name=suki]:checked').val();

				console.log("final value " + finalValue);
				console.log("  loan " + loan);


				console.log(suki);
				if(days >= 1 && days <= 11){
					finalValue = loan * 0.01;
				}else if(days >= 12 && days <= 22){
					finalValue = loan * 0.02;
				}else if(days >= 23){
					finalValue = loan * 0.03;
				}else{
					finalValue = 0;
				}

				if(suki == 'sukiactive'){
					discount = finalValue * 0.05;
					finalValue = finalValue - discount;
					$( "#loanValue" ).val( "Php " + (loan + finalValue));
				}else if(suki == 'nonsuki'){
					$( "#loanValue" ).val( "Php " + (loan + finalValue));
				}else{
					$( "#loanValue" ).val( "Php " + (loan + finalValue));
				}
				$( "#loanValue" ).val( "Php " + (loan + finalValue));

			}

		});
$( "#loanAmount" ).val( "Php " + $( "#slider-loan-max" ).slider( 'value' ) );
});
</script>



<script>


</script>

<script>
$(function() {
	$( "#slider-month-max" ).slider({
		range: "max",
		min: 1,
		max: 33,
		value: 11,
		step: 1,
		slide: function( event, ui ) {
			$( "#month" ).val( ui.value + " Day/s"  );
			var days = ui.value;
			var loan = $( "#slider-loan-max" ).slider( "value" );
			var finalValue = loan;
			var suki = $('input:radio[name=suki]:checked').val();


			if(days >= 1 && days <= 11){
				finalValue = loan * 0.01;
			}else if(days >= 12 && days <= 22){
				finalValue = loan * 0.02;
			}else if(days >= 23){
				finalValue = loan * 0.03;
			}else{
				finalValue = 0;
			}

			if(suki == 'sukiactive'){
				discount = finalValue * 0.05;
				finalValue = finalValue - discount;
				$( "#loanValue" ).val( "Php " + (loan + finalValue));
			}else if(suki == 'nonsuki'){
				$( "#loanValue" ).val( "Php " + (loan + finalValue));
			}else{
				$( "#loanValue" ).val( "Php " + (loan + finalValue));
			}
			$( "#loanValue" ).val( "Php " + (loan + finalValue));

		}
	});
	$( "#month" ).val( $( "#slider-month-max" ).slider( "value" ) + " Day/s" );
});
</script>

<script>
// $(function () {
// 	compute();
// 	function compute(){
// 		var dayValue = $("#slider-month-max").slider( "value" );
// 		if (dayValue >= 1) {	
// 			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .01);
// 			$( "#loanValue" ).val( "Php " + finalvalue);
// 		}else if (dayValue >= 12) {	
// 			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .02);

// 			$( "#loanValue" ).val( "Php " + finalvalue);
// 		}else if (dayValue >= 23) {	
// 			var finalvalue = ($("#slider-loan-max").slider( "value" ) * .03);
// 			$( "#loanValue" ).val( "Php " + finalvalue);
// 		}
// 	};

// })

$('#radio-suki1').change(function(){

	var loan = $( "#slider-loan-max" ).slider( "value" );
	var finalValue = loan;
	var suki = $('input:radio[name=suki]:checked').val();
	var days = $( "#slider-month-max" ).slider( "value" );
	var finalValue = loan;


	if(days >= 1 && days <= 11){
		finalValue = loan * 0.01;
	}else if(days >= 12 && days <= 22){
		finalValue = loan * 0.02;
	}else if(days >= 23){
		finalValue = loan * 0.03;
	}else{
		finalValue = 0;
	}


	if(suki == 'sukiactive'){
		discount = finalValue * 0.05;
		finalValue = finalValue - discount;
		$( "#loanValue" ).val( "Php " + (loan + finalValue));
	}else{
		$( "#loanValue" ).val( "Php " + (loan + finalValue));
	}


	console.log("discount " + discount);
	console.log(suki);
	console.log("final value " + finalValue);
	console.log("  loan " + loan);

});




$('#radio-suki2').change(function(){

	var loan = $( "#slider-loan-max" ).slider( "value" );
	var finalValue = loan;
	var suki = $('input:radio[name=suki]:checked').val();
	var days = $( "#slider-month-max" ).slider( "value" );
	var finalValue = loan;


	if(days >= 1 && days < 11){
		finalValue = loan * 0.01;
	}else if(days >= 11 && days < 22){
		finalValue = loan * 0.02;
	}else if(days >= 22){
		finalValue = loan * 0.03;
	}else{
		finalValue = 0;
	}


	if(suki == 'nonsuki'){
		discount = 0;
		$( "#loanValue" ).val( "Php " + (loan + finalValue));
	}

	console.log("discount " + discount);
	console.log(suki);
	console.log("final value " + finalValue);
	console.log("  loan " + loan);


});








</script>




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

	console.log("fee " + feeholder);


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
		$(".filters").slideToggle('2000',"swing", function () {
		});
	});
	</script>


	<script>

    // get the value of the bottom of the #main element by adding the offset of that element plus its height, set it as a variable
    var mainbottom = $('.store-locator').offset().top + $('.store-locator').height();


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
</script>



</body>
</html>