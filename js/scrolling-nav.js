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

    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});


$('#carousel-header .fill, .paralax').each(function() {
    var $obj = $(this);
    $(window).scroll(function() {
        var yPos = -($(window).scrollTop() / 5);
        var bgpos = '50% ' + yPos + 'px';
        $obj.css('background-position', bgpos);
    });
});

$('.carousel').carousel({
    interval: 6000
});

new WOW().init();

$(window).load(function() {
    $('.post-module').hover(function() {
        $(this).find('.description').stop().animate({
        height: "toggle",
        opacity: "toggle"
        }, 300);
    });
});

var modal = $('#modal-galeria-fotos');
function openModalZoom(idFoto){

    $(function() {

        modal.find('.item').removeClass('active');
        modal.find('.carousel-indicators>li').removeClass('active');

        modal.find('#idCapFoto' + idFoto).addClass('active');
        modal.find('#idSlideFoto' + idFoto).addClass('active');

        modal.show();
    });
}

modal.find('.close').click(function(event) {
    modal.hide();
});

var cHeight = 0;

$('#myCarousel').on('slide.bs.carousel', function (e) {
    var $nextImage = null;

    $activeItem = $('.active.item', this);

    if (e.direction == 'left'){
        $nextImage = $activeItem.next('.item').find('img');
    } else {
        if ($activeItem.index() == 0){
            $nextImage = $('img:last', $activeItem.parent());
        } else {
            $nextImage = $activeItem.prev('.item').find('img');
        }
    }

    // prevents the slide decrease in height
    if (cHeight == 0) {
       cHeight = $(this).height();
       $activeItem.next('.item').height(cHeight);
    }

    // prevents the loaded image if it is already loaded
    var src = $nextImage.data('lazy-load-src');

    if (typeof src !== "undefined" && src != "") {
       $nextImage.attr('src', src)
       $nextImage.data('lazy-load-src', '');
    }
});