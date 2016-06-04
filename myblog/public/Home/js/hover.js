$(function(){
	$('ul li h4 a').hover(function() {
		$(this).stop(1, 0).animate({marginLeft:'20px'},200);
		$(this).css({color: 'red'});
	}, function() {
		$(this).stop(1, 0).animate({marginLeft:'0px'},200);
		$(this).css({color: '#000'});
	});
})