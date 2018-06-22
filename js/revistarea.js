jQuery(document).ready(function($){
	$(".principal, .single-header").height($(window).height()-$(".main-header").height())

	$('#carousel-example-generic').carousel({
		interval:4000
	})


	$('#carousel-example-generic h1').hide()
	$('#carousel-example-generic h2').hide()
	$('#carousel-example-generic .side-bar').hide();
	$('#carousel-example-generic .extracto').hide()
	$('#carousel-example-generic .active .side-bar').slideDown();
	$('#carousel-example-generic .active h1').fadeIn();
	$('#carousel-example-generic .active h2').delay(300).fadeIn();
	$('#carousel-example-generic .active .extracto').delay(600).fadeIn();
	$('#carousel-example-generic').on('slide.bs.carousel', function () {
		//$('#carousel-example-generic h3, #carousel-example-generic h4').hide()
		setTimeout(function(){
			
			$('#carousel-example-generic h1').hide()
			$('#carousel-example-generic h2').hide()
			$('#carousel-example-generic .side-bar').hide();
			$('#carousel-example-generic .extracto').hide()
			
			$('#carousel-example-generic .active h1').fadeIn();
			$('#carousel-example-generic .active h2').delay(300).fadeIn();
			$('#carousel-example-generic .active .side-bar').slideDown();
			$('#carousel-example-generic .active .extracto').delay(600).fadeIn();

		},1000)
	})


	$(".loop-total a.ver-pagina").hover( 
			function(){
				$(this).parent().find(".wrap").slideUp();
			}
		, 
			function(){
				$(this).parent().find(".wrap").slideDown();
			}
		 )


	$("a.buscar").click(function(e){
		e.preventDefault();
		$("#form-buscador").animate({width:'toggle'},350);
	})

})