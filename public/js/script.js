/*setInterval(function(){
	$('main ul').animate({marginLeft:'-1000px',duration: 2000},function() {
		$(this).find('li:last').after($(this).find('li:first'));
		$(this).css({marginLeft:0});
		$('ul li').attr('id');
	});
},4000);*/

$('.prev').on('click', function(){
	$('main ul').animate({marginLeft:'+1000px',duration: 2000},function() {
		$(this).find('li:last').after($(this).find('li:first'));
		$(this).css({marginLeft:0});
		$('ul li').attr('id');
	});
})

$('.next').on('click', function(){
	$('main ul').animate({marginLeft:'-1000px',duration: 2000},function() {
		$(this).find('li:last').after($(this).find('li:first'));
		$(this).css({marginLeft:0});
		$('ul li').attr('id');
	});
})

$('.menu').on('click',function(){
	$('.ed-menu li').slideToggle();
	$('.menu').toggleClass('active');
})

$('#mision').on('click',function(){
	$(this).addClass('top');
})

$('#vision').on('click',function(){
	$('#mision').removeClass('top');
})

setInterval(function(){
	$('.contactos main ul').animate({marginLeft:'-1000px',duration: 2000},function() {
		$(this).find('li:last').after($(this).find('li:first'));
		$(this).css({marginLeft:0});
		$('ul li').attr('id');
	});
},4000);
