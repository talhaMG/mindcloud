$(document).ready(function() {

    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");

    $('[href="#"]').attr("href", "javascript:;");

    $('.menu-Bar').click(function() {
        $(this).toggleClass('open');
        $('.menuWrap').toggleClass('open');
        $('body').toggleClass('ovr-hiddn');
    });

    $('.loginUp').click(function() {
        $('.LoginPopup').fadeIn();
        $('.overlay').fadeIn();
    });

    $('.signUp').click(function() {
        $('.signUpPop').fadeIn();
        $('.overlay').fadeIn();
    });

    $('.closePop,.overlay').click(function() {
        $('.popupMain').fadeOut();
        $('.overlay').fadeOut();
    });



    $('.testi-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
    });

    $(function() {
        $('.btn-hover')
            .on('mouseenter', function(e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('span').css({ top: relY, left: relX })
            })
            .on('mouseout', function(e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('span').css({ top: relY, left: relX })
            });
        $('[href=#]').click(function() { return false });
    });

});

$('.colasebar li .faqBox').click(function() {
    $(this).parent('li').find('.faqBox').addClass('open');
    $(this).parent('li').addClass('active');
    $(this).parent('li').siblings().find('.faqBox').removeClass('open');
    $(this).parent('li').siblings().removeClass('active');
    $(this).parent('li').find('.expandable').slideDown();
    $(this).parent('li').siblings().find('.expandable').slideUp();
});

$('.colasebar li .faqBar').click(function() {
    $(this).parent('li').find('.faqBar').addClass('open');
    $(this).parent('li').addClass('active');
    $(this).parent('li').siblings().find('.faqBar').removeClass('open');
    $(this).parent('li').siblings().removeClass('active');
    $(this).parent('li').find('.expandable').slideDown();
    $(this).parent('li').siblings().find('.expandable').slideUp();
});


$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 200) {
        $(".fixed").addClass("sticky");
    } else {
        $(".fixed").removeClass("sticky");
    }
});

(function($) {
    $(window).on("load", function() {
        $(".pack-spec-scroll").mCustomScrollbar();
    });
})(jQuery);

/* RESPONSIVE JS */
if ($(window).width() < 824) {


}