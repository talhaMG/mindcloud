$(document).ready(function() {

    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");

    $('[href="#"]').attr("href", "javascript:;");

    $('.menu-Bar').click(function() {
        $(this).toggleClass('open');
        $('.menuWrap').toggleClass('open');
        $('body').toggleClass('ovr-hiddn');
    });

    $('a.menu-dash, .menu-dash-front').click(function() {
        $(this).toggleClass('open');
        $('.dashboard-menu-box, .front-dashboard').toggleClass('open');
    });


    // $("ul.login-btn .dropdown-toggle > a").click(function(e) {
    //     $(this).toggleClass('open');
    //     $('body').toggleClass('open');
    //     $(".dropdown-box").slideUp(), $(this).next().is(":visible") || $(this).next().slideDown(),
    //         e.stopPropagation()
    // })


    $('ul.course-scroll .dropdown-toggle > a').click(function() {
        $(this).parent('li').find('.dropdown-toggle').addClass('open');
        $(this).parent('li').addClass('active');
        $(this).parent('li').siblings().find('.dropdown-toggle').removeClass('open');
        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').find('.dropdown-box').slideDown();
        $(this).parent('li').siblings().find('.dropdown-box').slideUp();
    });



    $('[data-targetit]').on('click', function(e) {
        $(this).addClass('current');
        $(this).siblings().removeClass('current');
        var target = $(this).data('targetit');
        $('.' + target).siblings('[class^="box-"]').hide();
        $('.' + target).fadeIn();
        $('.form-tabing').slick('setPosition');
    });

    // $('.dropdown-toggle').click(function() {
    //     $('.dashboard-child-links').slideToggle();
    // });



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




// $(document).ready(function() {
//     $('ul.dashboard-nav li a').click(function() {
//         $('ul.dashboard-nav li a').removeClass("active");
//         $(this).addClass("active");
//     });
// });

// $(document).ready(function() {
//     $('ul.course-scroll li a').click(function() {
//         $('ul.course-scroll li a').removeClass("active");
//         $(this).addClass("active");
//     });
// });



$(window).load(function() {
    var url = window.location.href;
    $('ul.dashboard-nav li').find('.active').removeClass('active');
    $('ul.dashboard-nav li a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
});

$(window).load(function() {
    var url = window.location.href;
    $('ul.tut-menu-inner li').find('.active').removeClass('active');
    $('ul.tut-menu-inner li a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
});

$(window).load(function() {
    var url = window.location.href;
    $('ul.dropdown-box li').find('.active').removeClass('active');
    $('ul.dropdown-box li a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
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


$('.certificate-slide').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [{
            breakpoint: 824,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
            }
        },

        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            }
        },


    ]
});

$('.consult-left-slide').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    responsive: [{
            breakpoint: 824,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
            }
        },

    ]
});


$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 200) {
        $(".fixed").addClass("sticky");
    } else {
        $(".fixed").removeClass("sticky");
    }
});

$("ul.course-scroll, .tutorial-scroll-content, .video-caption, .index-page-wrap, .order-confirm, .place-order ").mCustomScrollbar({
    scrollButtons: { enable: true },
    theme: "dark"
});

// $("ul.fld-progress").mCustomScrollbar({
//     scrollButtons: { enable: true },
//     theme: "dark",
//     axis: "x"
// });

$('.fld-html input:checkbox').click(function() {
    $('.fld-html input:checkbox').not(this).prop('checked', false);
});


$(function drawSector() {
    var activeBorder = $("#activeBorder");
    var prec = activeBorder.children().children().text();
    if (prec > 100)
        prec = 100;
    var deg = prec * 3.6;
    if (deg <= 180) {
        activeBorder.css('background-image', 'linear-gradient(' + (90 + deg) + 'deg, transparent 50%, #FDBE41 50%),linear-gradient(90deg, #FDBE41 50%, transparent 50%)');
    } else {
        activeBorder.css('background-image', 'linear-gradient(' + (deg - 90) + 'deg, transparent 50%, #fff 50%),linear-gradient(90deg, #FDBE41 50%, transparent 50%)');
    }

    var startDeg = $("#startDeg").attr("class");
    activeBorder.css('transform', 'rotate(' + startDeg + 'deg)');
    $("#circle").css('transform', 'rotate(' + (-startDeg) + 'deg)');
});



$(function drawSector() {
    var activeBorder = $("#activeBorder1");
    var prec = activeBorder.children().children().text();
    if (prec > 100)
        prec = 100;
    var deg = prec * 3.6;
    if (deg <= 180) {
        activeBorder.css('background-image', 'linear-gradient(' + (90 + deg) + 'deg, transparent 50%, #F3F7FB 50%),linear-gradient(90deg, #F3F7FB 50%, transparent 50%)');
    } else {
        activeBorder.css('background-image', 'linear-gradient(' + (deg - 90) + 'deg, transparent 50%, #1BA8E8 50%),linear-gradient(90deg, #F3F7FB 50%, transparent 50%)');
    }

    var startDeg = $("#startDeg1").attr("class");
    activeBorder.css('transform', 'rotate(' + startDeg + 'deg)');
    $("#circle1").css('transform', 'rotate(' + (-startDeg) + 'deg)');
});



$(function drawSector() {
    var activeBorder = $("#activeBorder2");
    var prec = activeBorder.children().children().text();
    if (prec > 100)
        prec = 100;
    var deg = prec * 3.6;
    if (deg <= 180) {
        activeBorder.css('background-image', 'linear-gradient(' + (90 + deg) + 'deg, transparent 50%, #F3F7FB 50%),linear-gradient(90deg, #F3F7FB 50%, transparent 50%)');
    } else {
        activeBorder.css('background-image', 'linear-gradient(' + (deg - 90) + 'deg, transparent 50%, #1BA8E8 50%),linear-gradient(90deg, #F3F7FB 50%, transparent 50%)');
    }

    var startDeg = $("#startDeg2").attr("class");
    activeBorder.css('transform', 'rotate(' + startDeg + 'deg)');
    $("#circle2").css('transform', 'rotate(' + (-startDeg) + 'deg)');
});




function shows_form_part(n) {
    var i = 1,
        p = document.getElementById("form_part" + 1);
    while (p !== null) {
        if (i === n) {
            p.style.display = "";
        } else {
            p.style.display = "none";
        }
        i++;
        p = document.getElementById("form_part" + i);
    }
}

function submit_form() {
    var sum = parseInt(document.getElementById("num1").value) +
        parseInt(document.getElementById("num2").value) +
        parseInt(document.getElementById("num3").value);
    alert("Your result is: " + sum);
}



/* RESPONSIVE JS */
if ($(window).width() < 824) {


}