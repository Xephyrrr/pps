
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