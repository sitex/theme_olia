/* Olia Shades (The Colours) */
$( document ).ready(function() {
if(!olia) var olia = {};
olia.shades = {
	init:function(){
		this.showPackshot();
		this.showSlingshot();
		this.generateIframeSS();
	},
	onOpened:function(speedFactor, sens) {
		var animateOptions = $.extend({duration:olia.animationDuration*speedFactor}, olia.animateOptions);
		olia.flower.animate({right:240, top:0}, $.extend({duration:olia.animationDuration}, olia.animateOptions));
		$("#shades").css("display","block");
		$("#shades .background, #shades #packshot").animate({opacity:1}, animateOptions);
		$("#shades #thin_goutte").animate({top:0}, animateOptions);
		$("#shades h2.shadesh2").animate({top:110}, animateOptions);
		$("#shades #shade-wrapper").animate({right:-269}, animateOptions);
		$("#shades p.push").animate({right:112}, animateOptions);
		// $("#shades #buttons").animate({right:50}, animateOptions);
	},
	onClosed:function(speedFactor, sens) {
		var animateOptions = $.extend({duration:olia.animationDuration*speedFactor, complete:olia.shades.onClosingComplete}, olia.animateOptions);
		$("#shades .background, #shades #packshot").animate({opacity:0}, animateOptions);
		$("#shades #thin_goutte").animate({top:-520}, animateOptions);
		$("#shades h2.shadesh2").animate({top:-50}, animateOptions);
		$("#shades #shade-wrapper").animate({right:-800}, animateOptions);
		$("#shades p.push").animate({right:-410}, animateOptions);
		// $("#shades #buttons").animate({right:-460}, animateOptions);
	},
	onClosingComplete:function() {
		$("#shades").css("display","none");
	},
	showPackshot:function(){
		$("#shade-wrapper li a.shades")
			.bind("click", function(e){
				e.preventDefault();
			})
			.bind("mouseenter", function(){
				$('.help_box').fadeOut();
				$('.mask').hide();
				$("#shade-wrapper li a.shades").removeClass("over");
				$(this).toggleClass("over");

				var classImg = $(this).children('img').attr('class');
				$('#packshot img').css('display', 'none');
				$('#packshot > .'+classImg).css('display', 'block');

		})
		.bind("mouseleave", function(){
			var classImg = $(this).children('img').attr('class');
			$('#packshot img').css('display', 'none');
			$('#packshot img:first').css('display', 'block');

		});
	},
	showSlingshot:function(){
		$('#shade-wrapper > ul > li')
			.bind('mouseover', function(){
				$('#shade-wrapper > ul > li, .help_box').css('zIndex', '');
				$(this).css('zIndex', '5');
			}).bind('mouseleave', function(){
				$("#shade-wrapper li a.shades").removeClass("over");
			});

		$('.mask').bind('click', function(){
			$("#shade-wrapper li a.shades").removeClass("over");
			$(this).hide();
			$('.help_box').fadeOut();
		});

		$('#shade-wrapper ul li a span').bind('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			$(this).parents('li').children('.mask').show();
			$(this).parent().next().fadeIn();
		});

		$('.help_box a.slingshot').bind('click', function(e){
			e.preventDefault();
			$(this).parents('.help_box').find('p').slideDown();
		});

	},
	generateIframeSS:function(){
		$('#shade-wrapper ul li a span').bind('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			$(this).parents('li').find('iframe').attr('src', $(this).parents('li').find('iframe').attr('src'));

		});
	}

}
olia.shades.init()						// init
$('.intense_red').trigger('mouseenter')	// default
});
