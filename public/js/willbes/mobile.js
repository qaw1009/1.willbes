// Menu Script
$(function() {
    $('.Menu_open').click(function() {
        $('.dim').show().css('display','block');
        $('#aside').addClass('on');
    });
});
$(function() {
    $('.Menu_close').click(function() {
        $('.dim').hide().css('display','none');
        $('#aside').removeClass('on');
    });
});

// Aside 아코디언 메뉴 Script
$(function() {
    $('.ListBox .List').click(function() {

        $('.ListBox .List').removeClass('on')

        if ($(this).next().is(':visible')) {
            $(this).next().slideUp('normal');
            $(this).removeClass('on');

        } else {
            $('.ListBox .List-Depth').slideUp('normal');
            $(this).next().slideDown('normal');
            $(this).addClass('on');

        }   
    });
});

// 열기, 닫기 버튼 Script
$(function() {
    $('.willbes-Txt .MoreBtn a').click(function() {
        var $txt_info = $(this).parents('.willbes-Txt');

        if ($txt_info.hasClass('on')) {
            $txt_info.removeClass('on');
            $(this).text('닫기 ▲');
            $.cookie('moreInfo', 'on', { expires: 7 });

        } else {
            $txt_info.addClass('on');
            $(this).text('열기 ▼');
            $.cookie('moreInfo', 'off', { expires: 7 });
        }
    });
});

// 내강의실 온라인강좌 버튼 Script
$(function() {
    $('.willbes-Open-Table .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Open-Table').find('.openTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('visibility','visible');
            //$('.willbes-Open-Table .MoreBtn a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off.png');
            $(this).find('img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off.png');
        } else {
            $lec_info_table.hide().css('visibility','hidden');
            //$('.willbes-Open-Table .MoreBtn a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on.png');
            $(this).find('img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on.png');
        }
    });
});

// 강좌 교재구매 버튼 Script
$(function() {
    $('.BuylecMore a').click(function() {
        var $lec_buy_table = $('.buylecTable');

        if ($lec_buy_table.is(':hidden')) {
            $lec_buy_table.show().css('visibility','visible');
            $('.BuylecMore a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off_white.png');
        } else {
            $lec_buy_table.hide().css('visibility','hidden');
            $('.BuylecMore a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on_white.png');
        }
    });
});

// Swiper Script
$(function() {
    new Swiper('.swiper-container-page', {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
    new Swiper('.swiper-container-arrow', {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        loop: true,
        loopFillGroupWithBlank: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
    new Swiper('.swiper-container-campus', {
        slidesPerView: 'auto',
        spaceBetween: 0
    });
    new Swiper('.swiper-container-campus-list', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
});

// Slider Swipe Script
$(function() {
    $('.swiper-container-campus .swiper-slide a').click(function() {
        $('.swiper-container-campus .swiper-slide a').removeClass('on');
        if ($(this).hasClass('on')) {
            $(this).removeClass('on');
        } else {
            $(this).addClass('on');
        } 
    });
    $('.swiper-container-campus-list .swiper-slide a').click(function() {
        $('.swiper-container-campus-list .swiper-slide a').removeClass('on');
        if ($(this).hasClass('on')) {
            $(this).removeClass('on');
        } else {
            $(this).addClass('on');
        } 
    });
});

// Top fixed Script
$(function() {
    $('*[id*=Fixbtn]:visible').each(function() {
        $(".goTopbtn").addClass('on');
    });
});

// Top Script
function link_go() {
    $('html, body').animate({
        scrollTop: $("#goTop").offset().top
    }, 200);
}