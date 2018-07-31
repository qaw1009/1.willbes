// 교수 페이지 nth-child(4n)
$(function() {
    $('ul li.profList:nth-child(4n)').addClass('nth');
});

// 교재정보 전체보기 버튼 Script
$(function() {
    $('.willbes-Lec-Subject .MoreBtn a').click(function() {
        var $lec_info_table = $('.willbes-Lec-Table .lecInfoTable');
        var $lec_into_btn = $('.willbes-Lec-Table .w-notice .MoreBtn a');
        var $lec_into_btn_txt = $('.willbes-Lec-Subject .MoreBtn a span');
        
        if ($(this).hasClass('on')) {
            $lec_info_table.hide().css('display','none');
            $lec_into_btn_txt.text('전체보기 ▼');
            $(this).removeClass('on');
            $lec_into_btn.text('교재정보 보기 ▼');
        } else {
            $lec_info_table.show().css('display','block');
            $lec_into_btn_txt.text('전체닫기 ▲');
            $(this).addClass('on');
            $lec_into_btn.text('교재정보 닫기 ▲');
        }
    });
});

// 교재정보 보기 버튼 Script
$(function() {
    $('.willbes-Lec-Table .w-notice .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Lec-Table').find('.lecInfoTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
            $(this).text('교재정보 닫기 ▲');
        } else {
            $lec_info_table.hide().css('display','none');
            $(this).text('교재정보 보기 ▼');
        }
    });
});

// 교재정보 보기(학원) 버튼 Script
$(function() {
    $('.willbes-Lec-Table .w-acad-tit a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Lec-Table').find('.lecInfoTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
        } else {
            $lec_info_table.hide().css('display','none');
        }
    });
});

// 유의사항안내보기 버튼 Script
$(function() {
    $('.willbes-Cart-Txt .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Cart-Txt').find('table.txtTable');
        var $lec_info_table_tr = $(this).parents('.willbes-Cart-Txt').find('table.txtTable tr');

        if( $lec_info_table_tr.is(':visible')) {
            $lec_info_table_tr.attr('style', 'display: none; !important');
            $lec_info_table.addClass('off');
            $(this).text('유의사항안내 보기 ▼');
        } else {
            $lec_info_table_tr.attr('style', 'display: block; !important');
            $lec_info_table.removeClass('off');
            $(this).text('유의사항안내 닫기 ▲');
        }
    });
});

// 즐찾과목/교수전체보기 버튼 Script
$(function() {
    $('.PassTabBox .CurriBox .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.tabLink').find('table.curriTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
            $(this).text('즐찾과목/교수전체보기 ▲');
        } else {
            $lec_info_table.hide().css('display','none');
            $(this).text('즐찾과목/교수전체보기 ▼');
        }
    });
});

// 내강의실 온라인강좌 버튼 Script
$(function() {
    $('.willbes-Package-Table .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Package-Table').find('.packInfoTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
            $(this).text('강좌 닫기 ▲');
        } else {
            $lec_info_table.hide().css('display','none');
            $(this).text('강좌 열기 ▼');
        }
    });
});

// checkbox 결제 버튼 Script
$(function() {
    $('.chk.buybtn input:checkbox').change(function(){
        var $buy_layer = $('.willbes-Lec-buyBtn-sm');

        if($(this).is(':checked')) {
            var top = $(this).offset().top;
            var left = $(this).offset().left - 52;

            $buy_layer.css({
                'top': top,
                'left': left,
                'position': 'absolute'
            }).addClass('active');
        } else {
            $buy_layer.find('.pocketBox').css('display','none').hide();
            $buy_layer.removeClass('active');
        }
    });
});

// 장바구니 상품정보 Script
$(function() {
    $('td.w-list a').click(function(){
        if($('.willbes-Layer-Box-sm').is(':hidden')) {
            $('td.w-list a img.dot').css('display','none');
        } else {
            $('td.w-list a img.dot').css('display','inline');
        }
    });
});

// 수강후기 리스트 Script
$(function() {
    $('tr.replyList').click(function() {
        $('tr.replyList').removeClass('hover');

        if ($(this).next().is(':visible')) {
            $(this).next().hide();
            $(this).removeClass('hover');
        } else {
            $('tr.replyTxt').hide();
            $(this).next().show();
            $(this).addClass('hover');
        }   
    });
});

// 약관동의 리스트 Script
$(function() {
    $('.Member .agree-Chk .agree-Tit').click(function() {

        $('.arrow').text('▼');

        $btn_arrow = $(this).parents('.chk').find('.arrow');

        if ($(this).next().is(':visible')) {
            $(this).next().hide();
            $btn_arrow.text('▼');
        } else {
            $('.Member .agree-Chk .agree-Txt').hide();
            $(this).next().show();
            $btn_arrow.text('▲');
        }   
    });
});

// 자주하는 질문 메뉴 Script
$(function() {
    $('.tabcsDepth2 li a.qBox').click(function() {
        $('.tabcsDepth2 li .subBox').removeClass('on');

        if ($(this).hasClass('on')) {
            $(this).next().removeClass('on');
        } else {
            $(this).next().addClass('on');
        }   
    });
});

// 첨부파일 찾아보기 버튼 Script
$(function() {
    var $fileBox = $('.filetype');

    $fileBox.each(function() {
        var $fileUpload = $(this).find('.input-file'),
            $fileText = $(this).find('.file-text').attr('disabled', 'disabled');

        $fileUpload.on('change', function() {
            var fileName = $(this).val();
            $fileText.attr('disabled', 'disabled').val(fileName);
        });
    });
});

// scroll position Script
function fnMove(seq){
    var offset = $("#pos" + seq).offset();
    $('html, body').animate({scrollTop : offset.top}, 0);
}

// scroll top fixed Script
$('*[id*=Sticky]:visible').each(function() {
    var stickyOffset = $('.sticky-menu').offset().top;
    $(window).scroll(function(){
        var sticky = $('.sticky-menu'),
            scroll = $(window).scrollTop();

        if (scroll >= stickyOffset) {
            sticky.addClass('fixed');
        } else {
            sticky.removeClass('fixed');
        }
    });
});
