$.fn.preload = function() {
	this.each(function(){
		$('<img/>')[0].src = this;
	});
}

$(['/theme/Olia/img/bg1.jpg','/theme/Olia/img/bg2.jpg','/theme/Olia/img/bg3.jpg']).preload();

function cycleImages(){
	var $active = $('.bgImage .active');
	var $next = ($active.next().length > 0) ? $active.next() : $('.bgImage img:first');
	$next.css('z-index',2);//move the next image up the pile
	$active.fadeOut(500,function(){//fade out the top image
	$active.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
		$next.css('z-index',3).addClass('active');//make the next image the top one
	});
}

$(document).ready(function(){
// run every 7s
setInterval('cycleImages()', 3000);
})
