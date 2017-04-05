//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});


/*$('#carousel-header .fill, .paralax').each(function() {
    var $obj = $(this);
    $(window).scroll(function() {
        var yPos = -($(window).scrollTop() / 15);
        var bgpos = '50% ' + yPos + 'px';
        $obj.css('background-position', bgpos);
    });
});*/

$('.carousel').carousel({
    interval: false
});

new WOW().init();