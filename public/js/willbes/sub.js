// 교수 페이지 nth-child(4n)
$(function() {
    $("ul li.profList:nth-child(4n)").addClass("nth");
});

// 교재정보 전체보기 버튼 Script
$(function() {
    $('.willbes-Lec-Subject .MoreBtn a').click(function() {
        if( $(".willbes-Lec-Table").is(":hidden") ) {
            $(".willbes-Lec-Table").css("display","block");
            $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체닫기 ▲");
        }
        else
        {
            $(".willbes-Lec-Table").css("display","none");
            $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체보기 ▼");
        }
    });
});

// 교재정보 보기 버튼 Script
$(function() {
    $('.willbes-Lec-Table .w-notice .MoreBtn a').click(function() {
        if( $("table.lecInfoTable").is(":hidden") ) {
            $("table.lecInfoTable").css("display","block");
            $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 닫기 ▲");
        }
        else
        {
            $("table.lecInfoTable").css("display","none");
            $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 보기 ▼");
        }
    });
});

// 유의사항안내보기 버튼 Script
$(function() {
    $('.willbes-Cart-Txt .MoreBtn a').click(function() {
        if( $("table.txtTable tr").is(":hidden") ) {
            $("table.txtTable tr").css("display","block");
            $("table.txtTable").removeClass("off");
            $(".willbes-Cart-Txt .MoreBtn a").text("유의사항안내 닫기 ▲");
        }
        else
        {
            $("table.txtTable tr").css("display","none");
            $("table.txtTable").addClass("off");
            $(".willbes-Cart-Txt .MoreBtn a").text("유의사항안내 보기 ▼");
        }
    });
});

// checkbox 결제 버튼 Script
$(function() {
    $('.chk.buybtn input:checkbox').change(function(){
        if($(this).is(":checked")) {
            $('.willbes-Lec-buyBtn-sm').addClass("active");
        } else {
            $('.willbes-Lec-buyBtn-sm').removeClass("active");
        }
    });
});

// 장바구니 상품정보 Script
$(function() {
    $('td.w-list a').click(function(){
        if($('.willbes-Layer-Box-sm').is(":hidden")) {
            $('td.w-list a img.dot').css("display","none");
        } else {
            $('td.w-list a img.dot').css("display","inline");
        }
    });
});

// scroll top fixed Script
$(function() {
    var stickyOffset = $('.sticky-menu').offset().top;

    $(window).scroll(function(){
    var sticky = $('.sticky-menu'),
        scroll = $(window).scrollTop();

    if (scroll >= stickyOffset) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
    });
});



