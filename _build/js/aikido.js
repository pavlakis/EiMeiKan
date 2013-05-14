$(document).ready(function() {

	function reflowPage() {
		$('header, header nav').css({'padding-top':$(window).height()/6});
		$('article:first-child').css({'margin-top':$(window).height()-25});
		$('article').css({'min-height':$(window).height()-95});
	}

	$('header nav a').bind('click',function(e){
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000);
        e.preventDefault();
	});

	$(window).resize(function() {
		reflowPage();
	});

	reflowPage();

	var preStickyNav = $('header nav ul li:last-child').offset().top + $('header nav ul li:last-child').outerHeight();
	var stickyNav = $('header nav ul li:last-child').offset().top + ($('header nav ul li:last-child').outerHeight() * 2);

	$(window).scroll(function() {
		if ($(window).scrollTop() > preStickyNav) {
			$('header nav').addClass("top");
		} else {
			$('header nav').removeClass("top");
		}
		if ($(window).scrollTop() > stickyNav) {
			$('header nav').addClass("stick");
		} else {
			$('header nav').removeClass("stick");
		}
	});

});
