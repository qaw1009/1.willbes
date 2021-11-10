// LNB 메뉴
$(function () {
    $('.Menu_open').click(function () {
        $('#aside .navi').addClass('d_none');
        $('#aside #navi_' + $(this).data('navi')).removeClass('d_none');
        $('.dim').show().css('display', 'block');
        $('#aside').addClass('on');
    });
});
$(function () {
    $('.Menu_close').click(function () {
        $('.dim').hide().css('display', 'none');
        $('#aside').removeClass('on');
    });
});

// GNB 메뉴    
$(function () {
    $('.subMenu .sMenuList a.moreMenu').click(function () {
        $('.subMenu .sMenuList .dropBox').removeClass('on');

        if ($(this).next().is(':visible')) {
            $(this).next().hide();
            $(this).removeClass('on');
        } else {
            $('.dropBox').hide();
            $(this).next().show();
            $(this).addClass('on');
        }
    });
});

// Aside 아코디언 메뉴 Script
$(function () {
    $('.ListBox .List').click(function () {
        $('.ListBox .List').removeClass('on');

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
$(function () {
    $('.willbes-Txt .MoreBtn a').click(function () {
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


// 내강의실 학원강의 Script
$(function () {
    $('.w-lecList > div > a').click(function () {
        var $off_pkg_list = $(this).parent().parent().find('ul'); //$('.w-lecList ul');
        if ($off_pkg_list.is(':hidden')) {
            $off_pkg_list.show().css('visibility', 'visible');
            $(this).text('▲');
        } else {
            $off_pkg_list.hide().css('visibility', 'hidden');
            $(this).text('▼');
        }
    });
});


// 내강의실 온라인강좌 버튼 Script
$(function () {
    $('.willbes-Open-Table .MoreBtn a').click(function () {
        var $lec_info_table = $(this).parents('.willbes-Open-Table').find('.openTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('visibility', 'visible');
            //$('.willbes-Open-Table .MoreBtn a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off.png');
            $(this).find('img').attr('src', '/public/img/willbes/m/mypage/icon_arrow_off.png');
        } else {
            $lec_info_table.hide().css('visibility', 'hidden');
            //$('.willbes-Open-Table .MoreBtn a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on.png');
            $(this).find('img').attr('src', '/public/img/willbes/m/mypage/icon_arrow_on.png');
        }
    });
});

// 강좌 교재구매 버튼 Script
$(function () {
    $('.BuylecMore a').click(function () {
        var $lec_buy_table = $('.buylecTable');

        if ($lec_buy_table.is(':hidden')) {
            $lec_buy_table.show().css('visibility', 'visible');
            $('.BuylecMore a img').attr('src', '/public/img/willbes/m/mypage/icon_arrow_off_white.png');
        } else {
            $lec_buy_table.hide().css('visibility', 'hidden');
            $('.BuylecMore a img').attr('src', '/public/img/willbes/m/mypage/icon_arrow_on_white.png');
        }
    });
});

// 장바구니
$(function () {
    $('.basketBox .MoreBtn a').click(function () {
        var $basket_Info = $('.basketInfo');

        if ($basket_Info.is(':hidden')) {
            $basket_Info.show().css('visibility', 'visible');
            $('.basketBox .MoreBtn a img').attr('src', '/public/img/willbes/m/mypage/icon_arrow_on.png');
        } else {
            $basket_Info.hide().css('visibility', 'hidden');
            $('.basketBox .MoreBtn a img').attr('src', '/public/img/willbes/m/mypage/icon_arrow_off.png');
        }
    });
});

// 결제하기 전체동의
$(function () {
    $('.policyInfo .MoreBtn').click(function () {
        var $policy_Info = $(this).parents('.policyInfo li').find('.txtBox');

        if ($policy_Info.is(':hidden')) {
            $policy_Info.show().css('visibility', 'visible');
            $(this).text('▲');
        } else {
            $policy_Info.hide().css('visibility', 'hidden');
            $(this).text('▼');
        }
    });
});

// 쿠폰관리 탭
$(function () {
    $('ul.myCouponTab').each(function () {
        var $active, $content, $links = $(this).find('a');
        $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);

        $content = $($active[0].hash);

        $links.not($active).each(function () {
            $(this.hash).hide().css('display', 'none');
        });


        $(this).on('click', 'a', function (e) {
            $active.removeClass('on');
            $content.hide().css('display', 'none');

            $active = $(this);
            $content = $(this.hash);

            $active.addClass('on');
            $content.show().css('display', 'block');

            e.preventDefault();
        });
    });
});

function openLink(tabId) {
    $('ul.myCouponTab').find('#' + tabId).click();
}



// Swiper Script
$(function () {
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
    new Swiper('.swiper-container-page-manual', {
        spaceBetween: 0,
        centeredSlides: true,
        loop: false,
        loopFillGroupWithBlank: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });
    new Swiper('.swiper-container-book-img', {
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
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        observer: true,
        observeParents: true,
    });
});

// Slider Swipe Script
$(function () {
    $('.swiper-container-campus .swiper-slide a').click(function () {
        $('.swiper-container-campus .swiper-slide a').removeClass('on');
        if ($(this).hasClass('on')) {
            $(this).removeClass('on');
        } else {
            $(this).addClass('on');
        }
    });
    $('.swiper-container-campus-list .swiper-slide a').click(function () {
        $('.swiper-container-campus-list .swiper-slide a').removeClass('on');
        if ($(this).hasClass('on')) {
            $(this).removeClass('on');
        } else {
            $(this).addClass('on');
        }
    });
});

// Top fixed Script
$(function () {
    $('*[id*=Fixbtn]:visible').each(function () {
        $(".goTopbtn").addClass('on');
    });
});

// Top Script
function link_go() {
    $('html, body').animate({
        scrollTop: $("#goTop").offset().top
    }, 200);
}

// 반응형 이미지맵
$(function () {
    $(document).ready(function (e) {
        // IOS에서는 이미지맵을 스크립트로 조절하면 안먹히는 이슈 있음.
        if (navigator.userAgent.match(/iPad/i) == null && navigator.userAgent.match(/iPhone|iPod/i) == null) {
            $('img[usemap]').rwdImageMaps();
        }
    });
});